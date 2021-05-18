<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Service::create([
               'name'=>'INSULFIM CARRO HATCH',
               'description'=>'INSULFIM CARRO HATCH ',
               'value'=>80.00,
               'detainee'=>90,
               'workshop'=>10
            ]);
    }
}
