<?php
/**
 * Created by PhpStorm.
 * User: jett.durham
 * Date: 7/19/17
 * Time: 9:44 PM
 */

namespace UserTodo\Repositories\Contracts;


use UserTodo\User;

interface DataRepository
{
    /**
     * Gets user data for a given id
     *
     * @param int $id
     * @return mixed
     */
    public function getUserData(int $id);

    /**
     * Gets all todo data for a given user
     *
     * @param User $user
     * @return array
     */
    public function getTodosForUser(User $user): array;
}