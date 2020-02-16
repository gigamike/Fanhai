<template>
    <div>
        <navbar-component></navbar-component>
            <transition name="fade">
                <router-view></router-view>
            </transition>
   </div> 
</template>

<script>
    import Navbar from './components/Navbar'
    export default {
        components: {
            'navbar-component' : Navbar
        }
    }
</script>