<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\AdminInformations;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create_admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin !';

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
     * @return int
     */
    public function handle()
    {
        $name = Str::slug($this->ask('Full Name'), '-');
        $email = $this->ask('E-Mail');

        $checkUser = User::query()->where('email', $email)->first();
        if($checkUser == null)
        {
            $password = $this->secret('password');
            $gender = Str::lower($this->ask('Gender (male / female)'));

            $adminType = Str::slug($this->ask('Admin Type'), '-');
            $status = $this->ask('Status');
            $permissions = $this->ask('Permissions (exp:create/update/delete) (type:create, update, delete, add, ban)');

            $checkAdminType = AdminInformations::query()->where('type', $adminType)->first();
            if($checkAdminType != null && $checkAdminType->type = 'super-admin')
            {
                $this->error('You cannot create a second super admin');
            }
            else
            {
                $user = new User;
                $user->name = $name;
                $user->email = $email;
                $user->password = bcrypt($password);
                $user->gender = $gender;
                $user->slug = Str::slug($name, '-');
                $user->images = ($gender == 'male') ? 'male_user_image.png' : 'female_user_image.png';
                $user->type = 'admin';
                $user->created_at = now();
                $user->updated_at = now();
                $user->save();

                $information = new AdminInformations;
                $information->user_id = $user->id;
                $information->type = Str::slug($adminType, '-');
                $information->status = $status;
                $information->permissions = $permissions;
                $information->about = 'Empty';
                $information->save();

                $address = new Address;
                $address->user_id = $user->id;
                $address->neighbourhood = '---';
                $address->district = '---';
                $address->save();

                $this->info($adminType.' admin created');
            }
        }
        else
        {
            $this->error('This e-mail has an admin');
        }

        return 0;
    }
}
