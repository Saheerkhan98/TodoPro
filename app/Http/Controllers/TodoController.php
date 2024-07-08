<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoStoreRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
    public function index()
    {
//        $todos = Todo::all();
// return $todos;    

         return $todos::all();
    }

    
    public function store(TodoStoreRequest $request)
    {
        // $todos = Todo::create($request->validated());
        // return $todos;
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
        return $todo->$request->update();
    }

    
    public function destroy(Todo $todo)
    {
        // $todo->delete();
        // return $todo;
        return $todo->delete();
    }   
}
