<template>
    <form :class="css" :action="action" :method="defineMetodo" :enctype="enctype" role="form">
        <input v-if="alterMethod" type="hidden" name="_method" :value="alterMethod">
        <input v-if="token" type="hidden" name="_token" :value="token">
        <slot></slot>
    </form>
</template>

<script>
export default {
    props: ['css', 'action', 'method', 'enctype', 'token'],
    data: () => {
        return {
            alterMethod: '',
        }
    },
    computed: {
        defineMetodo: function(){
            if(this.method.toLowerCase() == 'post' || this.method.toLowerCase() == 'get') {
                return this.method.toLowerCase();
            } else if (this.method.toLowerCase() == 'put') {
                this.alterMethod = "put";
            } else if(this.method.toLowerCase() == 'delete'){
                this.alterMethod = "delete";
            }
            else {
                return 'post'
            }
        }
    }
}
</script>