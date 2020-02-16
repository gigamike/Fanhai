<template>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="/">Fanhai Exam</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'company-index'}" class="nav-link">Companies</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'department-index'}" class="nav-link">Departments</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'employee-index'}" class="nav-link">Employees</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'phonebook-index'}" class="nav-link">Phonebook</router-link>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
