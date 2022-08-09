<?php

namespace App\Services;

use App\Exports\RefundsExcelExport;
use App\Mail\SubmitConfirmationMail;
use App\Models\Export;
use App\Models\Refund;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class RefundManagerService
{
    public function storeRefund(User $user, string $name, string $iban): bool
    {
        $isFirstSave = $user->refund === null;

        Refund::updateOrCreate(
            ['matriculation_number' => $user->matriculation_number],
            [
                'name' => $name,
                'iban' => $iban,
                'updated_at' => now(), // We set updated_at manually and update it even when values haven't changed
            ]
        );

        if ($isFirstSave) {
            Mail::to($user->email)->send(new SubmitConfirmationMail());
        }

        return $isFirstSave;
    }

    public function downloadExport(Export $export, string $type): Response
    {
        $extension = strtolower($type);

        return RefundsExcelExport::withExportID($export->id)
            ->download("Export-{$export->id}_{$export->created_at->format('Y-m-d_H-m-s')}.{$extension}", $type);
    }

    public function downloadRefunds(Collection $refunds, string $type): Response
    {
        $extension = strtolower($type);
        $date = now()->format('Y-m-d');

        return RefundsExcelExport::withCollection($refunds)
            ->download("Refunds_{$date}.{$extension}", $type);
    }

    public function createExportWithRefunds(): Export
    {
        return DB::transaction(function () {
            $export = Export::create();

            Refund::where('export_id', null)
                ->orderBy('created_at')
                ->limit(config('app.export-limit'))
                ->update(['export_id' => $export->id]);

            return $export;
        });
    }
}
