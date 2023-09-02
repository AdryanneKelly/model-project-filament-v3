<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PieChart extends ChartWidget
{
    protected static ?string $heading = 'Pie Chart';
    protected static ?int $sort = 5;
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Primary Data',
                    'data' => [300, 50, 100],
                    'backgroundColor' => ['rgba(0,191,255, 0.2)', 'rgba(0,0,255, 0.3)', 'rgba(25,25,112, 0.2)'],
                    'borderColor' => 'rgb(0,191,255)',
                ],
            ],
            'labels' => ['First', 'Second', 'Third'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
