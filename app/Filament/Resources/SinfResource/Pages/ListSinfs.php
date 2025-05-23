<?php

namespace App\Filament\Resources\SinfResource\Pages;

use App\Filament\Resources\SinfResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListSinfs extends ListRecords
{
    protected static string $resource = SinfResource::class;

    public function getTitle(): string|Htmlable
    {
        return "Sinflar ro'yxati"; // TODO: Change the autogenerated stub
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("Yangi sinf yaratish"),
        ];
    }
}
