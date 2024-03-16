<?php

namespace App\Interfaces;

interface TodoInterface
{
    public function getTodo();
    public function storeTodo($requestArray);
    public function editTodo();
    public function updateTodo();
    public function deleteTodo($advert_id);
}
