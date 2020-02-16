<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Department Add</h1>

        <form @submit.prevent="addDepartment">
            <div class="form-group">
                <label for="company_id">Company</label>
                <select class="form-control" id="company_id" name="company_id" required v-model="department.company_id">
                    <option value="">Select Company</option>
                    <option v-for="company in companies" v-bind:value="company.id">{{ company.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="company_name">Department Name</label>
                <input type="text" class="form-control" id="name" name="name" required v-model="department.name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <router-link :to="{ name: 'department-index' }" class="btn btn-secondary">Cancel</router-link>
        </form>

        <br>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                companies:{},
                department:{}
            }
        },
        mounted() {
            this.loadCompanies()
         },
        methods: {
            addDepartment(){
                let uri = 'http://fanhai.gigamike.net/api/departments';
                this.axios.post(uri, this.department).then((response) => {
                    alert('Department created!');
                    this.$router.push({name: 'department-index'});
                });
            },
            loadCompanies(){
                let uri = `http://fanhai.gigamike.net/api/companies`;
                this.axios.get(uri).then(response => {
                    this.companies = response.data.data;
                });
            }
        }    
    }
</script>
