<?php
use App\Etablissement;
use Illuminate\Database\Seeder;


class EtablissementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Etablissement::class, 100)->create();
    }
}
