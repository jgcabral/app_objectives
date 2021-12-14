<template>
    
    <li class="list-group-item">                                                            
        {{ objective.description }}             
        <button type="button" class="btn btn-secondary btn-sm float-right" v-on:click="addGoal(objective)"><i class="bi-plus-circle-fill"></i> Meta
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
        }
    }
</script>
