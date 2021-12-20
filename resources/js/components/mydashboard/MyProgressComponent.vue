<template>
    <form action="" v-on:submit.prevent="newProgress()">
        <div class="form-row text-white">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Meta</label>
                <select name="goal_id" v-model="goal" class="form-select form-control" disabled="disabled">                            
                    <option v-for="item in goals" :value="item" :key="item.id">{{ item.description }}</option>                        
                </select>
            </div>  

            <div class="form-group col-md-4">
                <label for="">Actividad</label>
                <select name="activity_id" v-model="activity" class="form-select form-control" @change="onChange($event)">                            
                    <option v-for="item in activities" :value="item" :key="item.id">{{ item.description }}</option>                        
                </select>
                
            </div>                          

            <div class="form-group">
                <label for="exampleInputEmail1">Tiempo</label>
                <select name="time" v-model="timeSelected" class="form-select form-control" disabled="disabled">                    
                    <option v-for="item in times" :value="item" :key="item.id">{{ item.description }}</option>                     
                </select>
            </div>
        </div>     

        <button type="submit" class="btn btn-dark btn-sm">
            Guardar
        </button>
    </form>
</template>

<script>

import { eventBus } from '../../app';

export default {  
        props: ['goal'],
        data() {
            return {        
                goals: [],  
                timeSelected: null,      
                showFormProgress: null,
                actionsByGoal: null,                
                times: [ { id: 15, description: "15 Min" }, { id: 30, description: "30 Min" } ],
                activities:[],
                activity: null
            }
        },
        mounted() {   
            
            this.getGoals();

            this.getActionsByGoal();

            this.getActivitiesByGoal();
            
        },

        methods:{
            newProgress(){

                let params = {                                                            
                    action_id: this.actionsByGoal[0].id,
                    time: this.timeSelected.id
                }                

                axios.post('/progress', params)
                    .then((response) => {
                        const progress = response.data;                        
                        eventBus.$emit('newProgress', progress);
                        
                    });
            },
            async getActionsByGoal(){
                await axios.get('/actionsbygoal/' + this.goal.id).then((response) => {       
                    this.actionsByGoal = response.data;                                        
                    this.timeSelected = this.times.find(item => item.id == response.data.time );                       
                });
            },

            async getActivitiesByGoal(){
                await axios.get('/activitiesbygoal/' + this.goal.id).then((response) => {       
                    this.activities = response.data;                                                             
                });
            },

            async getGoals(){
                await axios.get('/mygoalswithprogress/'+this.goal.objective_id).then((response) => {
                    this.goals = response.data;          
                });
            },
            onChange(event){
              
                axios.get('/actionsbyactivity/' + this.activity.id).then((response) => { 

                    this.timeSelected = this.times.find(item => item.id == response.data[0].time );            
                });
            
            }
        }
    }
</script>
