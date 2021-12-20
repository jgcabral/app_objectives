

<template>
    <div class="card mb-3">
        <div class="card-header text-white  bg-primary">Agregar Meta</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newGoal()">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Objetivo</label>                        
                        <input type="text" v-model="objective.description" class="form-select form-control" disabled="disabled">

                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" name="goal" v-model="description">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Estimacion</label>
                        <select name="time_id" v-model="approachSelected" class="form-select form-control">                            
                            <option v-for="item in approachs" :value="item" :key="item.id">{{ item.description }}</option>                        
                        </select>
                    </div>
               </div>     

                <button type="submit" class="btn btn-primary">
                    Guardar
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
                description: '',
                objectives: [],                
                approachSelected: null,
                approachs: [ 
                            { id: 60, description: "1 Hora" }, 
                            { id: 120, description: "2 Horas" }, 
                            { id: 240, description: "4 Horas" },
                            { id: 480, description: "8 Horas" },
                            { id: 960, description: "16 Horas" },
                            { id: 1920, description: "24 Horas" },
                            { id: 3840, description: "48 Horas" },
                            { id: 7680, description: "72 Horas" },
                            { id: 10080, description: "1 Semana" },
                            { id: 20160, description: "2 Semanas" },
                            { id: 30240, description: "3 Semanas" },
                            { id: 43800, description: "1 Mes" },
                            { id: 87600.1, description: "2 Meses" },
                            { id: 175200, description: "4 Meses" },
                            { id: 262800, description: "6 Meses" }  
                ]
            }
        },

        mounted() {                        
            axios.get('/objectives').then((response) => {
                this.objectives = response.data;          
                
            });                               
        },
        methods:{
            
            newGoal (){
                let params = {                                        
                    description: this.description,
                    objective_id: this.objective.id,
                    approach: this.approachSelected.id

                }
                this.description = '';                         

                axios.post('/goals', params)
                    .then((response) => {
                        const goal = response.data;
                        
                        eventBus.$emit('newGoal', goal);    
                    });
            }
        }
    }
</script>
