<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Companies</h1>
        <div>

            <div class="text-right">
                <router-link :to="{ name: 'company-create' }" class="btn btn-primary">Create</router-link>
            </div>

            <br>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="company in companies" :key="company.id">
                        <td>{{ company.id }}</td>
                        <td>{{ company.name }}</td>
                        <td><router-link :to="{name: 'company-edit', params: { id: company.id }}" class="btn btn-primary">Edit</router-link></td>
                        <td><button class="btn btn-danger" @click.prevent="deletePost(company.id)">Delete</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            companies: []
        }
    },
    created() {
        let uri = `http://fanhai.gigamike.net/api/companies`;
        this.axios.get(uri).then(response => {
            this.companies = response.data.data;
        });
    },
    methods: {
        deletePost(id) {
            let uri = `http://fanhai.gigamike.net/api/companies/${id}`;
            this.axios.delete(uri).then(response => {
                this.companies.splice(this.companies.indexOf(id), 1);
            });
        }
    }
}
</script>
