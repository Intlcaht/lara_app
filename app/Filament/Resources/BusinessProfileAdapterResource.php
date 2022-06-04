<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessProfileAdapterResource\Pages;
use App\Filament\Resources\BusinessProfileAdapterResource\RelationManagers;
use App\Models\BusinessProfileAdapter;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BusinessProfileAdapterResource extends Resource
{
    protected static ?string $model = BusinessProfileAdapter::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('profile_u_id')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('u_id')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('balance')
                    ->required(),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\TextInput::make('loss'),
                Forms\Components\TextInput::make('profit'),
                Forms\Components\TextInput::make('max_payment'),
                Forms\Components\TextInput::make('min_payment'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('profile_u_id'),
                Tables\Columns\TextColumn::make('u_id'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('balance'),
                Tables\Columns\BooleanColumn::make('active'),
                Tables\Columns\TextColumn::make('loss'),
                Tables\Columns\TextColumn::make('profit'),
                Tables\Columns\TextColumn::make('max_payment'),
                Tables\Columns\TextColumn::make('min_payment'),
            ])
            ->filters([
                //
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBusinessProfileAdapters::route('/'),
        ];
    }
}
