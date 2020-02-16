<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Send SMS</h1>

        <form @submit.prevent="smsEmployee">
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select class="form-control" id="employee_id" name="employee_id" required v-model="sms.employee_id" required>
                    <option value="">Select Employee</option>
                    <option v-for="employee in employees" v-bind:value="employee.id">{{ employee.company_name }} - {{ employee.department_name }} - {{ employee.first_name }} {{ employee.last_name }} [{{ employee.mobile }}]</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea maxlength="100" class="form-control" id="message" name="message" required v-model="sms.message" v-on:keyup="countdown"></textarea>
                <p class='text-right text-small' v-bind:class="{'text-danger': hasError }">{{remainingCount}} remaining characters</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <router-link :to="{ name: 'employee-index' }" class="btn btn-secondary">Cancel</router-link>
        </form>

        <br>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                employees:{},
                sms:{},
                maxCount: 100,
                remainingCount: 100,
                hasError: false
            }
        },
        mounted() {
            this.loadEmployees();
        },
        methods: {
            smsEmployee(){
                let uri = 'http://fanhai.gigamike.net/api/sms';
                this.axios.post(uri, this.sms).then((response) => {
                    alert('SMS Sent!');
                    this.$router.push({name: 'phonebook-index'});
                });
            },
            loadEmployees(){
                let uri = `http://fanhai.gigamike.net/api/employees`;
                this.axios.get(uri).then(response => {
                    this.employees = response.data.data;
                });
            },
            countdown: function() {
                this.remainingCount = this.maxCount - this.sms.message.length;
                this.hasError = this.remainingCount < 0;
            }
        }    
    }
</script>
