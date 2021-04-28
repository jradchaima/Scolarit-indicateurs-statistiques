<?php
use App\Eleve;
use Illuminate\Database\Seeder;

class ElevesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Eleve::class, 100)->create();
    }
}
