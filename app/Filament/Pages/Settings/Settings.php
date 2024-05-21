<?php

namespace App\Filament\Pages\Settings;

use Closure;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;

class Settings extends BaseSettings
{
    protected static ?string $navigationGroup = 'Settings';

    public function schema(): array|Closure
    {
        return [
            Section::make('General Settings')
                ->description('Update your general settings here.')
                ->icon('heroicon-m-cog-6-tooth')
                ->schema([
                    TextInput::make('general.name')
                        ->label('Site Name')
                        ->placeholder('Enter your site name')
                        ->default(setting('general.name', config('app.name'))),
                ])
        ];
    }
}
