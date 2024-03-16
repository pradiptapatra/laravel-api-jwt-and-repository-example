<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\TodoInterface;
use App\Models\Todo;

class TodoController extends Controller
{
    protected $todoInterface;
    public function __construct(TodoInterface $todoInterface)
    {
        $this->middleware('auth:api');
        $this->todoInterface = $todoInterface;
    }

    public function index()
    {
        $todos = $this->todoInterface->getTodo();
        return response()->json([
            'status' => 'success',
            'todos' => $todos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $todos = $this->todoInterface->storeTodo([
            'title' => $request->title,
            'description' => $request->description
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Todo created successfully',
            'todo' => $todos,
        ]);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json([
            'status' => 'success',
            'todo' => $todo,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Todo updated successfully',
            'todo' => $todo,
        ]);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Todo deleted successfully',
            'todo' => $todo,
        ]);
    }
}
