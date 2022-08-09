<?php

namespace App\Exports;

use \Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use App\Models\Refund;

class RefundsExcelExport implements FromCollection, WithMapping
{
    use Exportable;

    public static string $XLSX = Excel::XLSX;
    public static string $CSV = Excel::CSV;

    protected int $export_id;
    protected Collection $refunds;

    public static function withExportID(int $export_id)
    {
        $excel_export = new RefundsExcelExport;
        $excel_export->export_id = $export_id;

        return $excel_export;
    }

    public static function withCollection(Collection $refunds)
    {
        $excel_export = new RefundsExcelExport;
        $excel_export->refunds = $refunds;

        return $excel_export;
    }

    public function collection(): Collection
    {
        return $this->refunds ?? Refund::where('export_id', $this->export_id)
            ->orderBy('created_at')
            ->get();
    }

    public function map($refund): array
    {
        return [
            $refund->name,
            $refund->iban,
            "9-Euro Rückerstattung ($refund->matriculation_number)",
            "51,84"
        ];
    }
}
