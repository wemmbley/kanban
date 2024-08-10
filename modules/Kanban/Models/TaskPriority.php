<?php

namespace Modules\Kanban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Kanban\Database\Factories\TaskPriorityFactory;

class TaskPriority extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
