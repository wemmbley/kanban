<?php

namespace Modules\Kanban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Auth\Models\User;
use Modules\Kanban\Database\Factories\TaskTimeFactory;

class TaskTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'task_id',
        'user_id',
        'minutes',
    ];

    protected static function newFactory(): TaskTimeFactory
    {
        return TaskTimeFactory::new();
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
