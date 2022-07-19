<?php

declare(strict_types=1);

namespace App\Services\Todo\Interfaces;

use App\Models\Todo;
use App\Services\Todo\Resources\CreateTodoResource;

interface TodoFactoryInterface
{
    public function make(CreateTodoResource $resource): Todo;
}
