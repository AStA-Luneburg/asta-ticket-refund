<?php

namespace App\Http\Controllers;

use App\Facades\RefundManager;
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
            ? ($user->isAdmin()
                ? redirect('admin')
                : view('my-refund', ['user' => $user, 'refund' => $refund, 'success' => $success]))
            : redirect('welcome');
    }

    /**
     * Store name and iban.
     */
    public function store(SaveRefundRequest $request)
    {
        $validated = $request->validate();
        $user = $request->user();

        $wasCreated = RefundManager::storeRefund($user, $validated['name'], $validated['iban']);;
        session()->flash('success', $wasCreated ? 'created' : 'saved');

        return redirect(route('my-refund'));
    }
}
