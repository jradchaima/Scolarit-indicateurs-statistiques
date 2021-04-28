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
          
    $this->call(UsersTableSeeder::class);
        $this->call(EtablissementTableSeeder::class);
        $this->call(RestaurantTableSeeder::class);
        $this->call(FoyerTableSeeder::class);
        $this->call(GouverneratTableSeeder::class);
        $this->call(DossierMédicalesTableSeeder::class);

        $this->call(ElevesTableSeeder::class);
    }
}
