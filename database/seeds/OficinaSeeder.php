<?php

use App\Oficina;
use Illuminate\Database\Seeder;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Oficina::create([
            'name'=>'GERAL',
            'description'=>'GERAL',
            'status'=>'ATIVO'
        ]);
    }
}
