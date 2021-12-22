<template>
    
        <div class="row justify-content-center">
            <div class="col-md-8 col-offset-md-4">
                <div class="card bg-secondary">
                    <div class="card-header text-white">
                        Objetivos
                    </div>
                    <div class="card-body">    
                        <ul class="list-group">                        
                            <my-objective-component 
                                v-for="objective in objectives" 
                                    :key="objective.id"
                                    :objective="objective"
                                    @show="showMyGoals">                            
                            </my-objective-component>                            
                                                        
                        </ul>
                        
                    </div>    
                </div>        
            </div>
            
            <div class="col-md-8 col-offset-md-4" v-if="objectiveHasGoals">
                <div class="card bg-secondary">
                    <div class="card-header text-white">
                    Metas para {{ objectiveSelected.description }}   
                    </div>
                    <div class="card-body">    
                        <ul class="list-group">                                                
                            <my-goals-component 
                                    :objective="objectiveSelected" 
                                    >
                            </my-goals-component>
                        </ul>
                    </div>    
                </div>        
            </div>

            <div class="col-md-8 col-offset-md-4" v-if="goalHasActions">
                <div class="card bg-secondary">
                    <div class="card-header text-white">
                    Agregar Progreso

                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>  
                    </div>
                    <div class="card-body">    
                        <my-progress-component :goal="goalSelected"></my-progress-component>
                    </div>    
                </div>        
            </div>
        </div>          
</template>

<script>
import { eventBus } from '../../app'

export default {  
        data() {
            return {
                objectives: [],
                objectiveHasGoals: false,
                goalHasActions:false,
                showAct: false,
                objectiveSelected: null,
                goalSelected: null,
                show: true,
                showObjectives: true
            }
        },
        created: function () {
            eventBus.$on('showAction', function (data) {                            
                this.goalHasActions = true;
                this.goalSelected = data;
                this.objectiveHasGoals = false;
                
            }.bind(this));

            eventBus.$on('newProgress', function (data) {                           
                axios.get('/myobjectiveswithprogress').then((response) => {
                    this.objectives = response.data;
                    this.goalHasActions = false;
                    this.objectiveHasGoals = true;
                });
                
                this.checkStatusGoal(data);                                                         
            }.bind(this));

            
        },
        mounted() {            

            this.myObjectives();
        },

        methods:{
            addObjective(objective){
                this.objectives.push(objective);
            },
            showMyGoals(objective){
                
                this.objectiveHasGoals = true;
                this.objectiveSelected = objective;
            },
        
            
            async checkStatusGoal(progress){
                await axios.get('/progressbyaction/'+progress.action_id).then((response) => {
                    let progress = parseInt(response.data.progress);                    

                    if( progress >= 100){
                        alert("Desea cerrar la meta "+ this.goalSelected.description);
                    }

                    
                });
            
            },

            async myObjectives(){
                await axios.get('/myobjectiveswithprogress').then((response) => {
                    this.objectives = response.data;
                });
            }

        }
    }
</script>
