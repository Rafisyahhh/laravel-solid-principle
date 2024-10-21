<?php

namespace App\Providers;

use App\Contracts\Interfaces\AddressInterface;
use App\Contracts\Interfaces\StatusInterface;
use App\Contracts\Interfaces\EducationInterface;
use App\Contracts\Interfaces\WorkInterface;
use App\Contracts\Interfaces\ResidentInterface;
use App\Contracts\Interfaces\FamilyInterface;
use App\Contracts\Repositories\AddressRepository;
use App\Contracts\Repositories\StatusRepository;
use App\Contracts\Repositories\EducationRepository;
use App\Contracts\Repositories\WorkRepository;
use App\Contracts\Repositories\ResidentRepository;
use App\Contracts\Repositories\FamilyRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        AddressInterface::class => AddressRepository::class,
        StatusInterface::class => StatusRepository::class,
        EducationInterface::class => EducationRepository::class,
        WorkInterface::class => WorkRepository::class,
        ResidentInterface::class => ResidentRepository::class,
        FamilyInterface::class => FamilyRepository::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
