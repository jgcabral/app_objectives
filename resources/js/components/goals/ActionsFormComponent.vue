

<template>
    <div class="card text-white bg-dark mb-3">
        <div class="card-header">Agregar Accion</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newAction()">

                <div class="form-row">
                    <div class="form-group col-md-4" v-if="goal">
                        <label for="exampleInputEmail1">Meta</label>
                        <select name="goal_id" v-model="goal" class="form-select form-control">                            
                            <option v-for="item in goals" :value="item" :key="item.id">{{ item.description }}</option>                        
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Actividad</label>
                        <select name="activity_id" v-model="activity" class="form-select form-control">                            
                            <option v-for="item in activities" :value="item" :key="item.id">{{ item.description }}</option>                        
                        </select>
                        <button type="button" class="btn btn-primary btn-sm float-right" v-on:click="showFormActivity">+</button> 
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
                timeSelected: null,
                activitySelected: null,
                activity: null,
                fieldAditional: null,
                showActivity: false,
                //showFormActivity: false,
                times: [ { id: 15, description: "15 Min" }, { id: 30, description: "30 Min" } ]
            }
        },

        created: function () {                        
            
            eventBus.$on('newActivity', function (data) {  
                this.activities.push(data);
                this.showActivity = false;
            }.bind(this)); 

            eventBus.$on('showActivity', function (data) {                  
                this.showActivity = true;
            }.bind(this));                                        
            
        },
        mounted() {
            axios.get('/goals').then((response) => {
                this.goals = response.data;          
            });

            axios.get('/activitiesbygoal/'+ this.goal.id).then((response) => {
                this.activities = response.data;          
            });
            
        },
        methods:{            
            newAction (){
                let params = {                                        
                    options: this.fieldAditional,
                    goal_id: this.goal.id,
                    time: this.timeSelected.id

                }                

                axios.post('/actions', params)
                    .then((response) => {
                        const actions = response.data;
                        eventBus.$emit('addedAction', actions);
                    });
            }, 
            showFormActivity(){
                eventBus.$emit('showActivity');
            }
        }
    }
</script>
