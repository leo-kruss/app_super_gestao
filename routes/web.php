<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')
    ->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')
    ->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')
    ->name('site.contato');

Route::get('/login', function(){ return 'Login'; })
    ->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'Clientes'; })
        ->name('app.clientes');

    Route::get('/fornecedores', function(){ return 'Fornecedores'; })
        ->name('app.fornecedores');

    Route::get('/produtos', function(){ return 'Produtos'; })
        ->name('app.produtos');
});

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para a página principal.';
});

// Route::redirect('/rota2', '/rota1');

// Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}',
//  function (string $nome = 'Desconhecido',
//            string $categoria = 'Informação', 
//            string $assunto = 'Contato', 
//            string $mensagem = 'mensagem não informada.'){

//     echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";

// });