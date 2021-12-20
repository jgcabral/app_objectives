<template>
    
    <div class="row justify-content-center">
        <div class="col-md-8 col-offset-md-4">
            <div class="card">
                <ul class="list-group"> 
                    <li class="list-group-item active">
                    Objetivos
                        <button type="button" class="btn btn-primary btn-sm float-right" v-if="showObjectives" v-on:click="showFormAddObjective()">
                            <i class="bi-plus-circle-fill"></i>
                        </button> 

                        <button type="button" class="btn btn-primary btn-sm float-right" v-if="!showObjectives" v-on:click="showObjectives()">
                            <i class="bi-eye"></i>
                        </button>   
                    </li>   

                    <objective-component v-show="showObjectives"
                        v-for="objective in objectives" 
                            :key="objective.id"
                            :objective="objective"
                            >
                    
                    </objective-component>
                </ul>

                <objective-form-component v-if="addFormObjective" @newObjective="addObjective" :objective="objectiveSelected"></objective-form-component>
            </div>
        </div>

        <div class="col-md-8 col-offset-md-4">
            <goals-component  v-if="showFormGoal" :objective="objectiveSelected"> </goals-component>
        </div>

        <div class="col-md-8 col-offset-md-4">
            
        </div>

    
    </div>
</template>


<script>
import { eventBus } from '../../app';
export default {  
        data() {
            return {
                objectives: [],
                showFormGoal: null,
                showObjectives: true,
                addFormObjective: false,
                viewObjectives: false
            }
        },
        
        created: function () {            
            eventBus.$on('addGoal', function (data) {                  
                this.showFormGoal = true;
                this.showObjectives = false;
                this.objectiveSelected = data; 
                               
            }.bind(this)); 
            
            eventBus.$on('newObjective', function (data) {                  
                this.addFormObjective = false;
                this.objectives.push(data);
                               
            }.bind(this)); 

            eventBus.$on('showObjectives', function (data) {                  
                this.showObjectives = true;
                               
            }.bind(this)); 

            eventBus.$on('editObjective', function (data) {                  
                this.addFormObjective = true;
                this.objectiveSelected = data;              
            }.bind(this)); 
            
        },
        mounted() {
            this.getObjectives();                        
        },
        methods:{
            addObjective(objective){
                this.objectives.push(objective);
                this.objectiveSelected = objective;
            },

            async getObjectives(){
                await axios.get('/objectives').then((response) => {
                    this.objectives = response.data;
                });

            },
            showFormAddObjective(){
                this.addFormObjective = true;
            }
        }
                        
}


</script>
