<?php

namespace Database\Seeders;

use App\Models\Utility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // DB::unprepared(File::get('gfsmanager.sql')); 

        $this->call(NotificationSeeder::class);
        Artisan::call('module:migrate LandingPage');
        Artisan::call('module:seed LandingPage');

        if(\Request::route()->getName()!='LaravelUpdater::database')
        {
            $this->call(UsersTableSeeder::class);
            $this->call(AiTemplateSeeder::class);
            $this->call(PipelineSeeder::class);

        }else{
            Utility::languagecreate();

        }

    }
}
