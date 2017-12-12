@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Dashboard" cor="blue">
            <migalhas :lista="{{$listaMigalhas}}"></migalhas>
            <div class="row">
                <div class="col-md-4">
                    <caixa cor="#f39c12" titulo="Artigos" icone="fa fa-file-text-o" url="{{route('artigos.index')}}" qtd="250"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa cor="#00a65a" titulo="Usuários" icone="fa fa-users" url="{{route('usuarios.index')}}" qtd="1350"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa cor="lightblue" titulo="Autores" icone="fa fa-user" url="#" qtd="350"></caixa>
                </div>
            </div>
        </painel>
    </pagina>
@endsection
