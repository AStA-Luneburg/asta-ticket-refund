<?php

namespace App\Filament\Resources\RefundResource\Widgets;

use App\Models\Refund;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $total = DB::table('refunds')->count();


        $hour_ago = new \DateTime('-1 hour', new \DateTimeZone("UTC"));
        $hour_ago = $hour_ago->format('Y-m-d H:i:s');

        $count_results = DB::table('refunds')
            ->selectRaw("COUNT(*) as count")
            ->where('created_at', '>=', $hour_ago);

        $count_last_hour = $count_results->get()[0]->count;

        $week_ago = new \DateTime('-1 week', new \DateTimeZone("UTC"));
        $week_ago = $week_ago->format('Y-m-d H:i:s');

        $average_results = DB::table('refunds')
            ->select(DB::raw('COUNT(*) as count_row'))
            ->where('created_at', '>=', $week_ago)
            ->groupBy(DB::raw("DATE_FORMAT(`created_at`, '%Y-%M-%d %H')"))
            ->get();

        $hourly_average = round($average_results->average(fn ($item) => $item->count_row), 2);

        return [
            Card::make('Gesamtanzahl', $total)
                ->description('Anträge'),
            Card::make('Anträge in letzter Stunde', $count_last_hour)
                ->description('Anträge'),
            Card::make('Stündlicher Durchschnitt', $hourly_average)
                ->description('Anträge/Stunde'),
        ];
    }
}
