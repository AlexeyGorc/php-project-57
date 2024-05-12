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
    use RefreshDatabase;

    private User $user;
    private Task $task;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
        $this->task = Task::factory()->create(['created_by_id' => $this->user->id]);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
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
        $data = ['name' => 'Task', 'status_id' => TaskStatus::factory()->create()->id];

        $response = $this->post(route('tasks.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testEdit(): void
    {
        $response = $this->get(route('tasks.edit', ['task' => $this->task]));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = ['name' => 'NewTask', 'status_id' => TaskStatus::factory()->create()->id];

        $response = $this->patch(route('tasks.update', ['task' => $this->task]), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDestroy(): void
    {
        $response = $this->delete(route('tasks.destroy', ['task' => $this->task]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseMissing('tasks', ['id' => $this->task->id]);
    }
}
