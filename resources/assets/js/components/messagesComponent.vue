<template>
 <div class="messageComponent"> 
      <h5 class="text-center loggedIn"> <span class="adge">
          <i class="fa fa-user-circle-o fa-2x"></i>
          </span> You are logged in as {{user.name}} </h5> 
<div class="messages col-md-8">
    <h4 class="text-white">All Messages</h4> 
           
    <div class="messageMenu">
        <div class="col-md-4">
             <ul class="list-group messageTabMenu">
                 <li class="list-group-item menu" @click="showInbox()">
                      Inbox <span><i class="fa fa-envelope">  {{recieved.length}} </i></span>
                 </li>

                 <li class="list-group-item menu" @click="showSent()">
                        Sent <span><i class="fa fa-envelope"> {{sent.length}} </i></span>
                   </li>


                   <li class="list-group-item menu" @click="showComposer()">
                        Compose New Message <span><i class="fa fa-edit"> </i></span>
                   </li>
             </ul>
        </div>
        </div>

        <div class="messagesPanel col-sm-12 col-md-4"  >
           <ul class="messageUl">
                 <li  @click="showInbox()">
                      Inbox <span><i class="fa fa-envelope">  {{recieved.length}} </i></span>
                 </li>

                 <li  @click="showSent()">
                        Sent <span><i class="fa fa-envelope"> {{sent.length}} </i></span>
                   </li>


                   <li  @click="showComposer()">
                        Compose New Message <span><i class="fa fa-edit"> </i></span>
                   </li>
             </ul>
        </div>


        <!-- view messages  -->

    <div class="card col-md-8 messageContainer"  v-if="showinbox">
             <div class="messageStatus fixed">
                        <div>
                    <h5  class="inbox">Inbox <span class="badge"> {{recieved.length}}</span> </h5> 
                    </div> 
                    <div>
                    <h5 class="unread"> Unread <i class="fa fa-envelope text-danger"> {{unread.length}}</i> </h5>
                    </div>
                 </div>
        
         <li class="list-group-item message"  v-for="(message, index) in recieved" :key="index"  @click="showSingle(index)"> 
                <i class="fa fa-envelope text-danger" v-if="!message.status"> </i>
                <i class="fa fa-envelope" v-if="message.status"> </i>
                
            <div class="to">
                <h4>{{message.name}} </h4>
            </div>
              {{message.message}}
              <p>{{humanTime(message.created_at)}}</p>
            
            </li>
       
        <a class="btn btn-dark" v-if="recieved.length===0">No recieved messages </a>

      
       
        <div class="card-body">
    
  
        </div>

       
    </div>

   <!-- sent messages -->
    <div class="card col-md-8 messageContainer"  v-if="showsent">
       
            <h4>Sent <span class="badge"> {{sent.length}}</span></h4>  
 

         <li class="list-group-item message"  v-for="(message, index) in sent" :key="index"  @click="showSingleSent(index)"> 
                <i class="fa fa-envelope "> </i>
            <div class="to">
                <h4>{{message.name}}</h4>
            </div>
              {{message.message}}
              <p>{{humanTime(message.created_at)}}</p>
            </li>
       
        <a class="btn btn-dark" v-if="sent.length===0">No sent messages </a>
      
       
        <div class="card-body">
    
  
        </div>

       
    </div>

 </div>



  
   <div class="sidebar"  >
      

             <!-- view single sent msg  -->
       <div class="card viewSingle sent" v-show="sentSingleMsg">
            <h4> Single Sent Message <i class="fa fa-level-up text-primary"></i></h4>
            <div class="to">
                <h4>{{singleSentMsg.name}}</h4>
            </div>
              <h5>{{singleSentMsg.message}}</h5>
              <p>{{humanTime(singleSentMsg.created_at)}}</p>

              <div class="controlButtons">
                  <button  class="btn btn-danger pull-right" @click="Delete(singleSentMsg.id)"> Delete</button>
                <a @click.prevent="resend(singleSentMsg.id)" class="btn btn-info pull-left"> Resend</a>

              </div>
            
       </div>
       
             <!-- view single recieved msg -->
       <div class="card viewSingle " v-if="showSingleMsg">
           <img v-if="recievedMsgImage" :src="'/public/images/'+recievedMsgImage" class="card-img-top" alt="">
             <h4 v-if="!recievedMsgImage">No image preview connecting to this message</h4>
            <h4>Single Recieved Message</h4>
            <div class="to">
                <h4>{{singleMsg.name}}</h4>
            </div>
              <h5>{{singleMsg.message}}</h5>
              <p>{{humanTime(singleMsg.created_at)}}</p>

              <!-- <div class="card" style="width=28rem">
                    img
              </div> -->
             
              <div class="controlButtons">
                  <button   class="btn btn-danger pull-right"  @click="Delete(singleMsg.id)"> Delete</button>
                <a @click.prevent="reply(singleMsg.id)" class="btn btn-info pull-left"> reply</a>

              </div>
            
            
            
       </div>


       </div>


        <!-- message composer form -->
   <div class="compose col-md-4" v-if="showcomposer">
            
      <form action="" method="post" @submit.prevent="sendMessage()">

        <div class="form-group">
        <label for="message">Compose Message</label>
        <input type="hidden" name="property_id"  :value="property_id">
        <textarea name="message" id="" class="form-control"  v-model="comment" cols="30" rows="10" placeholder="compose message here"></textarea>
    </div>
        <button type="submit" class="btn btn-dark btn-block">Send</button>
       
    </form>
   </div>


               <!-- reply form -->
            <div class="replyComposer col-md-4" v-if="showreply">
     <form action="" method="post" @submit.prevent="replyMessage()">
            <div class="form-group">
                    <label for="To">Replying To  <span class="badge">{{reply_name?reply_name:reciever_id}}</span> </label>
                   
                    <div class="replyTo">
                        <h4>Recent meassage:
                            
                        </h4>
                        <p class="replymsg">{{reply_msg}}</p>
                    </div>
                   
                </div>

        <div class="form-group">
        <label for="message">Compose Message</label>
        <textarea name="message" id="" class="form-control"  v-model="comment" cols="30" rows="10" placeholder="compose message here"></textarea>
    </div>
        <button type="submit" class="btn btn-info btn-block">Reply</button>
       
    </form>



   

</div>

</div> 


</template>

<script>
    
export default{
    data(){
        return{
          user:'',
          showsent:false,
          showinbox:true,
          showcomposer:false,
          showreply:false,
          comment:'',
          sent:[],
          recieved :[],
          recievername:'',
          messageStatus:'',
          singleMsg:'',
          showSingleMsg:false,
          sentSingleMsg: false,
          singleSentMsg:'',
          reply_id:'',
          reply_name:'',
          reply_msg:'',
          reply_prop_id:'',
          imgShown:'',
          unread:[],
          recievedMsgImage:'',
          recievedMsgData:''
         

        }
    },
    created(){
   this.fetchMessages();
    
    
    },

    props:['user_id', 'reciever_id', 'massage_recieve', 'property_id'],

    methods:{

        //fetch all messages
           fetchMessages()
           {
               axios.get('/user/fetch/' + this.user_id)
                     .then(data => {
                         console.log(data.data)
                         this.recieved = data.data.recieved;
                         this.sent = data.data.sent;
                         this.user = data.data.user;
                          console.log(data.data.recieved)
                          this.showcomposer = true;
                           this.showreply = false;

                        //    unread
                               
                                var arr =[];
                                this.recieved.filter((element, index) =>{
                                                            
                                    if(element.status==0){
                                          arr.push(element)
                                     this.unread =arr;
                                    }
                                    
                                      
                                        console.log(this.unread)
                                        });

                                        // moment
                                       

                          
                         });
           },

        //    moment
        humanTime(value)
        {
            return moment(value).fromNow();
        },


               //send messages
           sendMessage()
           {
               if(this.reciever_id ===this.user_id)
               {
                 alert('oops..no reciever!!please got to any property and click message uploader');
                 return false;
               }else{

              
             
               axios.post('/user/message/'+this.reciever_id, 
               
               { 'message':this.comment,
               'property_id':this.property_id,
               'sender_id': this.user_id,
               'user_id':this.reciever_id}
               )
               .then(data=>{
           console.log(data)
           this.comment='';
           this.messageStatus = data.data;
           this.fetchMessages();
            this.noty();
               } )
               .catch(err=>console.log(err))
      }
           },
 
            // noty
           noty()
           {
               new Noty({
            type:'success',
            text: this.messageStatus,
            layout:'topRight',
            timeout:3000,
         
           
        }).show();
           },
            
            //show sent
           showSent()
           {
               this.showsent = true;
               this.showinbox = false;
           },
             //show inbox
            showInbox()
           {
               this.showsent = false;
               this.showinbox = true;
              
           },
             
             //show message composer
           showComposer()
           {
            this.showSingleMsg = false;
            this.sentSingleMsg= false;
            this.showcomposer= true;
            this.showreply = false;
           },
          
          //show single message
          
           showSingle(i)
           {
              this.recieved.forEach((element,index) => {
                
               if (index === i){
              console.log(element.id)
              this.recievedprop_id = element.property_id;
                   console.log(this.recievedprop_id);
                //    get property info
                axios.get('/property/single_property/'+this.recievedprop_id)
                     .then(data =>{
                         this.recievedMsgData = data.data;
                         this.recievedMsgImage =data.data.image;
                         console.log(data)
                     });


            //   update unread status
             axios.patch('/user/message/update/'+ element.id, {
                 'status':1
             })
                 .then(data=>{
                     console.log(data);
                     
                 }); 


                  this.fetchMessages();
                                
                       
              
       
            this.singleMsg = element;
            this.showcomposer = false;
           this.showSingleMsg = true;
           this.sentSingleMsg= false;
               }else{
                   console.log(false);
                
               }
  
              });
           },
           
           showSingleSent(i){
                this.sent.forEach((element,index) => {
                
               if (index === i){
       console.log(element)
       this.showcomposer = false;
       this.showSingleMsg = false;
       this.sentSingleMsg = true;
       
            this.singleSentMsg = element;
               }else{
                   console.log(false);
              
               } 
               });
           },
      //delete sent
      Delete(msg_id)
      {
          
          axios.put('/user/message/delete/'+ msg_id)
                 .then(data=>{
                     console.log(data);
                     this.sentSingleMsg= false;
                     this.showSingleMsg = false;                    
                     this.showcomposer = true;
                     this.messageStatus = data.data;
                     this.fetchMessages();

                     this.noty();
                 }); 
      },


           //resend
           resend()
           {
                this.reply_id= this.singleSentMsg.user_id,
                this.reply_name =this.singleSentMsg.name,
                this.reply_prop_id =this.singleSentMsg.property_id;
                this.reply_msg =this.singleSentMsg.message
                let sender = this.singleMsg.user_id;
                console.log(this.reply_id)
               
            //    call axios

            axios.post('/user/message/'+this.reply_id, 
            {
                 'message': this.reply_msg,
                 'property_id':this.reply_prop_id,
                 'sender_id' : this.user_id,
                 'user_id' : this.reply_id,
            }
               ).then(data => {
                   this.comment='';
                   this.messageStatus = data.data;
                   this.noty();
                   console.log(data);
                   this.sentSingleMsg= false;
                   this.fetchMessages();
                   

               });
                
           },

           //reply
           reply()
           {   
               
                this.reply_id= this.singleMsg.sender_id;
                this.reply_name =this.singleMsg.name;
                this.reply_msg =this.singleMsg.message;
                this.reply_prop_id = this.singleMsg.property_id;
             
            //    show replyForm
               this.showreply = true;
               this.showcomposer = false;
               this.showSingleMsg =false;
               this.sentSingleMsg = false;
               console.log(this.reply_id)
  
           },


           //send reply
           replyMessage()
        {
            axios.post('/user/message/'+this.reply_id, 
            {
            'message': this.comment,
            'sender_id' : this.user_id,
            'user_id' : this.reply_id,
            'property_id':this.reply_prop_id,
            }
               ).then(data => {
                   this.comment='';
                   this.messageStatus = data.data;
                   this.noty();
                   console.log(data);
                   this.fetchMessages();

               });
        },
   
          
    },
    

 
    computed:{
     
        
   
        
    }
}

</script>