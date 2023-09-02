<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RadarChart extends ChartWidget
{
    protected static ?string $heading = 'Radar Chart';
    protected static ?int $sort = 6;
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'First Information',
                    'data' => [48, 40, 19, 96, 27, 100],
                    'backgroundColor' => 'rgba(0,191,255, 0.2)',
                    'borderColor' => 'rgb(0,191,255)',
                ],
                [
                    'label' => 'Second Information',
                    'data' => [59, 90, 81, 56, 55, 40],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }
}
