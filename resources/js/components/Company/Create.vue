<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Company Add</h1>

        <form @submit.prevent="addCompany">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" required v-model="company.name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <router-link :to="{ name: 'company-index' }" class="btn btn-secondary">Cancel</router-link>
        </form>

        <br>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                company:{}
            }
        },
        methods: {
            addCompany(){
                let uri = 'http://fanhai.gigamike.net/api/companies';
                this.axios.post(uri, this.company).then((response) => {
                    alert('Company created!');
                    this.$router.push({name: 'company-index'});
                });
            }
        }    
    }
</script>
