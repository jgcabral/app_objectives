<template>

    <div class="card bg-secondary mb-3">
        
        <li class="list-group-item"> 
            {{ goal.description }} 
            <!--<button class="btn btn-primary pull-right" @click="showFormActions">Agregar Plan </button>-->
            <span class="badge badge-pill badge-success" v-if="action">Configurado</span>
            <!--<button type="button" class="btn btn-primary btn-sm float-right" v-on:click="showFormActions" v-show="!action">+ Accion</button>-->
            <button type="button" class="btn btn-secondary btn-sm float-right" v-on:click="showFormActions">
                <i class="bi-plus-circle-fill"></i> Accion
            </button>  
        </li>
    
        <actions-form-component :goal="goal" v-if="showActions"> </actions-form-component>

        
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
                showActions: false,
                action: null
            }

        },
        created: function () {             

            eventBus.$on('addedAction', function (data) {                  
                this.action = data;            
                this.showActions = false;                
            }.bind(this));   
            
        },
        
        methods: {
            showFormActions(){
                this.showActions = true;
            },
            addGoal(goal){                
                this.goals.push(goal);
            }
        }
    }
</script>
