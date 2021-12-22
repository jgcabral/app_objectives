<template>

    <div class="card bg-secondary mb-3">
        
        <li class="list-group-item"> 
            {{ goal.description }} 
            <!--<button class="btn btn-primary pull-right" @click="showFormActions">Agregar Plan </button>-->
            <span class="badge badge-pill badge-info" v-if="goal.action">Configurado</span>
            <!--<button type="button" class="btn btn-primary btn-sm float-right" v-on:click="showFormActions" v-show="!action">+ Accion</button>-->
            <button type="button" class="btn btn-secondary btn-sm float-right" v-on:click="showActions()">
                <i class="bi-eye-fill"></i> Acciones
            </button>  
            
            <button type="submit" class="btn btn-danger btn-sm float-right" v-on:click="delGoal(goal)">
                <i class="bi-trash-fill"></i>
            </button> 

            <button type="submit" class="btn btn-secondary btn-sm float-right" v-on:click="editGoal(goal)">
                <i class="bi-brush-fill"></i>
            </button>  
        </li>
        
        <my-actions-component v-if="showAllActions" :goal="goal"> </my-actions-component>
    </div>

</template>

<script>
    
import { eventBus } from '../../app';
        export default {
        props: ['goal'],
        data (){
            return {
                editMode: false,
                showForm: false,
                showAllActions: false,
            }

        },      
        methods: {
            showActions(){
                this.showAllActions = true;
            },
            addGoal(goal){                
                this.goals.push(goal);
            },
            editGoal(goal){                
                eventBus.$emit('editGoal', goal);  
            },
            delGoal(goal){                
                eventBus.$emit('delGoal', goal);  
            }
        }
    }
</script>
