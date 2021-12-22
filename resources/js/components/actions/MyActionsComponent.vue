<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <ul class="list-group">     
                    <li class="list-group-item active">
                        Acciones para  {{ goal.description }}

                        <button  type="button" class="btn btn-primary btn-sm float-right" v-on:click="showForm()">
                            <i class="bi-plus-circle-fill"></i> Accion
                        </button> 
                        
                    </li>                                            
                    <my-action-component 
                        v-for="action in actions" 
                            :key="action.id"
                            :action="action"
                            >
                    
                    </my-action-component>
                </ul>

                 <my-action-form-component :goal="goal" v-if="showFormAction"></my-action-form-component>
            </div>
        </div>


    </div>
</template>

<script>
import { eventBus } from '../../app';
export default {  
        props: ['goal'],
        data() {
            return {
                actions: [],
                showFormAction: false,
                actionSelected: null,
                mode: false
            }
        },
        created: function () {

            eventBus.$on('newGoal', function (data) {                   
                this.showGoals = true;
                this.showGoalForm = false;
                this.getGoals();
            }.bind(this));

            eventBus.$on('addedAction', function (data) {                   
                this.myActionsByGoal();
                //this.actions.push(data);
                this.showFormAction = false;
            }.bind(this));

            eventBus.$on('editAction', function (data) {   
                this.showFormAction = true;
                this.actionSelected = data;                               
                                
                this.$store.commit('getAction', this.actionSelected);   
                this.$store.commit('editAction', true);             
                
            }.bind(this)); 

            eventBus.$on('delAction', function (action) {   
                axios.delete('actions/' + action.id)
                    .then((response) => {
                        this.myActionsByGoal();                        
                    });  
                
            }.bind(this)); 

        },

        mounted() {

            this.myActionsByGoal();
        },

        methods:{

            async myActionsByGoal(){
                await axios.get('/myactionsbygoal/'+ this.goal.id).then((response) => {
                    this.actions = response.data;                    
                });
                
            },

            showForm(){
                this.showFormAction = true;
            }
            
        }
    }
</script>
