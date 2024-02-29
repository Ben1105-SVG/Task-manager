<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskUpdateOrCreateRequest;
use App\Http\Resources\TaskResource;
use App\Http\Services\TaskService;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => TaskResource::collection(TaskService::filteredTasks(request()->query())),
        ]);
    }

    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'data' => new TaskResource($task),
        ]);
    }

    public function update(TaskUpdateOrCreateRequest $request, int $id): JsonResponse
    {
        if (Task::query()->where('id', $id)->update($request->validated())) {

            return response()->json([
                'message' => 'Задача успешно обнавлена',
            ]);
        }

        return response()->json([
            'message' => 'Что то пошло не так',
            'success' => false
        ], 500);
    }

    public function store(TaskUpdateOrCreateRequest $request): JsonResponse
    {
        if ($task = Task::query()->create($request->validated())) {

            return response()->json([
                'data'    => new TaskResource($task),
                'message' => 'Задача успешно создана'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Что то пошло не так'
        ], 500);
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json(['success' => Task::query()->where('id', $id)->delete()]);
    }

}
