<?php

use Illuminate\Database\Seeder;
use App\Dossiers_médicales;

class DossierMédicalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dossiers_Médicales::class, 100)->create();
    }
}
