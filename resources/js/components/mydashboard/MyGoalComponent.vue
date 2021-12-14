<template>    

    <li class="list-group-item">
        {{ goal.description }}      
        <span class="badge badge-pill badge-success" v-show="goal.finished">Finalizada</span>           
        <button type="submit" class="btn btn-primary btn-sm float-right" v-on:click="showAction(goal)" v-if="progress >= 100 && goal.finished == 0">Finalizar</button>  
        <button type="submit" class="btn btn-primary btn-sm float-right" v-on:click="showAction(goal)" v-if="goal.finished == 0">+ Progreso</button>               
    </li>

</template>

<script>
import { eventBus } from '../../app';

    export default {

        props: ['goal'],
        data (){
            return {
                editMode: false,
                showGoals: false,
                progress: null            
            }

        },

        mounted(){
            
            this.checkStatusGoal(this.goal);
        },

        methods: {
            showAction(goal){                                              
                eventBus.$emit('showAction', goal);
                
            },
                        
            async checkStatusGoal(goal){
                await axios.get('/progressbygoal/'+goal.id).then((response) => {
                    this.progress = parseInt(response.data.progress);                                                                   
                });
            
            }
        }
    }
</script>
