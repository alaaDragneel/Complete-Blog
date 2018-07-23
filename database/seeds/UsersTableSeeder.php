<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        $user = User::create([
            'name'      => 'alaaDragneel',
            'email'     => 'alaa_dragneel@yahoo.com', 
            'password'  => bcrypt('123123'), 
            'admin'     => true,
        ]);

        $user->profile()->create([
            'avatar'    => '/storage/avatars/danganronpa2.png',
            'about'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, natus rem. Similique vel error quos iure officia dolorum ullam? Recusandae, placeat corrupti nam delectus quis officiis vitae quos aliquam earum.',
            'facebook'  => 'https://www.facebook.com/alaaDragneel',
            'youtube'   => 'https://www.youtube.com/channel/UCXs1efwvDPsTkqxVAp7imYw' 
        ]);
    }
}
