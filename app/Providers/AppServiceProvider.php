<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(
                    [
                        'ar',
                        'de',
                        'en',
                        'es',
                        'fr',
                        'id',
                        'ja',
                        'ko',
                        'pt_BR',
                        'zh_CN',
                    ]
                )
                ->labels(
                    [
                        'ar' => 'العربية',
                        'de' => 'Deutsch',
                        'en' => 'English (US)',
                        'es' => 'Español',
                        'fr' => 'Français',
                        'id' => 'Bahasa Indonesia',
                        'ja' => '日本語',
                        'ko' => '한국어',
                        'pt_BR' => 'Português (Brasil)',
                        'zh_CN' => '简体中文',
                    ]
                )
                ->flags([
                    'ar' => asset('assets/flags/saudi-arabia.png'),
                    'de' => asset('assets/flags/germany.png'),
                    'en' => asset('assets/flags/usa.png'),
                    'es' => asset('assets/flags/spain.png'),
                    'fr' => asset('assets/flags/france.png'),
                    'id' => asset('assets/flags/indonesia.png'),
                    'ja' => asset('assets/flags/japan.png'),
                    'ko' => asset('assets/flags/south-korea.png'),
                    'pt_BR' => asset('assets/flags/brazil-.png'),
                    'zh_CN' => asset('assets/flags/china.png'),
                ])
                ->circular()
                ->visible(outsidePanels: true);
        });
    }
}
