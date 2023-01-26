<h3>Fornecedor</h3>

@php

@endphp

{{-- @dd($fornecedores); --}}

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)
        <br>
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}                
        <hr>
    @empty
        Não existem fornecedores cadastrados.  
    @endforelse  
@endisset

{{-- @if(!($fornecedores[0]['status'] == 'S'))
    Fornecedor inativo
@endif
<br>
<!-- se o retorno da condição for false -->
@unless($fornecedores[0]['status'] == 'S') 
    Fornecedor inativo
@endunless
<br> --}}

{{-- Exemplo do uso de condicional no blade
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}