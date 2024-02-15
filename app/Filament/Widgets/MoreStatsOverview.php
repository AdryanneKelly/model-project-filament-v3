<?php

namespace App\Filament\Widgets;

use App\Models\Contributor;
use App\Models\Event;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;

use function Filament\Support\format_money;

class MoreStatsOverview extends BaseWidget
{
    protected static ?int $sort = 4;
    protected function getStats(): array
    {

        $valor = 34.89;
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        return [
            Stat::make(
                label: 'Contribuidores',
                value: Contributor::query()
                    ->when($startDate, fn(Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn(Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            )->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('success'),
            Stat::make('Eventos', Event::where('start', '=', today())->count())
                ->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('warning'),
        ];
    }
}
