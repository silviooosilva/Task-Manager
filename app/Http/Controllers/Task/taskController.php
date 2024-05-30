<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\taskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{
    public function dashboard()
    {
        return view('home.dashboard', [
            'tasks' => Task::all()
        ]);
    }

    public function create(taskStoreRequest $request)
    {
        $task = new Task();
        $task->task_title = $request->task_title;
        $task->task_description = $request->task_description;
        $task->task_status = $request->task_status;
        $task->owner = Auth::user()->name;
        $task->save();
        return redirect()->back()->with('message', 'Task created successfully')->with('type', 'success');
    }

    public function update(taskStoreRequest $request, int $id)
    {

        if (Task::where('id', $id)->exists()) {
            $task = Task::find($id);
            $task->update([
                'task_title' => $request->task_title,
                'task_description' => $request->task_description,
                'task_status' => $request->task_status,
                'owner' => Auth::user()->name
            ]);

            return redirect()->back()->with('message', 'Updated successfully')->with('type', 'success');
        }
    }

    public function delete(int $id)
    {
        if (Task::where('id', $id)->exists()) {
            $task = Task::find($id);
            $task->delete();
            return redirect()->back()->with('message', 'Deleted successfully')->with('type', 'success');
        }
    }

    public function details(int $id)
    {
        if (Task::where('id', $id)->exists()) {
            $task = Task::where('id', $id)->first();
            return view('home.tasks.show', ['task' => $task]);
        }
    }

    public function show(int $id)
    {

        if (Task::where('id', $id)->exists()) {
            $task = Task::where('id', $id)->first();
            return view('home.tasks.update', ['task' => $task]);
        }
    }
}
