<style>
ul {
  list-style-type: none;
}
.direction-block{
 border-bottom: 2px solid #000;
  background-color: #F8F7F7;
  margin-top: 20px;
}
</style>

<template>
    <div>
        <h3 class="text-center">Add Client</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addClient">
                    <div class="form-group">
                        <label>First name</label>
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
                    
        
                    <div class="btn btn-secondary" @click="addRow">Add Direction</div>


                    <ul>
                        <li v-for="(input, index) in inputs">
                            <div class = "direction-block">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" type="text" v-model="input.country">  
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" v-model="input.city"> 
                                </div>
                                <div class="form-group">
                                    <label>Street</label>
                                    <input class="form-control" type="text" v-model="input.street"> 
                                </div>
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control" type="text" v-model="input.postal_code"> 
                                </div>
                                <div class="btn btn-danger" @click="deleteRow(index)">Delete Direction</div>
                            </div>    
                        </li>
                    </ul>


                    <button type="submit" class="btn btn-primary">Add Client</button>
                </form>


                <div id="form">
 
</div>


            </div>
        </div>
    </div>
</template>
 


<script>
    export default {
        data() {
            return {


                client: {},
                    inputs: []




            }
        },
        methods: {



 addRow() {
      this.inputs.push({
        country: '',
        city: '',
        street: '',
        postal_code: ''
      })
    },
    deleteRow(index) {
      this.inputs.splice(index,1)
    
  },

          addClient() {
                this.axios
                    .post('http://localhost:8000/api/client/add', [this.inputs, this.client])
                    .then(response => (
                        this.$router.push({name: 'home'})
                        //console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
