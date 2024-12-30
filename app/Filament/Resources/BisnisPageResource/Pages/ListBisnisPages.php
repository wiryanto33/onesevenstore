<?php

namespace App\Filament\Resources\BisnisPageResource\Pages;

use App\Filament\Resources\BisnisPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBisnisPages extends ListRecords
{
    protected static string $resource = BisnisPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
