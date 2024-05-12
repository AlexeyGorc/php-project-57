<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taskStatuses = [
            ['name' => 'новый'],
            ['name' => 'в работе'],
            ['name' => 'на тестировании'],
            ['name' => 'завершена']
        ];

        foreach ($taskStatuses as $taskStatus) {
            TaskStatus::firstOrCreate([
                'name' => $taskStatus['name']
            ]);
        }
    }
}
