<?php

namespace Modules\Kanban\Models;

use Database\Factories\TaskPriorityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskPriority extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'image_url',
    ];

    protected static function newFactory(): TaskPriorityFactory
    {
        return TaskPriorityFactory::new();
    }

    public function priorities(): HasMany
    {
        return $this->hasMany(TaskPriority::class);
    }
}
