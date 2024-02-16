<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ToDoList;
// use Illuminate\Console\View\Components\Task;

class ToDoListController extends Controller
{
    public function index()
    {
        $data['todolist'] = ToDoList::orderBy('id', 'desc')->paginate(5);
        return view('todolist.index', $data);

        // $tasks = ToDoList::all();
        // return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'date_time' => 'required'
        ]);

        $task = new ToDoList;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->date_time = $request->date("Y-m-d H:i", strtotime($request->date_time));

        $task->save();

        return redirect()->route('todolist.index')->with('success', 'Your Task Added Successfully');
    }

    public function show(ToDoList $task)
    {
        return  view('todolist.show', compact('task'));
    }

    public function edit(ToDoList $task)
    {
        return  view('todolist.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_time' => 'required'
        ]);

        $task = ToDoList::find($id);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->date_time = $request->date_time;

        $task->save();

        return redirect()->route('todolist.index')->with('success', 'The task has been updated successfully');
        return redirect()->route('todolist.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(ToDoList $task)
    {
        $task->delete();

        return redirect()->route('todolist.index')
            ->with('success', 'Task deleted successfully');
    }
}
