<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 2)->create();
        $brands = factory(App\Brand::class, 5)->create();
        $components = factory(App\Component::class, 30)->create();
        $computers = factory(App\Computer::class, 20)->create();


        $components->each(function(App\Component $component) use ($computers){
            $component->computers()->attach(
                $computers->random(random_int(1,5))
            );
        });
    }
}
