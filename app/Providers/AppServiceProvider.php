<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Checks\Checks\QueueCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;

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
        Health::checks([
            DebugModeCheck::new(),
            CacheCheck::new(),
            EnvironmentCheck::new(),
            DatabaseCheck::new(),
            DatabaseConnectionCountCheck::new()
                ->failWhenMoreConnectionsThan(100),
            DatabaseTableSizeCheck::new()
                ->table('users', maxSizeInMb: 1_000),
            UsedDiskSpaceCheck::new(),
            QueueCheck::new(),
        ]);

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
