<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessProfileAdapterTransactionResource\Pages;
use App\Filament\Resources\BusinessProfileAdapterTransactionResource\RelationManagers;
use App\Models\BusinessProfileAdapterTransaction;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BusinessProfileAdapterTransactionResource extends Resource
{
    protected static ?string $model = BusinessProfileAdapterTransaction::class;

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
            'index' => Pages\ManageBusinessProfileAdapterTransactions::route('/'),
        ];
    }
}
