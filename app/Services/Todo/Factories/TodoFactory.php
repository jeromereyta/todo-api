<?php

declare(strict_types=1);

namespace App\Services\Todo\Factories;

use App\Models\Todo;
use App\Services\Todo\Interfaces\TodoFactoryInterface;
use App\Services\Todo\Resources\CreateTodoResource;

final class TodoFactory implements TodoFactoryInterface
{
    public function make(CreateTodoResource $resource): Todo
    {
        return Todo::create([
            'task' => $resource->getTask(),
            'status' => $resource->getStatusEnum()->value,
            'created_by' => $resource->getCreatedBy()->getId(),
        ]);
    }
}
