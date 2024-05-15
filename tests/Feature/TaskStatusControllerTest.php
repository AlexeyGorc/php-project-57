<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
{
    private User $user;
    private TaskStatus $taskStatus;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->taskStatus = TaskStatus::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $this->actingAs($this->user);
        $data = TaskStatus::factory()->raw(['name' => 'TaskStatus']);
        $response = $this->post(route('task_statuses.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testEdit(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('task_statuses.edit', ['task_status' => $this->taskStatus]));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $this->actingAs($this->user);
        $data = TaskStatus::factory()->raw(['name' => 'NewTaskStatus']);
        $response = $this->patch(route('task_statuses.update', ['task_status' => $this->taskStatus]), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', [
            'id' => $this->taskStatus->id,
            'name' => $data['name']
        ]);
    }

    public function testDestroy(): void
    {
        $this->actingAs($this->user);
        $response = $this->delete(route('task_statuses.destroy', ['task_status' => $this->taskStatus]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseMissing('task_statuses', ['id' => $this->taskStatus->id]);
    }

    public function testDestroyWithAssociatedTasks(): void
    {
        $this->actingAs($this->user);
        Task::factory()->create(['status_id' => $this->taskStatus->id]);
        $response = $this->delete(route('task_statuses.destroy', ['task_status' => $this->taskStatus]));
        $this->assertDatabaseHas('task_statuses', ['id' => $this->taskStatus->id]);
        $response->assertRedirect();
    }
}
