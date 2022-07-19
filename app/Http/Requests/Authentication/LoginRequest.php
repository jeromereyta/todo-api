<?php

declare(strict_types=1);

namespace App\Http\Requests\Authentication;

use App\Http\Requests\BaseRequest;

final class LoginRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getEmail(): string
    {
        return $this->getString('email');
    }

    public function getPassword(): string
    {
        return $this->getString('password');
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|exists:App\Models\User,email',
            'password' => 'required|string',
        ];
    }
}
