<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class, 'task_status');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::paginate(15);

        return view('task_status.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taskStatuses = new TaskStatus();

        return view('task_status.create', compact('taskStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate(
            $request,
            [
                'name' => 'required|unique:task_statuses'
            ],
            [
                'name.unique' => __('task_statuses.validation.unique')
            ]
        );

        $taskStatuses = new TaskStatus();
        $taskStatuses->fill($validatedData);
        $taskStatuses->save();
        flash(__('flashes.task_statuses.store'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_status.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskStatus $taskStatus)
    {
        $validatedData = $this->validate(
            $request,
            [
                'name' => 'required|unique:task_statuses,name,' . $taskStatus->id
            ],
            [
                'name,unique' => __('task_statuses.validation.unique')
            ]
        );

        $taskStatus->fill($validatedData);
        $taskStatus->save();
        flash(__('flashes.task_statuses.updated'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->tasks()->exists()) {
            flash(__('flashes.task_statuses.error'))->error();
            return back();
        }

        $taskStatus->delete();
        flash(__('flashes.task_statuses.deleted'))->success();

        return redirect()->route('task_statuses.index');
    }
}
