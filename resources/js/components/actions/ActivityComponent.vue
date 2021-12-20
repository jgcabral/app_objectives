

<template>
    <div class="card mb-3">
        <div class="card-header text-white bg-primary">Agregar Actividad</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newActivity()">
               <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Descripción</label>
                        <input type="text" class="form-control form-control-sm" name="activity" v-model="description">
                    </div>
                    
               </div>     

                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </form>
        </div>
    </div>

</template>

<script>

import { eventBus } from '../../app';
    export default {
        props: ['goal'],
        data(){
            return {        
                description: '',
                activity: null
            }
        },

        methods:{            
            newActivity (){
                let params = {                                        
                    description: this.description,
                    goal_id: this.goal.id,                    
                }                

                axios.post('/activities', params)
                    .then((response) => {
                        const activity = response.data;
                        this.description = '';
                        eventBus.$emit('newActivity', activity);
                    });
            }
        }
    }
</script>
