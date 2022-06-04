<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceTagResource\Pages;
use App\Filament\Resources\ServiceTagResource\RelationManagers;
use App\Models\ServiceTag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class ServiceTagResource extends Resource
{
    protected static ?string $model = ServiceTag::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('description')
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('u_id')->label('ID'),
                Tables\Columns\BadgeColumn::make('title')
                    ->formatStateUsing(fn ($state): string => Str::headline($state))
                    ->colors(['primary'])
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('service_categories')
                    ->formatStateUsing(fn ($state): string => Str::headline($state))
                    ->colors(['secondary'])
                    ->label("Services")
                    ->counts('service_categories'),
                Tables\Columns\BadgeColumn::make('business_profile')
                    ->label("Businesses")
                    ->formatStateUsing(fn ($state): string => Str::headline($state))
                    ->colors(['secondary'])
                    ->counts('business_profiles'),
                Tables\Columns\BadgeColumn::make('blogs')
                    ->formatStateUsing(fn ($state): string => Str::headline($state))
                    ->colors(['secondary'])
                    ->counts('blogs'),
                Tables\Columns\BadgeColumn::make('projects')
                    ->formatStateUsing(fn ($state): string => Str::headline($state))
                    ->colors(['secondary'])
                    ->counts('projects')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ], Tables\Filters\Layout::AboveContent);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageServiceTags::route('/'),
        ];
    }
}
