<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;

class DashboardPanelProvider extends PanelProvider
{
  public function panel(Panel $panel): Panel
  {
    return $panel
      ->default()
      ->id('dashboard')
      ->path('/')
      ->login()
      ->colors([
        'primary' => '#0000FF',
      ])
      ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
      ->pages([
        // Pages\Dashboard::class,
        // Pages\CustomPage::class,
        // Pages\NewCustomPage::class,
      ]);
  }
}
