<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
        'site_name' => 'Laravel Blog',
        'contact_number' => '9876 878 187',
        'contact_email' => 'Laravelll@afsa.com',
        'address' => 'Koramangala,Banaglore'
        ]);
    }
}
