<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul class="list-group">                                               
                <my-goal-component 
                    v-for="goal in goals" 
                        :key="goal.id"
                        :goal="goal"
                        >
                
                </my-goal-component>
            </ul>
        </div>
    </div>
</template>

<script>

export default {  
        props: ['objective'],
        data() {
            return {
                goals: [],
                showFormProgress: null
            }
        },
        mounted() {

            this.myGoals();
        },

        methods:{
            addObjective(objective){
                this.objectives.push(objective);
            },

            async myGoals(){
                await axios.get('/mygoalswithprogress/'+ this.objective.id).then((response) => {
                    this.goals = response.data;                    
                });
                
            }
            
        }
    }
</script>
