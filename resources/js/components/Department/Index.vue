<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Departments</h1>
        <div>

            <div class="text-right">
                <router-link :to="{ name: 'department-create' }" class="btn btn-primary">Create</router-link>
            </div>

            <br>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company</th>
                        <th scope="col">Department</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="department in departments" :key="department.id">
                        <td>{{ department.id }}</td>
                        <td>{{ department.company.name }}</td>
                        <td>{{ department.name }}</td>
                        <td><router-link :to="{name: 'department-edit', params: { id: department.id }}" class="btn btn-primary">Edit</router-link></td>
                        <td><button class="btn btn-danger" @click.prevent="deletePost(department.id)">Delete</button></td>
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
            departments: []
        }
    },
    created() {
        let uri = `http://fanhai.gigamike.net/api/departments`;
        this.axios.get(uri).then(response => {
            this.departments = response.data.data;
        });
    },
    methods: {
        deletePost(id) {
            let uri = `http://fanhai.gigamike.net/api/departments/${id}`;
            this.axios.delete(uri).then(response => {
                this.departments.splice(this.departments.indexOf(id), 1);
            });
        }
    }
}
</script>
