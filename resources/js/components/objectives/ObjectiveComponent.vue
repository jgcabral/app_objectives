<template>
    
    <li class="list-group-item">                                                            
        {{ objective.description }}     
        <button type="button" class="btn btn-primary btn-sm float-right" v-on:click="addGoal(objective)">
            <i class="bi-eye-fill"></i> Meta
        </button>  


        <button type="submit" class="btn btn-danger btn-sm float-right" v-on:click="delObjective(objective)">
            <i class="bi-trash-fill"></i>
        </button> 

        <button type="submit" class="btn btn-secondary btn-sm float-right" v-on:click="editObjective(objective)">
            <i class="bi-brush-fill"></i>
        </button>         
                              
    </li>

</template>

<script>
import { eventBus } from '../../app';
    export default {
        props: ['objective'],
        data (){
            return {
                editMode: false,
                showForm: false                
            }

        },
        
        methods: {
            addGoal(objective){                
                eventBus.$emit('addGoal', objective);                
            },     
            editObjective(objective){
                eventBus.$emit('editObjective', objective);  
                
            },
            delObjective(objective){
                eventBus.$emit('delObjective', objective);  
                
            }      
        }
    }
</script>
