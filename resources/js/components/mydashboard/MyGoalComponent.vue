<template>    

    <li class="list-group-item">
        {{ goal.description }}
        <!--<span v-if="finished" class="justify-content-center">Ya ha alcanzado</span>-->
        <span class="badge badge-pill badge-success float-right" v-show="goal.finished">Finalizada</span>                   
        <button type="submit" class="btn btn-success btn-sm float-right" v-on:click="closeGoal(goal)" v-if="done && goal.finished == 0"> 
            <i class="bi-check-circle-fill"></i>Finalizar
        </button>  
        <button type="submit" class="btn btn-secondary btn-sm float-right" v-on:click="showAction(goal)" v-if="goal.finished == 0">
            <i class="bi-plus-circle-fill"></i>  Progreso
        </button>               
    </li>

</template>

<script>
import { eventBus } from '../../app';

    export default {

        props: ['goal'],
        data (){
            return {                                
            }

        },
        
        computed: {
            done: function()
            {                
                if( this.goal.progress >= 100)
                {                                                
                    return true;
                        
                }
                
            }

        },
        
        created: function () {              
            eventBus.$on('newProgress', function (data) {                               
                this.progress = data;                                                             
            }.bind(this)); 
            
            eventBus.$on('closeGoal', function (data) {                           
                this.finished = true;   
                this.goal = data;                                                 
            }.bind(this));
            
        },
        methods: {
            showAction(goal){                                              
                eventBus.$emit('showAction', goal);
                
            }, 
            closeGoal(){
                    let params = {                                        
                        goal_id: this.goal.id,
                    }                       

                axios.post('/closegoal/'+ this.goal.id, params)
                    .then((response) => {
                        const goal = response.data;
                        
                        eventBus.$emit('closeGoal', goal);    
                    });
            }                                               
        }
    }
</script>
