<template>
    <div class="card">
        <div class="card-header bg-primary" style="color:white;">Agregar Objetivo</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newObjective()">
                <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <input type="text" class="form-control form-control-sm" name="objective" v-model="description">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">
                    Guardar
                </button>

                <button type="submit" class="btn btn-primary btn-sm">
                    Cancelar
                </button>
            </form>
        </div>
    </div>

</template>

<script>
import { eventBus } from '../../app';
    export default {
        data(){
            return {    
                id: '',            
                description: ''
            }
        },

        created: function(){
            eventBus.$on('editObjective', function (data) { 
                console.log(data);                          
                this.description = data.description;
                this.id = data.id;                                               
            }.bind(this));
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
                        eventBus.$emit('newObjective', objective);
                    });
            }
        }
    }
</script>
