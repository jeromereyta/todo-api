<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Authentication;

use App\Models\User;

final class LogoutController
{
    public function __invoke()
    {
        /** @var User $user */
        $user = auth()->user();

        $user->currentAccessToken()->delete();

        return response()->json();
    }
}
