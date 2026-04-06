<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataReservasiResource\Pages;
use App\Filament\Resources\DataReservasiResource\RelationManagers;
use App\Models\DataReservasi;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataReservasiResource extends Resource
{
    protected static ?string $model = DataReservasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        $query = static::getModel()::query();

        if (auth()->user()->hasRole('Dokter')) {
            return (string) $query->where('dokter_id', auth()->id())->count();
        }

        return (string) $query->count();
    }

    protected static ?string $navigationGroup = 'Master Reservasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Select::make('pasien_id')
                ->label('Pilih Pasien')
                ->relationship('pasien', 'name') // Nama relasi di model, kolom yang diambil
                ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                ->searchable()
                ->required(),

            // Dropdown Pilih Dokter
            Forms\Components\Select::make('dokter_id')
                ->label('Pilih Dokter')
                ->options(
                    \App\Models\User::role('Dokter')->pluck('name', 'id')
                )
                ->searchable()
                ->required(),

            Forms\Components\DatePicker::make('tgl_reservasi')->required(),
            Forms\Components\TimePicker::make('jam_reservasi')->required(),
            Forms\Components\Textarea::make('keluhan'),
            Forms\Components\Textarea::make('alasan_tolak'),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'check_in' => 'Check In',
                    'checkout' => 'Checkout',
                    'cancelled' => 'Cancelled',
                ])->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('pasien.name')
                ->label('Nama Pasien')
                ->searchable(),

            // Panggil relasi dokter, lalu ambil kolom 'name'
            Tables\Columns\TextColumn::make('dokter.name')
                ->label('Nama Dokter')
                ->searchable(),
            Tables\Columns\TextColumn::make('tgl_reservasi')
                ->date('d M Y')
                ->label('Tanggal'),

            Tables\Columns\TextColumn::make('jam_reservasi')
                ->label('Jam'),

            Tables\Columns\TextColumn::make('status')
                ->badge() // Biar berwarna kayak di riwayat pasien tadi
                ->color(fn(string $state): string => match ($state) {
                    'pending' => 'warning',
                    'confirmed' => 'primary',
                    'checkout' => 'success',
                    'cancelled' => 'danger',
                    default => 'gray',
                }),
            Tables\Columns\TextColumn::make('alasan_tolak')
                ->label('Alasan Penolakan')
                ->placeholder('-') // Jika kosong tampilkan strip
                ->wrap() // Agar teks panjang otomatis turun ke bawah (tidak terpotong)
                ->description(fn($record) => $record->status === 'cancelled' ? 'Dibatalkan oleh sistem/dokter' : null),
            ])
            ->filters([
                //
            ])
            ->actions([
            Tables\Actions\Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    // Tombol ini cuma muncul kalau statusnya masih pending
                    ->visible(fn($record) => $record->status === 'pending')
                    ->requiresConfirmation() // Munculin pop-up konfirmasi standar
                    ->action(function ($record) {
                        $record->update(['status' => 'confirmed']);

                        Notification::make()
                            ->title('Reservasi Disetujui')
                            ->success()
                            ->send();
                    }),

            // 2. ACTION REJECT (DENGAN ALASAN)
            Tables\Actions\Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn($record) => $record->status === 'pending')
                    // Form input alasan di dalam modal Filament
                    ->form([
                        Textarea::make('alasan_tolak')
                            ->label('Alasan Penolakan')
                            ->placeholder('Masukkan alasan kenapa reservasi ditolak...')
                            ->required()
                            ->minLength(5),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => 'cancelled',
                            'alasan_tolak' => $data['alasan_tolak'],
                        ]);

                        Notification::make()
                            ->title('Reservasi Ditolak')
                            ->danger()
                            ->send();
                    }),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Jika yang login punya role Dokter, batasi datanya cuma buat dia
        // Kita cek berdasarkan ID user yang login
        if (auth()->user()->hasRole('Dokter')) {
            return $query->where('dokter_id', auth()->id());
        }

        // Jika Admin (Super Admin), biarkan lihat semua
        return $query;
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataReservasis::route('/'),
            'create' => Pages\CreateDataReservasi::route('/create'),
            'edit' => Pages\EditDataReservasi::route('/{record}/edit'),
        ];
    }
}
