<?php

namespace Tests\Feature\Commands;

use Tests\TestCase;

class AdminCreationTest extends TestCase
{
    /**
     * Check if every questions behave as expected
     * 
     * @return void
     */
    public function test_command_while_everything_runs_as_expected()
    {
        $this->artisan('admin:generate')
            ->expectsQuestion('What is your first name ?', 'John')
            ->expectsQuestion('What is your last name ?', 'Doe')
            ->expectsQuestion('What is your email address ?', 'johndoe@gmail.com')
            ->expectsQuestion('Write your password:', 'password')
            ->expectsQuestion('Confirm your password:', 'password')
            ->expectsConfirmation('Are you sure to the informations that you are provided ?', 'yes')
            ->expectsOutput('The admin was successfully created ! Check your mailbox to confirm it')
            ->assertSuccessful();
    }

    /**
     * Check if it raise an error while the two passwords fields do not match
     * 
     * @return void
     */
    public function test_command_execution_will_stop_when_passwords_do_not_match()
    {
        $this->artisan('admin:generate')
            ->expectsQuestion('What is your first name ?', 'John')
            ->expectsQuestion('What is your last name ?', 'Doe')
            ->expectsQuestion('What is your email address ?', 'johndoe@gmail.com')
            ->expectsQuestion('Write your password:', 'password')
            ->expectsQuestion('Confirm your password:', 'mypassword')
            ->expectsOutput('The password does not match !')
            ->assertFailed();
    }
}
