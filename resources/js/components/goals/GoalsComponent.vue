<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-info">                                
                <ul class="list-group">    
                    <li class="list-group-item active">Metas para {{ objective.description }}</li>        
                    <goal-component 
                        v-for="goal in goals" 
                            :key="goal.id"
                            :goal="goal"
                            >
                    
                    </goal-component>
                </ul>    
            </div>
        </div>        
        
        <div class="col-md-12">
            <goal-form-component :objective="objective"></goal-form-component>
        </div>    
    </div>
</template>

<script>
import { eventBus } from '../../app';

export default {  
        props: ['objective'],
        data() {
            return {
                goals: [],
                showGoals: false
            }
        },
        created: function () {
            this.getGoals();
            eventBus.$on('addGoal', function (data) {                  
                this.showGoals = true;
                this.objectiveSelected = data;
            }.bind(this));

            eventBus.$on('newGoal', function (data) {                   
                this.showGoals = true;
                this.getGoals();
            }.bind(this));

        },
        //
        methods:{
            async getGoals(){
                await axios.get('/goalsbyobjective/'+ this.objective.id).then((response) => {
                    this.goals = response.data;
                });
            }
        }
    }
</script>
