<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\DataReservasi;
use Carbon\Carbon;

class ReservasiChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Reservasi Mingguan';
    protected int | string | array $columnSpan = 8;
    protected static ?int $sort = 1;
    protected static ?string $maxHeight = '200px';
    protected static ?string $pollingInterval = '10s';

    protected function getData(): array
    {
        $days = collect(range(6, 0))->map(function ($i) {
            return Carbon::now()->subDays($i);
        });

        $labels = $days->map(fn($date) => $date->isoFormat('ddd'))->toArray();
        $data = $days->map(function ($date) {
            return DataReservasi::whereDate('created_at', $date->toDateString())->count();
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Total Reservasi (7 Hari Terakhir)',
                    'data' => $data,
                    'borderColor' => '#B8A038',
                    'backgroundColor' => 'rgba(184, 160, 56, 0.1)',
                    'fill' => 'start',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getColumns(): int
    {
        return 1;
    }

}
