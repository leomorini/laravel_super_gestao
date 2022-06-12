<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;

    //Define o nome da tabela caso o Laravel não consiga detectar automaticamente
    protected $table = 'fornecedores';

    //Habilita que possamos usar as essas colunas nas funções/métodos estáticos do Model
    protected $fillable = [
        'nome',
        'site',
        'uf',
        'email'
    ];

    /**
     * Métodos Nativos
     *  ::all() -> Traz todos os registros
     *  ::toArray() => Converte um grupo de registros para formato array
     *  ::find($id ?? [$id, $id2, $id3, ...]) => Traz 1 ou mais resultados baseados nos ids passados.
     *  ::where('id', 'operador (>, <, =, <>, ==, like)', 'valor') => Traz resultados baseados nas condições passadas
     *  ::whereIn('campo_a_ser_comparado', 'conjunto de params [array]') => Traz os resultados que baterem com os params
     *  ::whereNotIn('campo_a_ser_comparado', 'conjunto de params [array]') => Traz os resultados que não baterem com os params
     *  ::whereBetween('id', [1, 3]) => Traz os resultados que estejam dentro do intervalo (1, 2 e 3)
     *  ::whereNotBetween('id', [1, 3]) => Traz os resultados que não estejam dentro do intervalo
     */

}
