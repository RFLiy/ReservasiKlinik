<?php

namespace App\Filament\Widgets;

use App\Models\DataReservasi;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TreatmentPopulerChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Treatment Populer';
    protected int | string | array $columnSpan = 4;
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = DataReservasi::with('dokter') // Asumsi ada relasi 'dokter' di Model Reservasi
            ->select('dokter_id', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('dokter_id')
            ->get();

        return [
            'datasets' => [
                [
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => ['#B8A038', '#6D5D6E', '#D4C485', '#A394A5'],
                ],
            ],
            // Ambil nama dokter dari relasi
            'labels' => $data->map(fn($item) => $item->dokter->name ?? 'Unknown')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

}
