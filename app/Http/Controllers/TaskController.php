<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        $project = Project::findOrFail($request->project_id);
        $priority = $project->tasks()->count() + 1;

        Task::create([
            'name' => $request->name,
            'priority' => $priority,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('projects.show', $request->project_id)
                         ->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->update($request->all());

        return redirect()->route('projects.show', $task->project_id)
                         ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $project_id = $task->project_id;
        $task->delete();

        return redirect()->route('projects.show', $project_id)
                         ->with('success', 'Task deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $sortedIDs = $request->input('sortedIDs');

        foreach ($sortedIDs as $index => $id) {
            $task = Task::find($id);
            $task->priority = $index + 1;
            $task->save();
        }

        return response()->json(['status' => 'success']);
    }

}
