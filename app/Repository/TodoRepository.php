<?php

namespace App\Repository;

use App\Todo;

class TodoRepository
{
    /**
     *
     */
    private $todo;

    /**
     * @param Todo $todo
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Return all Todo's
     */
    public function getAll()
    {
        return $this->todo->all();
    }

    /**
     * Return a single Todo
     * @param $id
     */
    public function read($id)
    {
        return $this->todo->where('id',$id)->first();
    }

    /** Creat e todo
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        if(!is_null($data['title'] && !is_null($data['body']))){
            $todo        = new Todo();
            $todo->title = $data['title'];
            $todo->body  = $data['body'];
            $todo->save();

            return $todo;
        }
        
        return "Kindly provide title and body of the todo";
       
    }

    /** Update a todo
     * @param array $data
     * @param $id
     * @return
     */
    public function update(array $data,$id)
    {
        $todo         = $this->todo->where('id',$id)->first();
        $todo->body   = $data['body'] ? $data['body'] : $todo->body;
        $todo->title  = $data['title'] ? $data['title'] : $todo->title;
        $todo->save();

        return $todo;
    }

    /** Delete a todo
     * @param $id
     * @return
     */
    public function delete($id)
    {
       return  $this->todo->where('id',$id)->delete();
    }
}