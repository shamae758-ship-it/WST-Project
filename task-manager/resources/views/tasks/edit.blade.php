<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background-color: #f4f5f7; padding: 20px; display: flex; justify-content: center; }
        .container { width: 100%; max-width: 400px; }
        .card { background: white; border-radius: 12px; padding: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
        .form-input { width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #e1e4e8; border-radius: 8px; box-sizing: border-box; }
        .btn-save { width: 100%; background: #24292e; color: white; padding: 10px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .cancel-link { display: block; text-align: center; margin-top: 10px; color: #666; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="container">
    <h2 style="margin-bottom: 12px;">Edit Task</h2>
    <div class="card">
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="task_name" value="{{ $task->task_name }}" class="form-input" required>
            <input type="text" name="description" value="{{ $task->description }}" class="form-input">
            <button type="submit" class="btn-save">Update Task</button>
            <a href="/tasks" class="cancel-link">Cancel</a>
        </form>
    </div>
</div>

</body>
</html>