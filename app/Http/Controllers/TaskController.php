<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTask = new Task;
        $newTask->name = $request->task['name'];
        $newTask->desc = $request->task['desc'];
        $newTask->save();

        return $newTask;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        
        if($task) {
            $task->name = $request->task["name"];
            $task->desc = $request->task["desc"];
            $task->status = $request->task["status"];
            $task->save();

            return $task;
        }

        return "Item not found.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        if($task) {
            $task->delete();

            return "Task successfully deleted.";
        }

        return "Item not found.";
    }
}
