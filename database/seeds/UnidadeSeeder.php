<?php

use Illuminate\Database\Seeder;
use App\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create([
            'unidade' => 'KG',
            'descricao' => 'Unidade em KG',
        ]);

        Unidade::create([
            'unidade' => 'G',
            'descricao' => 'Unidade em G',
        ]);

        Unidade::create([
            'unidade' => 'L',
            'descricao' => 'Unidade em L',
        ]);
    }
}
