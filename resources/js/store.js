import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
        goal: null,
        mode: false,
        description: '',
        approach: null,
        action: null,
        activity: null,
        editGoal: false,
        editAction: false, 
        time: null
    }, 

    mutations:{
        getGoal(state, data){            
            state.goal = data;
            state.mode = true;
        },
        addDescription(state, data){
            state.goal = {};
            state.goal.description = data;
        },
        editApproach(state, approach){            
            
            state.goal.approach = approach.id;
            
        },
        editTime(state, time){                     
            state.time = time.id;
        },

        getAction(state, action){
            state.action = action;
            state.mode = true;
        },
        addActivity(state, activity){
            state.action = {};
            state.activity = activity;
            state.action.activity_id = activity.id;            
        },
        editGoal(state, mode){
            state.editGoal = mode;
        },
        editAction(state, mode){
            state.editAction = mode;
        }
    }
})