@extends('site.layout')
@section('title', 'Carrinho')

@section('conteudo')
<div class="row container">

    @if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
                <span class="card-title">Parabéns</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($mensagem = Session::get('aviso'))
        <div class="card blue">
            <div class="card-content white-text">
                <span class="card-title">Tudo bem</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    <h4>Seu carrinho possui: {{ $itens->count() }}</h4>

    <table class="striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
                <tr>
                    <td><img src="{{ $item->image }}" alt="img" class="responsive-img circle" style="width: 70px;"></td>
                    <td>{{ $item->name }}</td>
                    <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                    {{--Btn atualiza--}}
                    
                    <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <td><input style="width: 40px; font-weight: 900;" class="white center" type="number" name="quantity"
                                value="{{ $item->qnt }}"></td>
                        <td>
                            <button class="btn-floating waves-effect waves-light orange">
                                <i class="material-icons">refresh</i>
                            </button>
                    </form>
                    {{--Btn remove--}}
                    @csrf
                    <form action="{{route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <button class="btn-floating waves-effect waves-light red">
                            <i class="material-icons">delete</i>
                        </button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row container center">
        <button class="btn waves-effect waves-light blue"> Continuar comprando <i class="material-icons right">arrow_back</i> </button>
        <a href="{{ route('site.limparcarrinho')}}" class="btn waves-effect waves-light blue"> Limpar carrinho <i class="material-icons right">clear</i> </a>
        <button class="btn waves-effect waves-light green"> Finalizar compra <i class="material-icons right">check</i> </button>
    </div>

</div>


@endsection