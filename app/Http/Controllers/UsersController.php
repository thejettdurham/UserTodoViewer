<?php

namespace UserTodo\Http\Controllers;

use BadMethodCallException;
use Illuminate\Http\Request;
use UserTodo\Repositories\Contracts\UserRepository;
use UserTodo\User;

class UsersController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $repo)
    {
        $this->userRepository = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userRepository->getAllUsers();
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     * @throws BadMethodCallException
     */
    public function create()
    {
        throw new BadMethodCallException("User create route not implemented");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        throw new BadMethodCallException("User store route not implemented");
    }

    /**
     * Display the specified resource.
     *
     * @param  \UserTodo\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \UserTodo\User $user
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function edit(User $user)
    {
        throw new BadMethodCallException("User edit route not implemented");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \UserTodo\User $user
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function update(Request $request, User $user)
    {
        throw new BadMethodCallException("User update route not implemented");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \UserTodo\User $user
     * @return \Illuminate\Http\Response
     * @throws \BadMethodCallException
     */
    public function destroy(User $user)
    {
        throw new BadMethodCallException("User destroy route not implemented");
    }
}
