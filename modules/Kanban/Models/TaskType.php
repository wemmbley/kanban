<?php

namespace Modules\Kanban\Models;

use Database\Factories\TaskTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
