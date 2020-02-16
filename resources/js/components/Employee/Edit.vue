<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Department Edit</h1>

        <form @submit.prevent="updateEmployee">
            <div class="form-group">
                <label for="department_id">Department</label>
                <select class="form-control" id="department_id" name="department_id" required v-model="employee.department_id">
                    <option value="">Select Department</option>
                    <option v-for="department in departments" v-bind:value="department.id">{{ department.company.name }} - {{ department.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="firstname" required v-model="employee.first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required v-model="employee.last_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" required v-model="employee.email">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required v-model="employee.mobile">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <router-link :to="{ name: 'department-index' }" class="btn btn-secondary">Cancel</router-link>
        </form>

        <br>
    </div>
</template>

<script>
    export default {
      data() {
        return {
          employee:{},
          departments:{}
        }
      },
      mounted() {
        this.loadDepartments()
      },
      created() {
        let uri = `http://fanhai.gigamike.net/api/employees/${this.$route.params.id}/edit`;
        this.axios.get(uri).then((response) => {
            this.employee = response.data;
        });
      },
      methods: {
        updateEmployee() {
          let uri = `http://fanhai.gigamike.net/api/employees/${this.$route.params.id}`;
          this.axios.put(uri, this.employee).then((response) => {
             alert('Employee updated!'); 
             this.$router.push({name: 'employee-index'});
          });
        },
        loadDepartments(){
            let uri = `http://fanhai.gigamike.net/api/departments`;
            this.axios.get(uri).then(response => {
                this.departments = response.data.data;
            });
        }
      }
    }
</script>
