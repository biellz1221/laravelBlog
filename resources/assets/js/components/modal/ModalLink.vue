<template>
    <span>
        <span v-if='item'>
            <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" 
            type="button" 
            :class="css || 'btn btn-primary'" 
            data-toggle="modal" 
            :data-target="'#'+nome"
            @click="preencheFormulario()">
                {{titulo}}
            </button>
            
            <button v-if="tipo == 'button'" 
            type="button" :class="css || 'btn btn-primary'" 
            data-toggle="modal" 
            :data-target="'#'+nome"
            @click="preencheFormulario()">
                {{titulo}}
            </button>
            
            <a v-if="tipo == 'link'" 
            href="#" 
            type="button" 
            :class="css || ''" 
            data-toggle="modal" 
            :data-target="'#'+nome"
            @click="preencheFormulario()">
                {{titulo}}
            </a>
        </span>
        <span v-if='!item'>
            <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" 
            type="button" 
            :class="css || 'btn btn-primary'" 
            data-toggle="modal" 
            :data-target="'#'+nome">
                {{titulo}}
            </button>
            
            <button v-if="tipo == 'button'" 
            type="button" :class="css || 'btn btn-primary'" 
            data-toggle="modal" 
            :data-target="'#'+nome">
                {{titulo}}
            </button>
            
            <a v-if="tipo == 'link'" 
            href="#" 
            type="button" 
            :class="css || ''" 
            data-toggle="modal" 
            :data-target="'#'+nome">
                {{titulo}}
            </a>
        </span>
        <!-- btn default -->
        
    </span>
</template>

<script>
export default {
    props: ['tipo', 'nome', 'titulo', 'css', 'item'],
    methods: {
        preencheFormulario: function(){
            this.$store.commit('setItem', this.item);
            console.log(this.item);
        }
    }
}
</script>