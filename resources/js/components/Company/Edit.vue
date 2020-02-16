<template>
    <div class="container">
        <h1 class="mt-4 mb-3">Company Edit</h1>

        <form @submit.prevent="updateCompany">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" required v-model="company.name">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <router-link :to="{ name: 'company-index' }" class="btn btn-secondary">Cancel</router-link>
        </form>

        <br>
    </div>
</template>

<script>
    export default {
      data() {
        return {
          company: {}
        }
      },
      created() {
        let uri = `http://fanhai.gigamike.net/api/companies/${this.$route.params.id}/edit`;
        this.axios.get(uri).then((response) => {
            this.company = response.data;
        });
      },
      methods: {
        updateCompany() {
          let uri = `http://fanhai.gigamike.net/api/companies/${this.$route.params.id}`;
          this.axios.put(uri, this.company).then((response) => {
             alert('Company updated!');
             this.$router.push({name: 'company-index'});
          });
        }
      }
    }
</script>
