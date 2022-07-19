<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Authentication;

use App\Http\Requests\Authentication\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

final class LoginController
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->getEmail())->first();

        if ($user === null) {
            return new JsonResponse(
                [
                    'error' => 'Unauthorized'
                ],
                ResponseAlias::HTTP_UNAUTHORIZED
            );
        }

        $authenticate = Auth::attempt([
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
        ]);

        if ($authenticate === false) {
            return new JsonResponse(
                [
                    'error' => 'Unauthorized'
                ],
                ResponseAlias::HTTP_UNAUTHORIZED
            );
        }

        return new JsonResponse([
            'user' => $user,
            'access_token' => $user->createToken('token')->plainTextToken,
            'token_type' => 'Bearer',
            'expiration' => 525600,
        ]);
    }
}
