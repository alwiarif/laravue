<template>
   <div row justify-content-center>
      <h5>Upload Users Build Data</h5> 
      <form id="mainFormUsers">
         
          <br><br>
          <input type="file" class="form-control" :class="{ ' is-invalid' : error.message }" id="input-file-import" name="file_import" ref="import_file"  @change="onFileChange">
          <div v-if="error.message" class="invalid-feedback"></div>
          <br>
          <input type="submit" name="upload" @click.prevent="saveExcel()">
      </form>
  </div>
</template>

<script>
export default {
    data() {
        return {
            error: {},
            import_file: '',
            
        }
    },
    created() {
       
    },
    methods: {
        
    onFileChange(e) {
        this.import_file = e.target.files[0];
    },
    saveExcel(){

          let formData = new FormData();
        formData.append('import_file', this.import_file);

          axios.post('/api/users/import-excel', formData, {
              headers: { 'content-type': 'multipart/form-data' }
            })
            .then(response => {
                if(response.status === 200) {
                  alert("Berhasil Upload")
                  
                let fileLoader = document.getElementById('input-file-import');
                fileLoader.value = null
                this.$router.push({
                        name: 'Home'
                    })
                }
            })
            .catch(error => {
                this.error = error.response.data
                console.log('check error: ', this.error)
            });
    },
    },
}
</script>

<style>

</style>