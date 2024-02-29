<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Task::query()->insert([
            [
                'title' => 'Some task 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, animi eum excepturi ipsa modi officia quibusdam quisquam, reiciendis rem soluta temporibus velit! Blanditiis culpa deserunt dolore doloremque eaque eligendi, eum ex, facilis fugiat laudantium maxime molestiae obcaecati pariatur perferendis quaerat quam quia quidem quis, repudiandae tempora ullam velit vitae voluptate!',
                'status' => Task::STATUS_TODO,
                'deadline' => now()->addMonth(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Some task 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, animi eum excepturi ipsa modi officia quibusdam quisquam, reiciendis rem soluta temporibus velit! Blanditiis culpa deserunt dolore doloremque eaque eligendi, eum ex, facilis fugiat laudantium maxime molestiae obcaecati pariatur perferendis quaerat quam quia quidem quis, repudiandae tempora ullam velit vitae voluptate!',
                'status' => Task::STATUS_TODO,
                'deadline' => now()->addMonths(2),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Some task 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, animi eum excepturi ipsa modi officia quibusdam quisquam, reiciendis rem soluta temporibus velit! Blanditiis culpa deserunt dolore doloremque eaque eligendi, eum ex, facilis fugiat laudantium maxime molestiae obcaecati pariatur perferendis quaerat quam quia quidem quis, repudiandae tempora ullam velit vitae voluptate!',
                'status' => Task::STATUS_TODO,
                'deadline' => now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Some task 4',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, animi eum excepturi ipsa modi officia quibusdam quisquam, reiciendis rem soluta temporibus velit! Blanditiis culpa deserunt dolore doloremque eaque eligendi, eum ex, facilis fugiat laudantium maxime molestiae obcaecati pariatur perferendis quaerat quam quia quidem quis, repudiandae tempora ullam velit vitae voluptate!',
                'status' => Task::STATUS_TODO,
                'deadline' => now()->addDays(14),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Some task 5',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, animi eum excepturi ipsa modi officia quibusdam quisquam, reiciendis rem soluta temporibus velit! Blanditiis culpa deserunt dolore doloremque eaque eligendi, eum ex, facilis fugiat laudantium maxime molestiae obcaecati pariatur perferendis quaerat quam quia quidem quis, repudiandae tempora ullam velit vitae voluptate!',
                'status' => Task::STATUS_TODO,
                'deadline' => now()->addDays(12),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
