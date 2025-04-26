<?php

namespace App\Enum;

enum TaskStatus: int
{
	case ToDo = 0;
	case InProgress = 1;
	case Completed = 2;

	/**
	 * @return string
	 */
	public function label(): string
	{
		return match ($this) {
			self::ToDo => 'To Do',
			self::InProgress => 'In Progress',
			self::Completed => 'Completed',
		};
	}
}
