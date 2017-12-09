<template>
    <div>
        <div class="form-inline">
            <a v-if="criar && !modal" :href="criar">Criar Novo</a>
            <modal-link v-if="criar && modal" tipo="link" titulo="Criar" nome="adicionar" css="btn-cria-teste"></modal-link>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar..." v-model="buscar">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="titulos-lista-itens" v-for="(titulo, index) in titulos" :key="titulo" @click="ordenaColuna(index)">{{titulo}}</th>
                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista" :key="index">
                    <td v-for="(i,index) in item" :key="index">{{i}}</td>
                    <td v-if="detalhe || editar || deletar">
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">
                            
                            <modal-link v-if="detalhe && modal" tipo="link" :url='detalhe' :item='item' titulo="Detalhes" nome="detalhe" css=""></modal-link>
                            <a v-if="detalhe && !modal" :href="detalhe">Detalhe</a> | 
                            
                            <modal-link v-if="editar && modal" tipo="link" :url='editar' :item='item' titulo="Editar" nome="editar" css=""></modal-link>
                            <a v-if="editar && !modal" :href="editar">Editar</a> | 
                            
                            <a v-if="deletar" :href="deletar" @click="executaForm(index)">Deletar</a> 
                        </form>
                        <span v-if="!token">
                            <modal-link v-if="detalhe && modal" tipo="link" :url='detalhe' :item='item' titulo="Detalhes" nome="detalhe" css=""></modal-link>
                            <a v-if="detalhe && !modal" :href="detalhe">Detalhe</a> | 
                            
                            <modal-link v-if="editar && modal" tipo="link" :url='editar' :item='item' titulo="Editar" nome="editar" css=""></modal-link>
                            <a v-if="editar && !modal" :href="editar">Editar</a> | 
                            
                            <a v-if="deletar" :href="deletar">Deletar</a>
                        </span>
                        <span v-if="token && !deletar">
                            <modal-link v-if="detalhe && modal" tipo="link" :url='detalhe' :item='item' titulo="Detalhes" nome="detalhe" css=""></modal-link>
                            <a v-if="detalhe && !modal" :href="detalhe">Detalhe</a> | 
                            
                            <modal-link v-if="editar && modal" tipo="link" :url='editar' :item='item' titulo="Editar" nome="editar" css=""></modal-link>
                            <a v-if="editar && !modal" :href="editar">Editar</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordem', 'ordemcol', 'modal'],
    data: function() {
        return {
            buscar: '',
            ordemAux: this.ordem || "asc",
            ordemAuxCol: this.ordemcol || 0
        }
    },
    methods: {
        executaForm: function(index){
            document.getElementById(index).submit;
        },
        ordenaColuna: function(coluna) {
            this.ordemAuxCol = coluna;
            if(this.ordemAux.toLowerCase() == "asc") {
                this.ordemAux = "desc";
            } else {
                this.ordemAux = "asc";
            }
        },
    },
    computed: {
        lista: function(){

            let ordem = this.ordemAux;
            let ordemCol = this.ordemAuxCol;
            ordem = ordem.toLowerCase();
            ordemCol = parseInt(ordemCol);

            if (ordem == "asc") {
                this.itens.sort(function(a,b){
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return 1};
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return -1};
                    return 0;
                })
            } else {
                this.itens.sort(function(a,b){
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return 1};
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return -1};
                    return 0;
                })
            }

            if(this.buscar) {
                return this.itens.filter(res => {
                    res = Object.values(res);
                    for (let k = 0; k < res.length; k++) {
                        if ((res[k]+"").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) {
                            return true;
                        };
                    };
                    return false
                });
            };
            return this.itens;
        }
    }
}
</script>