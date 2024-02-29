<?php


namespace App\Http\Services;


use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public static function filteredTasks(array $filters): Collection
    {
        $tasksQuery = Task::query();

        if (isset($filters['min_date']) && $date = $filters['min_date']) {
            $tasksQuery->whereDate('deadline', '>=', $date);
        }
        if (isset($filters['min_date']) && $date = $filters['min_date']) {
            $tasksQuery->whereDate('deadline', '<=', $date);
        }
        if (isset($filters['status']) && $filters['status'] !== 'all') {
            $tasksQuery->where('status', $filters['status']);
        }

        return $tasksQuery->get();
    }
}
