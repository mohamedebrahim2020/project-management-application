<?php

namespace App\Models;

use App\Enum\TaskPriority;
use App\Enum\TaskStatus;
use App\Filters\Filterable;
use App\Http\Resources\TaskResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use function Illuminate\Events\queueable;

class Task extends Model
{
	use HasFactory, Filterable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable = [
		'title',
		'description',
		'status',
		'priority',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected $casts = [
		'status' => TaskStatus::class,
		'priority' => TaskPriority::class,
	];

	/**
	 * The "booted" method of the model.
	 */
	protected static function booted(): void
	{
		static::created(queueable(function (Task $task) {
			if (Cache::has('tasks')) {
				Cache::forget('tasks');
			} else {
				Cache::put('tasks', TaskResource::collection($task->all()));
			}
		}));
	}
}
