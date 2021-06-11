<template>
   <div>
      <h3 class="text-center">Edit Client</h3>
      <div class="row">
         <div class="col-md-6">
            <form @submit.prevent="updateDirection">
               <div class="form-group">
                  <label>Country</label>
                  <input type="text" class="form-control" v-model="direction.country">
               </div>
               <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" v-model="direction.city">
               </div>
               <div class="form-group">
                  <label>Street</label>
                  <input type="text" class="form-control" v-model="direction.street">
               </div>
               <div class="form-group">
                  <label>Postal Code</label>
                  <input type="text" class="form-control" v-model="direction.postal_code">
               </div>
              
               <button type="submit" class="btn btn-primary">Update Direction</button>
            </form>
         </div>
      </div>
   </div>
</template>
 
<script>
    export default {
        data() {
            return {
                direction: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/client/editdirection/${this.$route.params.id}`)
                .then((response) => {
                    this.direction = response.data;
                    // console.log(response.data);
                });

        },

        methods: {

            updateDirection() {
                this.axios
                    .post(`http://localhost:8000/api/client/updatedirection/${this.$route.params.id}`, this.direction)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>
