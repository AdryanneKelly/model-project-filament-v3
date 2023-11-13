<?php

namespace App\Filament\Resources\ContributorResource\Pages;

use App\Filament\Resources\ContributorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListContributors extends ListRecords
{
    protected static string $resource = ContributorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'fulano' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('name', 'Fulano')),
            'adryanne' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('name', 'Adryanne')),
        ];
    }
}
