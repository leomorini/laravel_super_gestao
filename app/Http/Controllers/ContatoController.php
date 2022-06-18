<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function index() {
        $titulo = 'Contato (teste)';
        $motivo_contatos = MotivoContato::all();

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
        //para campos unicos usar: unique:<nome_da_tabela>
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }

}
