@extends('site.layout')
@section('title', 'Categoria')

@section('conteudo')
<div class="row container">

    <h4>Categoria: {{ $categoria->nome }}</h4>

    @foreach ($produtos as $produto)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ $produto->imagem }}">
                    <a href="{{ route('site.details', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red">
                        <i class="material-icons">
                            <span class="material-icons"> visibility </span>
                        </i>
                    </a>
                </div>
                <div class="card-content">
                    <span class="card-title">{{ $produto->nome }}</span>
                    <p>{{ Str::limit($produto->descricao, 20) }}</p>
                </div>
            </div>
        </div>
    @endforeach

</div>

<div class="row center">
    {{ $produtos->links('custom.pagination') }}
</div>
@endsection