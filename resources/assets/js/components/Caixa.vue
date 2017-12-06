<template>
    <div class="small-box" :style="defineCor">
        <div class="inner">
            <h3>{{qtd}}</h3>

            <p>{{titulo}}</p>
        </div>
        <div class="icon">
            <i :class="icone"></i>
        </div>
        <a :href="url" class="small-box-footer">
            Ver mais <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</template>

<script>
export default {
    props: ['titulo', 'qtd', 'url', 'cor', 'icone'],
    computed: {
        defineCor: function (){
            return "background-color: " + this.cor + " !important;"
        }
    }
    
}
</script>
