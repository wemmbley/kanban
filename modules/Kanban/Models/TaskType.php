<?php

namespace Modules\Kanban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Kanban\Database\Factories\TaskTypeFactory;

class TaskType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url'
    ];

    protected static function newFactory(): TaskTypeFactory
    {
        return TaskTypeFactory::new();
    }
}
