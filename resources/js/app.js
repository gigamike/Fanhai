/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/Home.vue';

import CompanyIndexComponent from './components/Company/Index.vue';
import CompanyCreateComponent from './components/Company/Create.vue';
import CompanyEditComponent from './components/Company/Edit.vue';

import DepartmentIndexComponent from './components/Department/Index.vue';
import DepartmentCreateComponent from './components/Department/Create.vue';
import DepartmentEditComponent from './components/Department/Edit.vue';

import EmployeeIndexComponent from './components/Employee/Index.vue';
import EmployeeCreateComponent from './components/Employee/Create.vue';
import EmployeeEditComponent from './components/Employee/Edit.vue';

import PhonebookComponent from './components/Phonebook/Index.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'company-index',
        path: '/companies',
        component: CompanyIndexComponent
    },
    {
        name: 'company-create',
        path: '/company/create',
        component: CompanyCreateComponent
    },
    {
        name: 'company-edit',
        path: '/company/edit/:id',
        component: CompanyEditComponent 
    },{
        name: 'department-index',
        path: '/departments',
        component: DepartmentIndexComponent
    },
    {
        name: 'department-create',
        path: '/department/create',
        component: DepartmentCreateComponent
    },
    {
        name: 'department-edit',
        path: '/department/edit/:id',
        component: DepartmentEditComponent 
    },{
        name: 'employee-index',
        path: '/employees',
        component: EmployeeIndexComponent
    },
    {
        name: 'employee-create',
        path: '/employee/create',
        component: EmployeeCreateComponent
    },
    {
        name: 'employee-edit',
        path: '/employee/edit/:id',
        component: EmployeeEditComponent 
    },
    {
        name: 'phonebook-index',
        path: '/phonebook',
        component: PhonebookComponent 
    }
];

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
