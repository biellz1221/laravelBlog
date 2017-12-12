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

        <painel titulo="Lista de Usuários" cor="panel-default">
        <migalhas :lista="{{$listaMigalhas}}"></migalhas>
            <tabela-lista 
                :titulos="['#', 'Nome', 'Email']"
                :itens="{{json_encode($listaModelo)}}"
                criar="#criar" detalhe="/admin/usuarios/" editar="/admin/usuarios/" deletar="/admin/usuarios/" token="{{csrf_token()}}"
                ordem="asc" ordemcol="1" modal="sim"
            ></tabela-lista>
            <div align="center">
                {{$listaModelo}}
            </div>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('usuarios.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" :action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" v-model="$store.state.item.name" id="name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" v-model="$store.state.item.email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" :titulo="'Detalhes do Usuário: '+$store.state.item.name">
        <h4>Email</h4>
        <p>@{{$store.state.item.email}}</p>
    </modal>

@endsection