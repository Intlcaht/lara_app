<?php

namespace App\Filament\Resources\ServiceTagResource\Pages;

use App\Filament\Resources\ServiceTagResource;
use Filament\Resources\Pages\ManageRecords;

class ManageServiceTags extends ManageRecords
{
    protected static string $resource = ServiceTagResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['u_id'] = uniqid("STAG");
        return $data;
    }
}
