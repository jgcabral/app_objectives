

<template>
    <div class="card text-white bg-info mb-3">
        <div class="card-header">Agregar Meta</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newGoal()">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Objetivo</label>
                        <select name="objective_id" v-model="objective" class="form-select form-control">                            
                            <option v-for="item in objectives" :value="item" :key="item.id">{{ item.description }}</option>                        
                        </select>
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
                selectedObjective: null,
                approachSelected: null,
                approachs: [ 
                            { id: 60, description: "60 Min" }, 
                            { id: 120, description: "120 Min" }, 
                            { id: 180, description: "180 Min" },
                            { id: 240, description: "240 Min" }  
                ]
            }
        },

        created: function () {            
            eventBus.$on('showGoal', function (data) {                                        
                //this.selectedObjective = data;
            }.bind(this));
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
