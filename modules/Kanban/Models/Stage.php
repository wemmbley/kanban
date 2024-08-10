<?php

namespace Modules\Kanban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Kanban\Database\Factories\StageFactory;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'project_id',
    ];

    protected static function newFactory(): StageFactory
    {
        return StageFactory::new();
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'stage_id')
            ->whereHas('project', function ($query) {
                $query->where('project_id', $this->project_id);
            });
    }
}
