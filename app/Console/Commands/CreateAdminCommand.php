<?php

namespace App\Console\Commands;

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
    protected $signature = 'users:create_admin_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin';

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
         $user = new User;
         $user->name = 'Tunahan Genç';
         $user->email = 'tunahangncc@gmail.com';
         $user->password = bcrypt('Genc.118267');
         $user->gender = 'male';
         $user->slug = Str::slug('Tunahan Genç', '-');
         $user->images = 'male_user_image.png';
         $user->type = 'admin';
         $user->created_at = now();
         $user->updated_at = now();
         $user->save();

        return 0;
    }
}
