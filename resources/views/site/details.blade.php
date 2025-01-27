@extends('site.layout')
@section('title', 'Detalhes')

@section('conteudo')

<div class="row container"> <br>
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
            <form action="{{ route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->name }}">
                <input type="hidden" name="price" value="{{ $produto->price }}">
                <input type="number" name="qnt" value="1" min="1">
                <input type="hidden" name="image" value="{{ $produto->image }}">
                <button class="btn red">Comprar</button>
            </form>
        </p>
    </div>
</div>
@endsection