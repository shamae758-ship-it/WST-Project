<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|max:255',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => 'Pending',
        ]);

        return back();
    }

    public function toggleStatus(Task $task)
    {
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();

        return back();
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|max:255',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
        ]);

        return redirect()->to('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}