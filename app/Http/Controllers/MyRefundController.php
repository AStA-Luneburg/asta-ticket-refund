<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveRefundRequest;
use App\Mail\SubmitConfirmationMail;
use App\Models\EligibleStudent;
use App\Models\Refund;
use App\Rules\IBAN;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class MyRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $refund = $user->refund;
        $success = $request->session()->pull('success', null);

        return $user
            ? view('my-refund', [ 'user' => $user, 'refund' => $refund, 'success' => $success ])
            : redirect('welcome');
    }

    /**
     * Store name and iban.
     */
    public function store(SaveRefundRequest $request)
    {
        $validated = $request->validate();

        $user = $request->user();
        $isFirstSave = $user->refund === null;

        Refund::updateOrCreate(
            ['email' => $user->email],
            [
                'name' => $validated['name'],
                'iban' => $validated['iban'],
                'matriculation_number' => $validated['matriculation_number'],
                'updated_at' => now(), // We set updated_at manually and update it even when values haven't changed
            ]
        );

        if ($isFirstSave) {
            Mail::to($user->email)->send(new SubmitConfirmationMail());
        }

        session()->flash('success', $isFirstSave ? 'created' : 'saved');

        return redirect(route('my-refund'));
    }
}
