<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background-color: #f4f5f7; margin: 0; padding: 20px; display: flex; justify-content: center; }
        .container { width: 100%; max-width: 400px; }
        .header { font-size: 24px; font-weight: bold; margin-bottom: 20px; }
        .card { background: #ffffff; border-radius: 12px; padding: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); margin-bottom: 20px; }
        .form-input { width: 100%; padding: 10px 12px; margin-bottom: 12px; border: 1px solid #e1e4e8; border-radius: 8px; box-sizing: border-box; font-size: 14px; }
        .btn-add { width: 100%; background-color: #24292e; color: #ffffff; border: none; padding: 10px; border-radius: 8px; font-weight: 600; cursor: pointer; }
        .section-title { font-size: 20px; font-weight: bold; margin: 20px 0 12px 0; }
        .task-card { background: #ffffff; border-radius: 12px; padding: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); margin-bottom: 12px; }
        .task-title { font-size: 16px; font-weight: bold; margin: 0 0 6px 0; color: #1a1a1a; }
        .task-title.completed { text-decoration: line-through; color: #8c8c8c; }
        .task-desc { font-size: 14px; color: #666666; margin: 0 0 14px 0; }
        .btn-complete { width: 100%; background-color: #24292e; color: #ffffff; border: none; padding: 10px; border-radius: 8px; font-weight: bold; cursor: pointer; margin-bottom: 8px; }
        .btn-complete.is-completed { background-color: #6c757d; }
        .btn-delete { width: 100%; background-color: #e55353; color: #ffffff; border: none; padding: 10px; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .action-links { text-align: right; margin-bottom: 6px; }
        .edit-link { font-size: 12px; color: #0066cc; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <div class="header"> My Personal Task Manager</div>

    <div class="card">
        <form action="/tasks" method="POST">
            @csrf
            <input type="text" name="task_name" class="form-input" placeholder="Enter task title" required>
            <input type="text" name="description" class="form-input" placeholder="Enter description">
            <button type="submit" class="btn-add">+ Add Task</button>
        </form>
    </div>

    <div class="section-title">My Tasks</div>

    @forelse($tasks as $task)
        <div class="task-card">
            <div class="action-links">
                <a href="/tasks/{{ $task->id }}/edit" class="edit-link">Edit</a>
            </div>
            
            <div class="task-title {{ $task->status === 'Completed' ? 'completed' : '' }}">
                {{ $task->task_name }}
            </div>
            
            <div class="task-desc">
                {{ $task->description ?? 'No description' }}
            </div>

            <form action="/tasks/{{ $task->id }}/toggle" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-complete {{ $task->status === 'Completed' ? 'is-completed' : '' }}">
                     {{ $task->status === 'Completed' ? 'Mark Pending' : 'Complete' }}
                </button>
            </form>

            <form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('Delete this task?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Delete</button>
            </form>
        </div>
    @empty
        <p style="color: #888;">No tasks added yet.</p>
    @endforelse
</div>

</body>
</html>