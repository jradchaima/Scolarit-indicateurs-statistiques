<?php
use App\Gouvernerat;
use Illuminate\Database\Seeder;

class GouverneratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gouvernerat::class, 100)->create();
    }
}
