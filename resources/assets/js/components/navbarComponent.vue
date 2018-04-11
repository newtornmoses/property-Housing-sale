<template>
<div class="navtemplate">


        <div class="hambagerMenu">
            <i class="fa fa-navicon" @click="menu=!menu">
                    Menu
            </i>
             <!-- menu -->
            <ul class="menu" v-if="menu ">
                <li class="list-group-item">
                  <a :href="home_url" class="menubtn">Home</a>

                </li>

                 <li v-if="logged_in===''" class="list-group-item">
                  <a  :href="login" class="menubtn">Login</a>

                </li>

                <li v-if="logged_in===1" class="list-group-item">
                  <a  :href="profile_url" class="menubtn">Profile</a>

                </li>

                <li v-if="logged_in" class="list-group-item">
                  <a  :href="logout" class="menubtn">Logout</a>

                </li>


                 <li class="list-group-item">
                  <a :href="signup" class="menubtn">Sign up</a>

                </li>
               
               
                 <li class="list-group-item">
                  <a :href="inbox_url" class="menubtn">
                    <i v-if="unread" class="fa fa-envelope unread"> Inbox -  <span class="badge-red">{{unread}}</span> </i>
                    <i v-if="unread===0" class="fa fa-envelope"> Inbox <p class="unreadMsg text-danger">  </p></i>
                    
                  </a>

                </li>
            </ul>

            </div>

           
            

</div>            
</template>


<script>
    export default{
          data(){
              return{
              menu:false 
              }
                
          },
          created(){
            console.log('loggedin'+this.logged_in , 'inbox'+this.inbox_url, 'profile'+this.profile_url)
          },
          props:[
              'unread',
              'logged_in',
              'inbox_url',
              'profile_url',
              'signup',
              'logout',
              'home_url',
              'login'
          ],
         
          
    }
</script>