<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Todo;

use App\Http\Requests\Todo\EditTodoRequest;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class EditTodoController
{
    public function __invoke(EditTodoRequest $request, int $id): JsonResponse
    {
        $todo = Todo::find($id);

        if ($todo === null) {
            return response()->json(['Not Found.'], Response::HTTP_NOT_FOUND);
        }

        $changes = array_diff($request->toArray(), [
            'task' => $todo->task,
            'status' => $todo->status->value,
        ]);

        $todo->update($changes);

        $todo->refresh();

        return new JsonResponse(
            $todo,
        );
    }
}
