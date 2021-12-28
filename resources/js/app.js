/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import Vue from 'vue';
 import { store } from './store'

require('./bootstrap');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('my-dashboard-component', require('./components/mydashboard/MyDashboardComponent.vue').default);
Vue.component('my-goals-component', require('./components/mydashboard/MyGoalsComponent.vue').default);
Vue.component('my-goal-component', require('./components/mydashboard/MyGoalComponent.vue').default);
Vue.component('my-progress-component', require('./components/mydashboard/MyProgressComponent.vue').default);
Vue.component('my-objective-component', require('./components/mydashboard/MyObjectiveComponent.vue').default);


// Objesctives //
Vue.component('objectives-component', require('./components/objectives/ObjectivesComponent.vue').default);
Vue.component('objective-component', require('./components/objectives/ObjectiveComponent.vue').default);
Vue.component('objective-form-component', require('./components/objectives/FormComponent.vue').default);

//Goals
Vue.component('goals-component', require('./components/goals/GoalsComponent.vue').default);
Vue.component('goal-form-component', require('./components/goals/FormComponent.vue').default);
Vue.component('goal-component', require('./components/goals/GoalComponent.vue').default);


//Actions
Vue.component('my-actions-component', require('./components/actions/MyActionsComponent.vue').default);
Vue.component('my-action-form-component', require('./components/actions/FormComponent.vue').default);
Vue.component('my-action-component', require('./components/actions/MyActionComponent.vue').default);
Vue.component('activity-form-component', require('./components/actions/ActivityComponent.vue').default);

export const eventBus = new Vue();


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



 //require('./store');

const app = new Vue({
    el: '#app',
    store
});




