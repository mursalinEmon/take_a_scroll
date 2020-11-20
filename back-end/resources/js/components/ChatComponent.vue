<template>
  <div class="">
     <div class="d-flex">
        <div class="col-md-8">
            <h1>Conversation with</h1>
            <message-feed></message-feed>
             <message-composer></message-composer>
        </div>
        <div class="">
            <div> <h2 class="text-center">Contacts <span class="badge badge-primary rounded-pill">20</span></h2></div>
            <div class="contacts">
                <ul>
                    <li  v-for="(contact,index) in contacts" :key="index" class="card-body shadow-sm ">
                        <h6>{{ contact.name }}</h6>
                        <p>{{contact.email}}</p>
                    </li>
                </ul>
            </div>
        </div>

     </div>
  </div>
</template>

<script>
import MessageComposer from './MessageComposer.vue'
import MessageFeed from './MessageFeed.vue'
export default {
  components: { MessageComposer, MessageFeed },

  data:()=>({

    contacts:[],

  }),
  mounted(){
      this.fetchContacts();
  },
  methods:{
      fetchContacts(){
          axios.get(
              '/fetch-contacts'
          ).then((res)=>{
             console.log(res);
             this.contacts=res.data;
          }).catch((err)=>{console.log(err)});
      }

  },

}
</script>

<style>
li{
    list-style:none;
}
ul{
    list-style:none;
    margin:0px;
    padding-left:0px;
}
.contacts{
    margin:0px;
    padding:0px;
    height:80vh;
    overflow-y:scroll;
}
</style>
