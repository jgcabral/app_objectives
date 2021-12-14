<template>
    <div class="card">
        <div class="card-header">Agregar Objetivo</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newObjective()">
                <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <input type="text" class="form-control form-control-sm" name="objective" v-model="description">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">
                    Guardar
                </button>
            </form>
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {                
                description: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            newObjective (){
                let params = {                                        
                    description: this.description
                }
                this.description = '';                

                axios.post('/objectives', params)
                    .then((response) => {
                        const objective = response.data;
                        this.$emit('new', objective);
                    });
            }
        }
    }
</script>
