<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

/**
 * Create a new API token for the given user id
 */
class CreateApiToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:create-token {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new API token for the given user id';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $user_id = $this->argument('user_id');

        $user = User::find($user_id);

        if (!$user) {
            $this->error("User not found");
            return;
        }

        $token = $user->createToken(Str::random(60))->plainTextToken;

        $this->info("Token: $token");

    }



}
