<?php

declare(strict_types=1);

namespace App\Http\Requests\Todo;

use App\Enums\TodoStatusesEnum;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

final class CreateTodoRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function getTask(): string
    {
        return $this->getString('task');
    }

    public function getStatus(): TodoStatusesEnum
    {
        $status = $this->getString('status');

        return TodoStatusesEnum::from($status);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'task' => 'string|required',
            'status' => [
                'required',
                'string',
                Rule::in(array_column(TodoStatusesEnum::cases(), 'value')),
            ],
        ];
    }
}
