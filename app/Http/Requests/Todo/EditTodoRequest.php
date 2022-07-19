<?php

declare(strict_types=1);

namespace App\Http\Requests\Todo;

use App\Enums\TodoStatusesEnum;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

final class EditTodoRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function getTask(): ?string
    {
        if ($this->getString('task') === null) {
            return null;
        }

        return $this->getString('task');
    }

    public function getStatus(): ?TodoStatusesEnum
    {
        $status = $this->getString('status');

        if ($status === null) {
            return null;
        }

        return TodoStatusesEnum::from($status);
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'task' => 'string|nullable',
            'status' => [
                'nullable',
                'string',
                Rule::in(array_column(TodoStatusesEnum::cases(), 'value')),
            ],
        ];
    }
}
