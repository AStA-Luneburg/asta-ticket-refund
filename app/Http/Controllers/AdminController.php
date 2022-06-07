<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Refund;
use Illuminate\Http\Request;
use League\Csv\Writer;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isAdmin()) {
            $exports = Export::all();
            $exports->load('refunds');

            $refundCount = Refund::count();

            return view('admin', ['user' => $user, 'exports' => $exports, 'refundCount' => $refundCount]);
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
        $refunds = $export->refunds;
        $refunds->load('user');

        $records = [];

        foreach ($refunds as $refund) {
            $records[] = [
                $refund->email,
                // $refund->user()->matriculation_number,
                $refund->name,
                $refund->iban,
            ];
        }

        //load the CSV document from a string
        $csv = Writer::createFromString();

        //insert the header
        $csv->insertOne(['Email', 'Name', 'IBAN']);

        //insert all the records
        $csv->insertAll($records);

        return response($csv->toString())->header('Content-Type', 'text/plain');
    }
}
