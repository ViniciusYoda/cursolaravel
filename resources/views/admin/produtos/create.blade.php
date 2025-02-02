<div id="create" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
        <form action="{{route('admin.produto.store')}}" method="POST" enctype="multipart/form-data" class="col s12">
            @csrf

            <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
            <div class="row">
                <div class="input-field col s6">
                    <input name="nome"  id="first_name" type="text" class="validate">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input id="preco" type="number" class="validate">
                    <label for="preco">Preço</label>
                </div>
                <div class="input-field col s12">
                    <input id="descricao" type="text" class="validate">
                    <label for="descricao">Descrição</label>
                </div>

                <div class="input-field col s12">
                    <select name="categoria_id">
                        <option value="" disabled selected>Escolha uma opção</option>

                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <label>Materialize Select</label>
                </div>

                <div class="file-field input-field col s12">
                    <div class="bt">
                        <span>Imagem</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate">
                    </div>
                </div>

            </div>

            <button class="waves-effect waves-green btn green right">Cadastrar</button><br>
    </div>

    </form>
</div>
