<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Todo;

use App\Http\Requests\Todo\CreateTodoRequest;
use App\Services\Todo\Interfaces\TodoFactoryInterface;
use App\Services\Todo\Resources\CreateTodoResource;
use Illuminate\Http\JsonResponse;

final class CreateTodoController
{
    private TodoFactoryInterface $todoFactory;

    public function __construct(TodoFactoryInterface $todoFactory)
    {
        $this->todoFactory = $todoFactory;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function __invoke(CreateTodoRequest $request): JsonResponse
    {
        $todo = $this->todoFactory->make(new CreateTodoResource([
            'task' => $request->getTask(),
            'statusEnum' => $request->getStatus(),
            'createdBy' => auth()->user(),
        ]));

        return response()->json($todo);
    }
}
