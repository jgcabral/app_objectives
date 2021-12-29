<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-info">                                
                <ul class="list-group">    
                    <li class="list-group-item active">
                        <i class="bi-ui-checks"></i> 

                        Metas para  {{ objective.description }}

                        <button type="button" class="btn btn-primary btn-sm float-right" v-on:click="showFormGoal()">
                            <i class="bi-plus-circle-fill"></i> Meta
                        </button> 
                        
                    </li>     

                    <li class="list-group-item list-group-item-warning" v-if="goals.length == 0">
                        No hay metas cargadas
                    </li>

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
            <goal-form-component :objective="objective" :goal="goalSelected" :mode="mode" v-show="showGoalForm"></goal-form-component>
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
                goal: null,
                goalSelected: null,
                showGoals: false,
                showGoalForm: false ,
                mode: false                               
            }
        },
        created: function () {
            this.getGoals();
            eventBus.$on('addGoal', function (data) {                  
                this.showGoals = true;
                this.showGoalForm = true;
                this.objectiveSelected = data;
            }.bind(this));

            eventBus.$on('newGoal', function (data) {                   
                this.showGoals = true;
                this.showGoalForm = false;
                this.getGoals();
            }.bind(this));


            eventBus.$on('editGoal', function (data) {   
                this.showGoalForm = true;
                this.goalSelected = data;                               
                this.mode = true;
                
                this.$store.commit('getGoal', this.goalSelected);  
                this.$store.commit('editGoal', true);                
                
            }.bind(this)); 

            eventBus.$on('delGoal', function (goal) {   
                    axios.delete('goals/' + goal.id)
                    .then((response) => {
                        this.getGoals();
                        
                    });  
                
            }.bind(this)); 

            eventBus.$on('cancelGoal', function () {   
                this.showGoalForm = false;
            }.bind(this)); 

        },
        //
        methods:{
            async getGoals(){
                await axios.get('/goalsbyobjective/'+ this.objective.id).then((response) => {
                    this.goals = response.data;
                });
            },
            showFormGoal(){
                this.showGoalForm = true;
            }, 
            showAllObjetivos(){
                this.showGoals = false;
                this.showGoalForm = false;
                eventBus.$emit('showAllObjectives');
            }
        }
    }
</script>
