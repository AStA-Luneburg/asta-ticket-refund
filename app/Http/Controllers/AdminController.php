<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Refund;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isAdmin()) {
            $exports = Export::all();
            return view('admin', ['user' => $user, 'exports' => $exports]);
        }

        return redirect('/');
    }

    public function createExport(Request $request) {
        $export = Export::create();
        Refund::where('export_id', null)->update(['export_id' => $export->id]);

        return redirect('admin');
    }

    public function downloadJSON(Request $request, Export $export) {
        $export->load('refunds');

        return response()->json($export);
    }

    public function downloadCSV(Request $request, Export $export) {
        $export->load('refunds');

        return response()->json($export);
    }
}
