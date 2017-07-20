<?php

namespace UserTodo\Http\Controllers;

use BadMethodCallException;
use Illuminate\Http\Request;
use UserTodo\Repositories\Contracts\TodoRepository;
use UserTodo\Todo;
use UserTodo\User;

class TodosController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepository $repo)
    {
        $this->todoRepository = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \UserTodo\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return $this->todoRepository->getTodosByUser($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \UserTodo\User $user
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function create(User $user)
    {
        throw new BadMethodCallException("Create todo route not implemented");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \UserTodo\User $user
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function store(Request $request, User $user)
    {
        throw new BadMethodCallException("Store todo route not implemented");
    }

    /**
     * Display the specified resource.
     *
     * @param  \UserTodo\User $user
     * @param  \UserTodo\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Todo $todo)
    {
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \UserTodo\User $user
     * @param  \UserTodo\Todo $todo
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function edit(User $user, Todo $todo)
    {
        throw new BadMethodCallException("Edit todo route not implemented");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \UserTodo\User $user
     * @param  \UserTodo\Todo $todo
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function update(Request $request, User $user, Todo $todo)
    {
        throw new BadMethodCallException("Update todo route not implemented");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \UserTodo\User $user
     * @param  \UserTodo\Todo $todo
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function destroy(User $user, Todo $todo)
    {
        throw new BadMethodCallException("Destroy todo route not implemented");
    }
}
