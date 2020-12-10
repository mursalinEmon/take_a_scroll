<template>
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                    </div>
                    <button class="btn btn-success" @click="upload_image()"> ulpoad</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {
        return {
            // we will pass the pruduct id  in the url collected from the server response after the product creation and the add image as update value
          dropzoneOptions: {
              url: '/product-image',
              autoProcessQueue:false,
               addRemoveLinks: true,
               ulpoadMultiple:true,
              headers: {
                "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
               }
          }
        }
      },
      methods:{
          upload_image(){
              this.$refs.myVueDropzone.processQueue();
          }
      }
}
</script>

<style>

</style>
