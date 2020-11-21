<template>
  <div class="">
     <div class="d-flex">
        <div class="col-md-8">
            <h1>Select A Contact</h1>
            <message-feed :contact="contact" :messages="messages"></message-feed>
             <message-composer></message-composer>
        </div>
        <div class=" col-md-4">
            <div> <h2 class="text-center">Contacts <span class="badge badge-primary rounded-pill">20</span></h2></div>
            <div class="contacts">
                <ul>
                    <li  v-for="(contact,index) in contacts" :key="index" @click="selectedContact(index,contact)" >
                            <div class="card" :class="{'selected': index==selected}">
                                <h6>{{ contact.name }}</h6>
                                <p>{{contact.email}}</p>
                            </div>
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
    selected:0,
    contacts:[],
    messages:[],
    contact:{},

  }),
  mounted(){
      this.fetchContacts();
  },
  methods:{
      fetchContacts(){
          axios.get(
              '/fetch-contacts'
          ).then((res)=>{

             this.contacts=res.data;
          }).catch((err)=>{console.log(err)});
      },
      selectedContact(index,contact){
          this.selected=index;
          this.contact=contact;


          axios.get(`/messages/${contact.id}`).then((res)=>{

              this.messages=res.data;

          }).catch((err)=>{concole.log(err)})


      },

  },

}
</script>

<style lang="scss" scoped>
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
.card{
     box-shadow: 0 4px 8px 0 rgba(87, 86, 86, 0.288);
     padding:1rem;


}
.selected{
    background-color: rgb(177, 190, 186);

}
</style>
