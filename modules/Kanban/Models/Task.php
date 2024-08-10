<?php

namespace Modules\Kanban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Modules\Auth\Models\User;
use Modules\Kanban\Database\Factories\TaskFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'name',
        'description',
        'story_points',
        'stage_id',
        'priority_id',
        'reporter_id',
        'assignee_id',
        'project_id',
        'type_id',
        'parent_task_id',
    ];

    protected static function newFactory(): TaskFactory
    {
        return TaskFactory::new();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            $task->identifier = self::getNextIdentifier($task->project_id);
            $task->stage_id = self::getFirstAvailableStageId($task->project_id);
        });
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(TaskPriority::class);
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TaskType::class);
    }

    public function parentTask(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    // Custom methods.

    public static function getNextIdentifier($projectId)
    {
        return DB::transaction(function () use ($projectId) {
            $maxIdentifier = self::where('project_id', $projectId)->max('identifier');

            return $maxIdentifier ? $maxIdentifier + 1 : 1;
        });
    }

    public static function getFirstAvailableStageId($projectId)
    {
        return DB::transaction(function () use ($projectId) {
            $project = Project::findOrFail($projectId);

            return $project->stages->first()?->getKey();
        });
    }
}
