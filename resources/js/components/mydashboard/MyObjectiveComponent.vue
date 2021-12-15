<template>    

    <li class="list-group-item">
        {{ objective.description }}         
        <div class="progress">            
            <div v-bind:class="classProgress" role="progressbar" v-bind:style="styleObject" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">{{ objective.progress }}%</div>
        </div>
        <button type="submit" class="btn btn-secondary btn-sm float-right" v-on:click="show(objective)">
            <i class="bi-eye"></i> 
            Metas
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
                showGoals: false,
                styleObject: {
                    width: this.objective.progress + "%"
                }              
            }

        },
        computed: {
            classProgress: function(){
                if( this.objective.progress <= 25)
                {
                    return 'progress-bar bg-danger';                    
                }

                if( this.objective.progress >= 25 &&this.objective.progress <= 50)
                {
                    return 'progress-bar bg-warning';
                      
                }

                if( this.objective.progress >= 50 &&this.objective.progress <= 75)
                {
                    return 'progress-bar bg-info';
                      
                }

                if( this.objective.progress >= 75 && this.objective.progress <= 100 || this.objective.progress >= 100)
                {
                    return 'progress-bar bg-success';
                    
                }

            }
        },
        
        methods: {
            show(objective){                
                this.$emit('show', objective);
            }
        }
    }
</script>
