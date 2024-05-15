<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    private User $user;
    private Task $task;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->task = Task::factory()->create(['created_by_id' => $this->user->id]);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testShow(): void
    {
        $response = $this->get(route('tasks.show', $this->task));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $this->actingAs($this->user);
        $task = Task::factory()
            ->make()
            ->only('name', 'description', 'status_id', 'assigned_to_id');
        $response = $this->post(route('tasks.store'), $task);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $task);
    }

    public function testEdit(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('tasks.edit', ['task' => $this->task]));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $this->actingAs($this->user);
        $task = Task::factory()
            ->make()
            ->only('name', 'description', 'status_id', 'assigned_to_id');
        $response = $this->patch(route('tasks.update', ['task' => $this->task]), $task);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', [
            'id' => $this->task->id,
            'name' => $task['name'],
            'status_id' => $task['status_id']
        ]);
    }

    public function testDestroy(): void
    {
        $this->actingAs($this->user);
        $response = $this->delete(route('tasks.destroy', ['task' => $this->task]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseMissing('tasks', ['id' => $this->task->id]);
    }
}
