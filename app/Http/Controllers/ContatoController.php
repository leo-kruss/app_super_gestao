<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller {

    public function contato(Request $request){
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(request $request){

        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:500'
        ],
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome pode ter no máximo 40 caracteres',
            'nome.unique' => 'Esse nome já está cadastrado.',
            'telefone.required' => 'O campo telefone precisa ser preenchido.',
            'email' => 'O campo e-mail é obrigatório.',
            'motivo_contatos_id.required' => 'O campo Motivo Contato deve ser selecionado de acordo com a sua solicitação.',
            'mensagem.required' => 'O campo mensagem deve ser preenchido.',
            'mensagem.max' => 'O campo mensagem pode ter até 500 caracteres.'
        ]
    );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
