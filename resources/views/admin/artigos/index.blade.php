@extends('layouts.app')

@section('content')
    <pagina tamanho="12">

        @if($errors->all())
            <div class="alert alert-danger alert-dismissable" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul style="text-align:left">
                    @foreach($errors->all() as $key => $value)
                        <li>{{$value}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <painel titulo="Lista de Artigos" cor="panel-default">
        <migalhas :lista="{{$listaMigalhas}}"></migalhas>
        
            <tabela-lista 
                :titulos="['#', 'Título', 'Descrição', 'Autor', 'Data']"
                :itens="{{$listaArtigos}}"
                criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{csrf_token()}}"
                ordem="asc" ordemcol="1" modal="sim"
            ></tabela-lista>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo" value="{{old('titulo')}}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição" value="{{old('descricao')}}">
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" name="autor" class="form-control" id="autor" placeholder="Autor" value="{{old('autor')}}">
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" class="form-control" id="conteudo">{{old('conteudo')}}</textarea>
            </div>
            <div class="form-group">
                <label for="Data">Data</label>
                <input type="datetime-local" name="data" class="form-control" id="data" value="{{old('data')}}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" :action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" v-model="$store.state.item.titulo" id="titulo" placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="form-control" v-model="$store.state.item.descricao" id="descricao" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" name="autor" class="form-control" v-model="$store.state.item.autor" id="autor" placeholder="Autor">
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" class="form-control" v-model="$store.state.item.conteudo" id="conteudo"></textarea>
            </div>
            <div class="form-group">
                <label for="Data">Data</label>
                <input type="datetime-local" name="data" class="form-control" v-model="$store.state.item.data" id="data">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" :titulo="'Detalhes do item: '+$store.state.item.titulo">
        <h4>Descrição</h4>
        <p>@{{$store.state.item.descricao}}</p>
        <h4>Autor</h4>
        <p>@{{$store.state.item.autor}}</p>
        <h4>Data</h4>
        <p>@{{$store.state.item.data}}</p>
        <h4>Conteúdo</h4>
        <p>@{{$store.state.item.conteudo}}</p>
    </modal>

@endsection