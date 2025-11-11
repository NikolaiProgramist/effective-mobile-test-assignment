<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function testTasksIsDisplayed(): void
    {
        $response = $this->get(route('tasks.index'));

        $response->assertOk();
    }

    public function testCreateTask(): void
    {
        $task = Task::factory()->make()->toArray();

        $this->assertDatabaseMissing('tasks', $task);

        $response = $this->post(
            route('tasks.store'),
            $task
        );

        $response->assertCreated();

        $this->assertDatabaseHas('tasks', $task);
    }

    public function testTaskIsDisplayed(): void
    {
        $task = Task::factory()->create();

        $response = $this->get(route('tasks.show', $task->id));

        $response->assertOk();
    }

    public function testTaskIsNotFound(): void
    {
        $response = $this->get(route('tasks.show', 1));

        $response->assertNotFound();
    }

    public function testUpdateTask(): void
    {
        $task = Task::factory()->create();

        $this->assertDatabaseHas('tasks', [
            'title' => $task->title
        ]);

        $this->assertDatabaseMissing('tasks', [
            'title' => 'Updated name'
        ]);

        $response = $this->put(route('tasks.update', $task), [
            'title' => 'Updated name'
        ]);

        $response->assertOk();

        $this->assertDatabaseMissing('tasks', [
            'title' => $task->title
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Updated name'
        ]);
    }

    public function testDeleteTask(): void
    {
        $task = Task::factory()->create();

        $this->assertDatabaseHas('tasks', [
            'title' => $task->title
        ]);

        $response = $this->delete(route('tasks.destroy', $task));

        $response->assertNoContent();

        $this->assertDatabaseMissing('tasks', [
            'title' => $task->title
        ]);
    }
}
