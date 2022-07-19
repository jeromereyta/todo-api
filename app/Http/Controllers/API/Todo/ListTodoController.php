<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Todo;

use Illuminate\Http\JsonResponse;

final class ListTodoController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
           'data' => auth()->user()->getTodos(),
        ]);
    }
}
