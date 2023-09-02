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
                    'backgroundColor' => ['rgb(25,25,112)', 'rgb(0,0,255)','rgb(30,144,255)',],
                    'borderColor' => 'rgb(25,25,112)',
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
