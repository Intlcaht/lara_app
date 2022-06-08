<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // \App\Tables\Columns\User::make()->label('ID'),
                Tables\Columns\TextColumn::make(User::FIRST_NAME),
                Tables\Columns\TextColumn::make(User::LAST_NAME),
                Tables\Columns\TextColumn::make(User::EMAIL),
                Tables\Columns\TextColumn::make(User::STATUS),
                // \App\Tables\Columns\Tags::make('role_names')
                //     ->label("Roles")
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RolesRelationManager::class,
        ];
    }
}
