<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Employees</h1>
        <div>

            <div class="text-right">
                <router-link :to="{ name: 'employee-create' }" class="btn btn-primary">Create</router-link>
            </div>

            <br>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company</th>
                        <th scope="col">Department</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="employee in employees" :key="employee.id">
                        <td>{{ employee.id }}</td>
                        <td>{{ employee.company_name }}</td>
                        <td>{{ employee.department_name }}</td>
                        <td>{{ employee.first_name }}</td>
                        <td>{{ employee.last_name }}</td>
                        <td><a :href="`mailto:${employee.email}`">{{ employee.email }}</a></td>
                        <td>{{ employee.mobile }}</td>
                        <td><router-link :to="{name: 'employee-edit', params: { id: employee.id }}" class="btn btn-primary">Edit</router-link></td>
                        <td><button class="btn btn-danger" @click.prevent="deletePost(employee.id)">Delete</button></td>
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
            employees: []
        }
    },
    created() {
        let uri = `http://fanhai.gigamike.net/api/employees`;
        this.axios.get(uri).then(response => {
            this.employees = response.data.data;
        });
    },
    methods: {
        deletePost(id) {
            let uri = `http://fanhai.gigamike.net/api/employees/${id}`;
            this.axios.delete(uri).then(response => {
                this.employees.splice(this.employees.indexOf(id), 1);
            });
        }
    }
}
</script>
