<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoStoreRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
//        $todo = Todo::all();
// return $todo;

         return Todo::all();
    }


    public function store(TodoStoreRequest $request)
    {
        // $todo = Todo::create($request->validated());
        // return $todo;
        return Todo::create([
            'title'=>$request->title,
            'alertAt'=>$request->alertAt,
            'isDone'=>$request->isDone
        ]);
    }


    public function show(Todo $todo)
    {
        return $todo;
    }


    public function update(TodoStoreRequest $request, Todo $todo)
    {
        // $todo->update($request->validated());
        // return $todo;
        $todo->update([
            'title' => $request->title,
            'alertAt' => $request->alertAt,
            'isDone' => $request->isDone
        ]);
        return $todo;
    }


    public function destroy(Todo $todo)
    {
        // $todo->delete();
        // return $todo;
        return $todo->delete();
    }
}
