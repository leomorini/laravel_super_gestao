<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();

        return view('app.fornecedor.listar', compact('fornecedores'));
    }

    public function adicionar(Request $request) {
        $msg = '';

        $is_token = $request->input('_token') != '';
        $is_edit = $request->input('id') != '';

        if ($is_token) {
            //Cadastro
            if (!$is_edit) {
                //Validações
                $rules = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
                ];

                $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo Nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email.email' => 'O campo E-mail não foi preenchido corretamente'
                ];

                $request->validate($rules, $feedback);

                $fornecedor = new Fornecedor();
                $fornecedor->create($request->all());

                $msg = 'Cadastro realizado com sucesso!';
            }

            if ($is_edit) {
                $fornecedor = Fornecedor::find($request->input('id'));
                $update = $fornecedor->update($request->all());

                if ($update) {
                    $msg = 'Fornecedor atualizado!';
                } else {
                    $msg = 'Ocorreu um problema, tente novamente!';
                }
            }
        }

        return view('app.fornecedor.adicionar', compact('msg'));
    }

    public function editar($id) {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', compact('fornecedor'));
    }

    public function deletar($id) {

    }
}
