<?php


use App\Cliente;
use App\Detento;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'=>'Teste da silva',
            'email'=>'teste@teste.com',
            'cpf'=>'000.000.000-00',
            'type'=>'ADMINISTRADOR',
            'status'=>'Ativo',
            'password'=>Hash::make('teste123')
        ]);

      Cliente::create([
            'name'=>'Teste Cliente',
            'email'=>'teste@cliente.com',
            'cpf'=>'000.000.000-01',
            'type'=>'CLIENTE',
            'status'=>'Ativo',
            'password'=>Hash::make('teste123')
        ]);


       Detento::create([
            'name'=>'Teste Detento',
            'email'=>'teste@detento.com',
            'cpf'=>'000.000.000-02',
            'type'=>'DETENTO',
            'status'=>'Ativo',
            'password'=>Hash::make('teste123')
        ]);
    }
}



