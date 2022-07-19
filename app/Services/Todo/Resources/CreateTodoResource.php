<?php

declare(strict_types=1);

namespace App\Services\Todo\Resources;

use App\Enums\TodoStatusesEnum;
use App\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

final class CreateTodoResource extends DataTransferObject
{
    public string $task;

    public TodoStatusesEnum $statusEnum;

    public User $createdBy;

    public function getTask(): string
    {
        return $this->task;
    }

    public function getStatusEnum(): TodoStatusesEnum
    {
        return $this->statusEnum;
    }

    public function getCreatedBy(): User
    {
        return $this->createdBy;
    }
}
