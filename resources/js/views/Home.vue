<template>
  <h1>Halaman Users</h1>
  <br>
    <router-link to="/user-create" class="btn btn-success">Bikin User</router-link> <span></span>
     <a :href="url"   class="btn btn-danger">Download</a>
  <br><br>
    <table class="table">
      <tr>
        <td>
          Name
        </td>
        <td>
          Email
        </td>
      </tr>
      <tr v-for="user in users.data" :key="user">
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
      </tr>
    </table>
    <!-- <pagination v-model="page" :records="lastPage" :per-page="perPage" @paginate="getUsers($event)"/> -->
     <v-pagination
      v-model="page"
      :pages="lastPage"
      :range-size="perPage"
      active-color="#DCEDFF"
      @update:modelValue="getUsers($event)"
    />
</template>

<script>
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";

export default {
  components: {
    VPagination
  },
  data() {
    return {
      users: {},
      page: 1,
      lastPage: 0,
      perPage: 0,
      url: null
      
    }
  },
  created() {
    this.getUsers()
      this.url = "api/users/export-excel"
  },
  methods: {
    getUsers(page = 1){
 
            let uri = 'api/users?page=' + page;

            axios.get(uri).then((response) => {
                console.log(response)
                this.users = response.data.data
                console.log(this.users)
                this.lastPage = response.data.data.last_page
                this.perPage = response.data.data.per_page
            }).catch(errors => {
                console.log(errors)
            })

        },
    downloadUser(){
      

        // axios.get('api/users/export-excel').then((response) => {

        //         console.log(response)
        //         // alert("Download Berhasil")
        //         let fileURL = window.URL.createObjectURL(new Blob([response.data]));
        //         let fileLink = document.createElement('a');
        //         fileLink.href = fileURL;
        //         fileLink.setAttribute('download', 'users-data.xlsx');
        //         document.body.appendChild(fileLink);
        //         fileLink.click();

        //     }).catch(errors => {
        //         console.log(errors)
        //     })
    }
  },
}
</script>

<style>

</style>