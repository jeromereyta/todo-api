<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Authentication;

use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

final class RegisterController
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        try {
            User::create([
                'name' => $request->getName(),
                'email' => $request->getEmail(),
                'password' => $request->getPassword(),
            ]);

            return new JsonResponse([],
                ResponseAlias::HTTP_NO_CONTENT
            );
        } catch (Exception $exception) {
            return new JsonResponse($exception, ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
