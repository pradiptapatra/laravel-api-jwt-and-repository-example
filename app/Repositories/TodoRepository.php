<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Interfaces\TodoInterface;

class TodoRepository implements TodoInterface
{
    public $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function getTodo()
    {
        try {
            $todo = $this->todo->get();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return $todo;
    }

    public function storeTodo($requestArray)
    {
        try {
            $todo = $this->todo->create($requestArray);
            return $todo;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function editTodo()
    {
        try {
            $todo = $this->todo->create($requestArray);
            return $todo;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateTodo()
    {
        try {
            $todo = $this->todo->create($requestArray);
            return $todo;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function deleteTodo($requestArray)
    {
        try {
            $todo = $this->todo->create($requestArray);
            return $todo;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}