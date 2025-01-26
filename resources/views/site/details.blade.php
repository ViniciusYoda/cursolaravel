@extends('site.layout')
@section('title', 'Detalhes')

@section('conteudo')

<div class="row container">
    <div class="col s12 m6">
        <img src="{{ $produto->imagem }}" alt="img" class="responsive-img">
    </div>
    <div class="col s12 m6">
        <h4>{{ $produto->nome }}</h4>
        <blockquote>
            {{ $produto->descricao }}
        </blockquote>
        <blockquote>
            Postado por: {{ $produto->user->firstName }}
           
        </blockquote>
        <p><b>R$ {{ number_format($produto->preco, 2, ',', '.') }}</b></p>
        <p>
            <button class="btn red">Comprar</button>
        </p>
    </div>
</div>
@endsection