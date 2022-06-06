<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveRefundRequest;
use App\Models\Refund;
use App\Rules\IBAN;
use Illuminate\Support\Facades\Log;

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

        return $user
            ? view('my-refund', [ 'user' => $user, 'refund' => $refund ])
            : redirect('welcome');
    }

    /**
     * Store name and iban.
     */
    public function store(SaveRefundRequest $request)
    {
        $validated = $request->validated();
        $user = $request->user();
        $isFirstSave = $user->refund === null;

        $refund = Refund::updateOrCreate(
            ['email' => $user->email],
            [
                'name' => $validated['name'],
                'iban' => IBAN::prettyPrint($validated['iban']),
            ]
        );


        return view('my-refund', [
            'user' => $user,
            'refund' => $refund,
            'success' => $isFirstSave ? 'created' : 'saved'
        ]);
    }
}
