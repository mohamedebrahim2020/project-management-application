<?php

namespace App\Http\Requests;

use App\Enum\TaskPriority;
use App\Enum\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:tasks,title|max:100',
			'description' => 'nullable|string|max:255',
			'status' => ['required', Rule::enum(TaskStatus::class)],
			'priority' => ['required', Rule::enum(TaskPriority::class)],
        ];
    }
}
