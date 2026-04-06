<?php

namespace App\Filament\Resources\DataAdminResource\Pages;

use App\Filament\Resources\DataAdminResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataAdmins extends ListRecords
{
    protected static string $resource = DataAdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
