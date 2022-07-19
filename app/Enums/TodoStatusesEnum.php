<?php

declare(strict_types=1);

namespace App\Enums;

enum TodoStatusesEnum: string
{
    case CANCELLED = 'cancelled';

    case DONE = 'done';

    case TODO = 'todo';
}
