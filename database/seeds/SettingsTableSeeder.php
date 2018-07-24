<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        Setting::create([
            'site_name'         => 'Complete Blog',
            'contact_number'    => '01096901954',
            'contact_email'     => 'moaalaa16@gmail.com',
            'address'           => 'Imbaba, Giza, Cairo',
            'about'             => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab itaque eius recusandae veniam dolor vero, optio impedit, ipsum ipsa unde illum omnis maxime assumenda accusantium alias hic. Autem, dignissimos repudiandae!',
        ]);
    }
}
