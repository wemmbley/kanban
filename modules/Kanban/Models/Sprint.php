<?php

namespace Modules\Kanban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Auth\Models\User;
use Modules\Kanban\Database\Factories\SprintFactory;

class Sprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'due_date',
        'owner_id',
        'project_id'
    ];

    public $incrementing = false;

    public $timestamps = false;

    protected static function newFactory(): SprintFactory
    {
        return SprintFactory::new();
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
