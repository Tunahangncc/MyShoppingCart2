<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CreateUserCommand extends Command
{
    protected $signature = 'app:create-user {name?} {username?} {password?} {phone?} {email?} {is_admin?}';

    protected $description = 'Create User Command';

    public function handle()
    {
        $name = $this->argument('name');
        $password = $this->argument('username');
        $username = $this->argument('password');
        $phone = $this->argument('phone');
        $email = $this->argument('email');
        $isAdmin = $this->argument('is_admin') ?? 0;

        if (! $name) {
            $name = $this->ask('Name');
        }

        if (! $username) {
            $username = Str::slug($this->ask('Username'), '_');
        }

        if (! $password) {
            $password = $this->ask('Password');
        }

        if (! $phone) {
            $phone = $this->ask('Phone Number');
        }

        if (! $email) {
            $email = $this->ask('Email Address');
        }

        if ($this->isUsernameUnique($username)) {
            $username = Str::slug($username.rand(0, 999999), '_');

            $this->info('Username Available. Username assigned to you :'.$username);
        }

        try {
            User::query()->create([
                'name' => $name,
                'username' => $username,
                'password' => bcrypt($password),
                'phone' => $phone,
                'email' => $email,
                'is_admin' => $isAdmin
            ]);
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }

        $this->info('User Created !');
    }

    private function isUsernameUnique($username): bool
    {
        return User::query()->where('username', $username)->exists();
    }
}
