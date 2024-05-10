<?php

namespace Tests\Feature;

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
        $this->actingAs($this->user);
        $this->taskStatus = TaskStatus::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task-statuses.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->get(route('task-statuses.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = ['name' => 'TaskStatus'];

        $response = $this->post(route('task-statuses.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testEdit(): void
    {
        $response = $this->get(route('task_statuses.edit', ['task_status' => $this->taskStatus]));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = ['name' => 'NewTaskStatus'];
        $response = $this->patch(route('task_statuses.update', ['task_status' => $this->taskStatus]), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseMissing('task_statuses', ['id' => $this->taskStatus->id]);
    }
}
