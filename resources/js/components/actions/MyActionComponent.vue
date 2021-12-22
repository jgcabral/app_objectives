<template>    

    <li class="list-group-item">
        {{ action.description }}
        <i class="bi-alarm-fill"></i> {{ action.time }}
        
        <button type="submit" class="btn btn-danger btn-sm float-right" v-on:click="delAction(action)">
            <i class="bi-trash-fill"></i>
        </button> 

        <button type="submit" class="btn btn-secondary btn-sm float-right" v-on:click="editAction(action)">
            <i class="bi-brush-fill"></i>
        </button>      
    </li>

</template>

<script>
import { eventBus } from '../../app';

    export default {

        props: ['action'],
        data (){
            return {                                
            }

        },
        methods: {
            editAction(action){                
                eventBus.$emit('editAction', action);  
            },

            delAction(action){                
                eventBus.$emit('delAction', action);  
            },
        },
        
        

    }
</script>
