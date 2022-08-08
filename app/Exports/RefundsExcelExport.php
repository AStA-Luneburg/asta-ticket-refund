<?php

namespace App\Exports;

use App\Models\Refund;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class RefundsExcelExport implements FromCollection
{
    use Exportable;

    protected int $export_id;

    public function __construct(int $export_id)
    {
        $this->export_id = $export_id;
    }

    public function collection(): \Illuminate\Support\Collection
    {
        return Refund::where('export_id', $this->export_id)->get();
    }

    public function map(Refund $refund): array
    {
        return [
            $refund->name,
            $refund->iban,
            "9-Euro Rückerstattung ($refund->matriculation_number)",
            "51,84"
        ];
    }
}
