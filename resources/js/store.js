import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        goal: null,
        mode: false,
        description: '',
        approach: null,
        action: null,
        activity: null,
        editGoal: false,
        editAction: false
    }, 

    mutations:{
        getGoal(state, data){            
            state.goal = data;
            state.mode = true;
        },
        addDescription(state, data){
            state.description = data;
        },
        editApproach(state, approach){
            state.approach = approach;
        },

        getAction(state, action){
            state.action = action;
            state.mode = true;
        },
        addActivity(state, activity){
            state.activity = activity;            
        },
        editGoal(state, mode){
            state.editGoal = mode;
        },
        editAction(state, mode){
            state.editAction = mode;
        }
    }
})