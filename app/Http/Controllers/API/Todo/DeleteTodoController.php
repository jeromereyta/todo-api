<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Todo;

use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class DeleteTodoController
{
    public function __invoke(int $id): JsonResponse
    {
        $todo = Todo::find($id);

        if ($todo === null) {
            return response()->json([], Response::HTTP_NO_CONTENT);
        }

        $todo->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
