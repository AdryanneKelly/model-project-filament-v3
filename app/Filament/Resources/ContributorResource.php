<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContributorResource\Pages;
use App\Filament\Resources\ContributorResource\RelationManagers;
use App\Models\Contributor;
use App\Models\Stack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContributorResource extends Resource
{
    protected static ?string $model = Contributor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('about')
                    ->required()
                    ->fileAttachmentsDirectory('profiles-contributor')
                    ->columnSpanFull(),
                Forms\Components\TagsInput::make('stacks')->label('Stacks and Skills')
                    ->suggestions([
                        'PHP',
                        'Laravel',
                        'English Intermediate',
                        'MySQL',
                        'Flutter'
                    ])
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('linkedin')->url(),
                Forms\Components\TextInput::make('github')->url(),
                Forms\Components\FileUpload::make('photo')
                    ->directory('photos-contributor')->image()->imageEditor(true)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->circular()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->copyable()
                    ->copyMessage('Link copied')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github')
                    ->copyable()
                    ->copyMessage('Link copied')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListContributors::route('/'),
            'create' => Pages\CreateContributor::route('/create'),
            'view' => Pages\ViewContributor::route('/{record}'),
            'edit' => Pages\EditContributor::route('/{record}/edit'),
        ];
    }
}
