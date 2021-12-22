

<template>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">Agregar Accion</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="saveAction()">

                <div class="form-row">
                    <div class="form-group col-md-4" v-if="goal">
                        <label for="exampleInputEmail1">Meta</label>
                        <!--<select name="goal_id" v-model="goal" class="form-select form-control">                            
                            <option v-for="item in goals" :value="item" :key="item.id">{{ item.description }}</option>                        
                        </select>
                        -->
                        <input type="text" v-model="goal.description" class="form-select form-control" disabled="disabled">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Actividad </label>
                        <button type="button" class="btn btn-primary btn-sm float-right" v-on:click="showFormActivity" >
                            <i class="bi-plus-circle-fill"></i> 
                        </button>
                        <select name="activity_id" v-model="activity" class="form-select form-control">                            
                            <option v-for="item in activities" :value="item" :key="item.id">{{ item.description }}</option>                        
                        </select>
                        
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Tiempo</label>
                        <select name="time" v-model="timeSelected" class="form-select form-control">
                            <option>---- Seleccionar tiempo ----</option>
                            <option v-for="item in times" :value="item" :key="item.id">{{ item.description }}</option>                        
                        </select>
                    </div>
               </div>     

                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </form>
        </div>

        <activity-form-component v-show="showActivity" :goal="goal"> </activity-form-component>        
    </div>

</template>

<script>

import { eventBus } from '../../app';
    export default {
        props: ['goal'],
        data(){
            return {                
                description: '',
                goals: [],           
                activities: [],                     
                showActivity: false,                
                times: [ { id: 15, description: "15 Min" }, { id: 30, description: "30 Min" } ]
            }
        },

        computed: {                                                
            timeSelected:
            {
                get: function () {                                        
                    return (this.$store.state.action!= null)?this.times.find(item => item.id == this.$store.state.action.time ) : this.times[0];   
                }, 
                
                set: function (value) {    
                    this.$store.commit('editApproach', value);                                      
                }
            },

            activity:
            {
                get: function () {                                        
                    return (this.$store.state.action!= null)?this.activities.find(item => item.id == this.$store.state.action.activity_id ) : this.activities[0];   
                }, 
                
                set: function (value) {    
                    this.$store.commit('addActivity', value);                                      
                }
            },
            editAction: {
                get: function () {                                        
                    return this.$store.state.editAction;   
                },
            }

            
        },
        created: function () {                                    
            eventBus.$on('newActivity', function (data) {  
                this.activities.push(data);
                this.showActivity = false;
                this.activity = data;
            }.bind(this)); 

            eventBus.$on('showActivity', function (data) {                  
                this.showActivity = true;
            }.bind(this));                                        
            
        },
        mounted() {              

            axios.get('/activitiesbygoal/'+ this.goal.id).then((response) => {
                this.activities = response.data;          
            });
            
        },
        methods:{            
            saveAction (){

                if( this.editAction ){
                    let params = {                                                            
                        action_id: this.$store.state.action.id,
                        activity_id: this.$store.state.activity.id,
                        time: this.$store.state.approach.id
                    }    
            
                    axios.put('/actions', params)
                        .then((response) => {
                            const actions = response.data;

                            actions.description = this.$store.state.activity.description;

                            eventBus.$emit('addedAction', actions);
                        });
                }else{
                    let params = {                                                            
                        goal_id: this.goal.id,
                        activity_id: this.activity.id,
                        time: this.timeSelected.id
                    }    
            
                    axios.post('/actions', params)
                        .then((response) => {
                            const actions = response.data;
                            actions.description = this.activity.description;
                            
                            eventBus.$emit('addedAction', actions);
                        });
                }

                
            }, 
            showFormActivity(){
                eventBus.$emit('showActivity');
            },
            
            async getActionsByGoal(goal){

                await axios.get('/myactionsbygoal/'+goal.id).then((response) => {
                    this.actions = response.data;          
                });
            },            
        }
    }
</script>
