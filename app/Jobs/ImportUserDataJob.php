<?php

namespace UserTodo\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use UserTodo\Events\UserDataImported;
use UserTodo\Repositories\Contracts\DataRepository;
use UserTodo\Repositories\Contracts\TodoRepository;
use UserTodo\Repositories\Contracts\UserRepository;

class ImportUserDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    /**
     * Create a new job instance.
     *
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @param DataRepository $dataRepo
     * @param UserRepository $userRepo
     * @param TodoRepository $todoRepo
     * @return void
     */
    public function handle(DataRepository $dataRepo, UserRepository $userRepo, TodoRepository $todoRepo)
    {
        $userData  = $dataRepo->getUserData($this->userId);
        $user      = $userRepo->addUserFromData($userData);
        $todosData = $dataRepo->getTodosForUser($user);

        foreach ($todosData as $todoData) {
            $todoRepo->addUserTodoFromData($user, $todoData);
        }

        event(new UserDataImported($user));
    }
}
