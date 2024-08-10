<?php

namespace Modules\Kanban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Kanban\Database\Factories\SprintTaskFactory;

class SprintTask extends Model
{
    use HasFactory;

    protected $table = 'sprint_task';

    protected $fillable = [
        'sprint_id',
        'task_id',
    ];

    public $incrementing = false;

    public $timestamps = false;

    protected static function newFactory(): SprintTaskFactory
    {
        return SprintTaskFactory::new();
    }

    public function sprint(): BelongsTo
    {
        return $this->belongsTo(Sprint::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
