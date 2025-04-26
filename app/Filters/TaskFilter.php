<?php
	namespace App\Filters;

	use Illuminate\Database\Eloquent\Builder;

	class TaskFilter extends QueryFilters
	{
		/**
		 * @param $term
		 * @return Builder
		 */
		public function status($term) : Builder
		{
			return $this->builder->where('status', $term);

		}

		/**
		 * @param $term
		 * @return Builder
		 */
		public function priority($term) : Builder
		{
			return $this->builder->where('priority', $term);

		}
	}