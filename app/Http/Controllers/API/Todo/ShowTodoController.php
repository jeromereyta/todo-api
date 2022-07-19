<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Todo;

use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ShowTodoController
{
    public function __invoke(int $id): JsonResponse
    {
        $todo = Todo::find($id);

        if ($todo === null) {
            return response()->json(['Not Found.'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse(
            $todo,
        );
    }
}
