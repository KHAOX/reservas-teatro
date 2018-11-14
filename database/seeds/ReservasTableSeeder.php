<?php

use Illuminate\Database\Seeder;
use app\Reservas;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reservas::class,5)->create();
    }
}
