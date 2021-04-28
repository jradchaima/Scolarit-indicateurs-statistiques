<?php
use App\Foyer;
use Illuminate\Database\Seeder;

class FoyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Foyer::class, 100)->create();
    }
}
