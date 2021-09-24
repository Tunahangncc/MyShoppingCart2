<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Created user !';

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
        $createType = Str::lower($this->ask('How would you like to create the user? (manual / automatic)'));

        if($createType == 'manual')
        {
            $name = $this->ask('Full Name');
            $email = $this->ask('E-Mail');
            $password = $this->secret('Password');
            $gender = Str::lower($this->ask('Gender (male / female)'));

            //Ask birthday
            $askBirthDay = Str::lower($this->ask('Do you want to enter the birthday date? (yes / no)'));
            $date = '';
            if($askBirthDay == 'yes')
            {
                $day = $this->ask('Day');
                $month = $this->ask('Month');
                $year = $this->ask('Year');
                $abbreviation = '';

                switch ($month)
                {
                    case 'January':
                    case 'january':
                        $abbreviation = 'Jan';
                        break;
                    case 'February':
                    case 'february':
                        $abbreviation = 'Feb';
                        break;
                    case 'March':
                    case 'march':
                        $abbreviation = 'Mar';
                        break;
                    case 'April':
                    case 'april':
                        $abbreviation = 'Apr';
                        break;
                    case 'May':
                    case 'may':
                        $abbreviation = 'May';
                        break;
                    case 'June':
                    case 'june':
                        $abbreviation = 'June';
                        break;
                    case 'July':
                    case 'july':
                        $abbreviation = 'July';
                        break;
                    case 'August':
                    case 'august':
                        $abbreviation = 'Aug';
                        break;
                    case 'September':
                    case 'september':
                        $abbreviation = 'Sep';
                        break;
                    case 'October':
                    case 'october':
                        $abbreviation = 'Oct';
                        break;
                    case 'November':
                    case 'november':
                        $abbreviation = 'Nov';
                        break;
                    case 'December':
                    case 'december':
                        $abbreviation = 'Dec';
                        break;
                }

                $date = $day.'/'.$abbreviation.'/'.$year;
            }

            //Ask address
            $askAddress = Str::lower($this->ask('Do you want to enter your address information? (yes / no)'));
            $neighbourhood = '';
            $district = '';
            if($askAddress == 'yes')
            {
                $neighbourhood = $this->ask('Enter your neighbourhood');
                $district = $this->ask('Enter your district');
            }

            //Create User
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->gender = ($gender != 'male' || $gender != 'female') ? 'male' : 'female';
            $user->date_of_birth = ($date == '') ? '00/Feb/0000' : $date;
            $user->slug = Str::slug($name, '-');
            $user->images = ($gender != 'male' || $gender != 'female') ? 'male_user_image.png' : 'female_user_image.png';
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();

            //Create Address
            Address::create([
                'user_id' => $user->id,
                'neighbourhood' => $neighbourhood,
                'district' => $district,
            ]);

            $this->info('User successfully created');
        }
        else if($createType == 'automatic')
        {
            $faker = Faker::create();
            $genderArray= array('male', 'female');

            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $fulName = $firstName.' '.$lastName;

            $gender = $genderArray[rand(0, 1)];

            $user = new User;
            $user->name = $fulName;
            $user->email = $faker->email();
            $user->password = bcrypt('Deneme.123456');
            $user->gender = $gender;
            $user->slug = Str::slug($fulName, '-');
            $user->images = ($gender == 'male') ? 'male_user_image.png' : 'female_user_image.png';
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();

            Address::create([
                'user_id' => $user->id
            ]);

            $this->info('User successfully created');
        }
        return 0;
    }
}
