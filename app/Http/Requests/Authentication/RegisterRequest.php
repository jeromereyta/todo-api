<?php

declare(strict_types=1);

namespace App\Http\Requests\Authentication;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Hash;

final class RegisterRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getEmail(): string
    {
        return $this->getString('email');
    }

    public function getName(): string
    {
        return $this->getString('password');
    }

    public function getPassword(): string
    {
        return Hash::make($this->getString('password'));
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'name' => 'required|string|unique:App\Models\User,name',
        ];
    }
}
