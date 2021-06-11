<template>
   <div>
      <h3 class="text-center">Edit Client</h3>
      <div class="row">
         <div class="col-md-6">
            <form @submit.prevent="updateClient">
               <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" v-model="client.first_name">
               </div>
               <div class="form-group">
                  <label>Second Name</label>
                  <input type="text" class="form-control" v-model="client.second_name">
               </div>
               <div class="form-group">
                  <label>Telephone Number</label>
                  <input type="text" class="form-control" v-model="client.telephone_number">
               </div>
               <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" v-model="client.email">
               </div>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Postal Code</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="direction in directions" :key="direction.id">
                        <td>{{ direction.id }}</td>
                        <td>{{ direction.country }}</td>
                        <td>{{ direction.street }}</td>
                        <td>{{ direction.city }}</td>
                        <td>{{ direction.postal_code }}</td>
                        <td>
                           <div class="btn-group" role="group">
                              <router-link :to="{name: 'editdirection', params: { id: direction.id }}" class="btn btn-primary">Edit
                              </router-link>
                              <div class="btn btn-danger" @click="deleteDirection(direction.id)">Delete</div>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <button type="submit" class="btn btn-primary">Update Client</button>
            </form>
         </div>
      </div>
   </div>
</template>
 
<script>
    export default {
        data() {
            return {
                client: {},
                directions: []
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/client/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.client = response.data;
                    // console.log(response.data);
                });


            this.axios
                .get(`http://localhost:8000/api/directions/${this.$route.params.id}`)
                .then((response) => {
                    this.directions = response.data;
                    console.log(response.data);
                });

        },
        methods: {
            deleteDirection(id) {
                this.axios
                    .delete(`http://localhost:8000/api/client/deletedirection/${id}`)
                    .then(response => {
                        let i = this.directions.map(item => item.id).indexOf(id); // find index of your object
                        this.directions.splice(i, 1)
                    });
            },

            updateClient() {
                this.axios
                    .post(`http://localhost:8000/api/client/update/${this.$route.params.id}`, this.client)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>
