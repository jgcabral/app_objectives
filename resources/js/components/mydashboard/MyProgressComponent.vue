<template>
    <form action="" v-on:submit.prevent="newProgress()">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Progreso</label>
                <select name="goal_id" v-model="goal" class="form-select form-control" disabled="disabled">                            
                    <option v-for="item in goals" :value="item" :key="item.id">{{ item.description }}</option>                        
                </select>
            </div>                            

            <div class="form-group">
                <label for="exampleInputEmail1">Tiempo</label>
                <select name="time" v-model="timeSelected" class="form-select form-control" disabled="disabled">                    
                    <option v-for="item in times" :value="item" :key="item.id">{{ item.description }}</option>                     
                </select>
            </div>
        </div>     

        <button type="submit" class="btn btn-primary">
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
                times: [ { id: 15, description: "15 Min" }, { id: 30, description: "30 Min" } ]
            }
        },
        mounted() {            
            this.getGoals();

            this.getActionsByGoal();
            
        },

        methods:{
            newProgress(){
                let params = {                                                            
                    action_id: this.actionsByGoal.id,
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
            async getGoals(){
                await axios.get('/goals').then((response) => {
                    this.goals = response.data;          
                });
            }
        }
    }
</script>
