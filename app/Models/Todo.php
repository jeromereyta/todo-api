<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TodoStatusesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => TodoStatusesEnum::class,
    ];

    protected $fillable = [
        'task',
        'status',
        'created_by'
    ];

    protected  $table = 'todos';

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
