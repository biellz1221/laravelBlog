<template>
    <ol class="breadcrumb">
        <li v-for="(item, index) in lista" :key="index">
            <a :href="item.url" v-if="item.url">{{item.titulo}}</a>
            <span v-if="!item.url">{{item.titulo}}</span>
        </li>
    </ol>
</template>

<script>
export default {
    props: ['lista'],
    computed: {
        defineClass: function() {
            if(this.url) { //this é o item do contexto v-for do <li>
                return "active";
            } else {
                return "";
            };
        },
    },
}
</script>
