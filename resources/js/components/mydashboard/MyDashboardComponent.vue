<template>
    
        <div class="row justify-content-center">
            <div class="col-md-8 col-offset-md-4">
                <div class="card bg-info">
                    <div class="card-header">
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
                    <div class="card-header">
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
                <div class="card bg-light">
                    <div class="card-header">
                    {{ goalSelected.description }}  
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
            /*onShowMy(goal){                                
                this.goalHasActions = true;
                this.goalSelected = goal;
            },*/
            
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
