<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessProfileResource\Pages;
use App\Filament\Resources\BusinessProfileResource\RelationManagers;
use App\Models\BusinessProfile;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BusinessProfileResource extends Resource
{
    protected static ?string $model = BusinessProfile::class;

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
                Tables\Columns\TextColumn::make(BusinessProfile::TITLE),
                \App\Tables\Columns\User::make('service_notifier_user')->label("Notifier"),
                Tables\Columns\TextColumn::make(BusinessProfile::DESCRIPTION),
                Tables\Columns\TextColumn::make(BusinessProfile::STATUS),
                Tables\Columns\BadgeColumn::make('services_count')
                    ->label("Services")
                    ->counts('services'),
                Tables\Columns\BadgeColumn::make('tags_count')
                    ->label("Tags")
                    ->counts('service_tags'),
                Tables\Columns\BadgeColumn::make('users_count')
                    ->label("Users")
                    ->counts('users'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBusinessProfiles::route('/'),
        ];
    }
}
