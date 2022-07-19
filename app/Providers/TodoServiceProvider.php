<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Todo\Factories\TodoFactory;
use App\Services\Todo\Interfaces\TodoFactoryInterface;
use Illuminate\Support\ServiceProvider;

final class TodoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $services = [
            TodoFactoryInterface::class => TodoFactory::class,
        ];

        foreach ($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
