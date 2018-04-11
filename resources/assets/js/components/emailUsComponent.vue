<template>

  <div class="col-md-4 col-sm-12 col-md-offset-2  col-sm-offset-2 weeklyUpdates">
      
    <h4>Subscribe to our Weekly Updates</h4>
    <form action=" "  method="post" @submit.prevent="subscribe">
        <div class="form-group">
        <label for="email">Email</label>
         <input type="text" class="form-control" name="email" v-model="email" placeholder=" type your email">
        </div>
        <button type="submit" class="btn btn-primary btn-block subscribe">Subcribe</button>

    </form>
    <hr>
</div>
</template>

<script>
    export default{
        data(){
            return{
                
                alert:'',
                email:''
            }

        },
        methods:{
            subscribe()
            {
                
                axios.post('/emailSubscription',{
                    'email':this.email
                }).then(data=>{
                   
                      this.email='';
                    this.alert=data.data;
                    this.noty();
                  
                }).catch(err=>console.log(err))
            },

            noty()
            {
                new Noty({
                    type:'success',
                    layout:'bottomRight',
                    timeout:3000,
                    text:this.alert

                }).show();
            }
        }

    }
</script>
