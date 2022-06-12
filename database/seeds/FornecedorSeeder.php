<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Forma simples
        // $fornecedor = new Fornecedor();
        // $fornecedor->nome = 'Fornecedor100';
        // $fornecedor->site = 'fornecedor100.com.br';
        // $fornecedor->uf = 'CE';
        // $fornecedor->email = 'contato@fornecedor100.com.br';
        // $fornecedor->save();

        //Forma mais correta
        Fornecedor::create([
            'nome' => 'Fornecedor100',
            'site' => 'fornecedor100.com.br',
            'uf' => 'CE',
            'email' => 'contato@fornecedor100.com.br'
        ]);
    }
}
