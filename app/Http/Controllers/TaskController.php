<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TaskController extends Controller
{
	protected TaskService $taskService;

	/**
	 * @param TaskService $taskService
	 */
	public function __construct(TaskService $taskService)
	{
		$this->taskService = $taskService;
	}

	/**
	 * @return JsonResponse
	 */
	public function index() : JsonResponse
	{
		$tasks = $this->taskService->index();
		return response()->json(['data' => TaskResource::collection($tasks)], Response::HTTP_OK);
	}

	/**
	 * @param StoreTaskRequest $request
	 * @return JsonResponse
	 */
	public function store(StoreTaskRequest $request) : JsonResponse
	{
		$task = $this->taskService->store($request->validated());
		return response()->json(['data' => new TaskResource($task), 'message' => 'Task created successfully!'],Response::HTTP_CREATED);
	}
}
