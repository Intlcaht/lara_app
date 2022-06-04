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
                //
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
