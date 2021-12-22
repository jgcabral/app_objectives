<template>
    <div class="card">
        <div class="card-header bg-primary" style="color:white;">Agregar Objetivo</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="saveObjective()">
                <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <input type="text" class="form-control form-control-sm" name="objective" v-model="description">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">
                    Guardar
                </button>

                <button type="submit" class="btn btn-primary btn-sm" v-on:click="cancelObjective()">
                    Cancelar
                </button>
            </form>
        </div>
    </div>

</template>

<script>
import { eventBus } from '../../app';
    export default {
        props: ['objective'],
        data(){
            return {    
                id: '',            
                description: '',
                editObjective: false
            }
        },

        mounted(){
            this.description = (this.objective)?this.objective.description:'';
            this.id = (this.objective)?this.objective.id: '';
            this.editObjective = (this.objective)?true:false;
        },
       
        methods:{
            saveObjective (){
                if( this.editObjective )
                {
                    
                    let params = {                                        
                        description: this.description,
                        id: this.id
                    }
                                                    

                    axios.put('/objectives', params)
                        .then((response) => {                            
                            const objective = response.data;
                            eventBus.$emit('newObjective', objective);
                        });                    
                }else{
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
                
            },
            cancelObjective(){
                eventBus.$emit('cancelObjective');
            }
        }
    }
</script>
