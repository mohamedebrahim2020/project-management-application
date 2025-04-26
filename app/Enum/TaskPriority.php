<?php

namespace App\Enum;

enum TaskPriority: int
{
	case High = 0;
	case Medium = 1;
	case Low = 2;

	/**
	 * @return string
	 */
	public function label(): string
	{
		return match ($this) {
			self::High => 'High',
			self::Medium => 'Medium',
			self::Low => 'Low',
		};
	}
}
