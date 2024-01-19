<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Actions\CreateAction;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{

    public Model|string|null $model = Event::class;

    public function getFormSchema(): array
    {
        return [
            TextInput::make('title'),
            Grid::make()
                ->schema([
                    DateTimePicker::make('start'),
                    DateTimePicker::make('end'),
                ]),
        ];
    }

    public function fetchEvents(array $fetchInfo): array
    {
        // dd($fetchInfo);
        return Event::query()
            ->where('start', '>=', $fetchInfo['start'])
            ->where('end', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn(Event $event) => [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->start,
                    'end' => $event->end,
                ]
            )
            ->all();
    }

    protected function headerActions(): array
    {
        return [
            CreateAction::make()->label('Criar evento')->modalSubmitActionLabel('Criar evento')->modalCancelActionLabel('Cancelar')
                ->mountUsing(
                    function (Form $form, array $arguments) {
                        $form->fill([
                            'start' => $arguments['start'] ?? null,
                            'end' => $arguments['end'] ?? null
                        ]);
                    }
                )
        ];
    }
}