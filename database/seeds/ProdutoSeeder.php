<?php

use Illuminate\Database\Seeder;
use App\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'nome' => 'Geladeira',
            'descricao' => 'Branca',
            'peso' => 20,
            'unidade_id' => 1
        ]);

        Produto::create([
            'nome' => 'Sementes',
            'descricao' => 'Melancia',
            'peso' => 1,
            'unidade_id' => 2
        ]);
    }
}
