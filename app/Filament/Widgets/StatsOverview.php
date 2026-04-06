<?php

namespace App\Filament\Widgets;

use App\Models\DataReservasi;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 4;
    protected function getStats(): array
    {
        $countDokter    = User::role('Dokter')->count();
        $countAdmin     = User::role('super_admin')->count();
        $countPasien    = User::role('Pasien')->count();
        $countUser      = User::count();
        $countReservasi = DataReservasi::count();

        return [
            Stat::make('Total Dokter', $countDokter . ' Orang')
                ->icon('heroicon-o-users')
                ->description('Dokter Yang Terdaftar'),

            Stat::make('Total Admin', $countAdmin . ' Orang')
                ->icon('heroicon-o-users')
                ->description('Admin Yang Terdaftar'),

            Stat::make('Total User', $countUser . ' Orang')
                ->icon('heroicon-o-users')
                ->description('Pengguna Terdaftar'),

            Stat::make('Total Pasien', $countPasien . ' Orang')
                ->icon('heroicon-o-users')
                ->description('Pasien Yang Terdaftar'),

            Stat::make('Total Reservasi', $countReservasi . ' Orang')
                ->icon('heroicon-o-tag')
                ->description('Reservasi Hari Ini'),
        ];
    }
}
