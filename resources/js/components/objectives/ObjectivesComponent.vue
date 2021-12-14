<template>
    
    <div class="row justify-content-center">
        <div class="col-md-8 col-offset-md-4">
            <div class="card">
                <objective-form-component @new="addObjective"></objective-form-component>

                <ul class="list-group" v-show="showObjectives"> 
                    <li class="list-group-item active">Objetivos</li>                                                                                               
                    <objective-component 
                        v-for="objective in objectives" 
                            :key="objective.id"
                            :objective="objective"
                            >
                    
                    </objective-component>
                </ul>
            </div>
        </div>

        <div class="col-md-8 col-offset-md-4">
            <goals-component  v-if="showFormGoal" :objective="objectiveSelected"> </goals-component>
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
                showObjectives: true
            }
        },
        
        created: function () {            
            eventBus.$on('addGoal', function (data) {  
                
                this.showFormGoal = true;
                this.showObjectives = false;
                this.objectiveSelected = data;
            }.bind(this));         
            
        },
        mounted() {
            this.getObjectives();                        
        },
        methods:{
            addObjective(objective){
                this.objectives.push(objective);
            },

            async getObjectives(){
                await axios.get('/objectives').then((response) => {
                    this.objectives = response.data;
                });

            }
        }
                        
}


</script>
