<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function index() {
        $titulo = 'Contato (teste)';

        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];

        return view('site.contato', compact('titulo', 'motivo_contatos'));
    }

    public function store(Request $request) {
        //$contato = new SiteContato();

        /*
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        */

        //Preenche
        //$contato->fill($request->all());
        //$contato->save();

        //Cria Diretamente
        //$contato->create($request->all());

        //realizar validação dos dados do formulário
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        //SiteContato::create($request->all());
    }

}
