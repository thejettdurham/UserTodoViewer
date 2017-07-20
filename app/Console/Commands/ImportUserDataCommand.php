<?php

namespace UserTodo\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use UserTodo\Jobs\ImportUserDataJob;

class ImportUserDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:user
                            {--all : Import all user data rather than a random user}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports user data from the app-defined data source';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $importAllUsers = $this->option('all');

        if ($importAllUsers) {
            return $this->importAllUsers();
        }

        $importUserId = random_int(1, 10);

        Log::info("Importing data for user {$importUserId}");
        $this->importUserById($importUserId);
    }

    protected function importAllUsers()
    {
        Log::info('Importing all users');
        foreach (range(1, 10) as $i) {
            $this->importUserById($i);
        }
    }

    protected function importUserById(int $id)
    {
        dispatch(new ImportUserDataJob($id));
    }
}
