<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataDokterResource\Pages;
use App\Filament\Resources\DataDokterResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataDokterResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $slug = 'Data Dokter';
    protected static ?string $navigationGroup = 'Master Data User';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $pluralLabel = 'Data Dokter';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereHas('roles', function ($query) {
            $query->where('name', 'Dokter');
        })->count();
    }

    public static function getModelLabel(): string
    {
        return 'Data Dokter';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas(
            'roles',
            function ($query) {
                $query->where('name', 'Dokter');
            }
        );
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('address')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('no_tlp')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('jenis_kelamin')
                ->options([
                    'Laki-Laki' => 'Laki-Laki',
                    'Perempuan' => 'Perempuan',
                ])
                ->required()
                ->native(false)
                ->placeholder('Pilih Jenis Kelamin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            Tables\Columns\TextColumn::make('address')
                ->searchable(),
            Tables\Columns\TextColumn::make('no_tlp')
                ->searchable(),
            Tables\Columns\TextColumn::make('jenis_kelamin'),
            Tables\Columns\TextColumn::make('roles.name')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'super_admin' => 'danger',
                    'Dokter' => 'warning',
                    'Pasien' => 'success',
                    default => 'gray',
                })
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataDokters::route('/'),
            'create' => Pages\CreateDataDokter::route('/create'),
            'edit' => Pages\EditDataDokter::route('/{record}/edit'),
        ];
    }
}
