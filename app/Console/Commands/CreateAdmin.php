<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a default administrator';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = new User;
        $user->firstName = $this->ask('What is your first name ?');
        $user->lastName = $this->ask('What is your last name ?');
        $user->email = $this->ask('What is your email address ?');
        $user->password = Hash::make($this->secret('Write your password:'));
        $passwordConfirm = $this->secret('Confirm your password:');
        $user->birthDate = Date::create(1970, 1, 1);
        $user->role = 'ADMIN';
        $user->gender = 'M';

        if(!Hash::check($passwordConfirm, $user->password)){

            $this->error('The password does not match !');

            return Command::INVALID;
        }

        $this->line('Full name: '.$user->lastName.' '.$user->firstName);
        $this->line('Email: '.$user->email);
        $this->line('Role: '.$user->role);

        if($this->confirm('Are you sure to the informations that you are provided ?')){

            $user->save();

            event(new Registered($user));

            $this->info('The admin was successfully created ! Check your mailbox to confirm it');

            return Command::SUCCESS;
        }

        $this->error('The operation was interrupted or failed !');

        return Command::FAILURE;
    }
}
