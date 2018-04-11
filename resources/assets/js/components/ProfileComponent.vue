<template>


<div class="profileComponent">


            <div class="col-md-12 col-sm-12 uploadSection">
                    <hr>


                    <h4 class="text-center">upload a Deal  </h4>
                    <p class="text-center">
                       <button  v-if="!showUploadForm" class="uploadForm btn btn-dafault" id="formuploadbtn"  @click="showUploadForm=true" >upload</button>
                       <button  v-if="showUploadForm" class="uploadForm btn btn-danger" id="formuploadbtn"  @click="showUploadForm=false" >Cancle upload</button>
                       
                    </p>
                      <div class="uploadsection col-md-12 col-sm-12" id="uploadForm" v-if="showUploadForm">

                            <form action="" method="post" class="col-md-6 col-sm-8 " id="showForm"  enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="property_name">Property Name</label>
                                <input type="text" name="property_name" v-model="property_name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Property Image</label>
                                    <input type="file" name="image"  @change="uploadDeal"  required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" v-model="description" class="form-control" required></textarea>
                                    </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" v-model="location" class="form-control" required>
                                    </div>


                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" v-model="price" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block" @click.prevent="fileUpload()">Upload</button>


                            </form>

                             <!-- upload viwer -->

                <div class="card profile viwer col-md-4">
                            <div class="img-card-top imgDeals">

                                <img :src="imageView" class="img-responsive"  alt="">

                            </div>
                        <div class="card-body">
                                <div class="card-title">
                                    <h4>Name: {{property_name}} </h4>
                                </div>
                                <div class="card-text">
                                    <h6>Description:{{description}}  </h6>

                                    <h6>Location:{{location}}  </h6>

                                    <h6>Price:  ${{price/1000}}K</h6>


                                </div>

                         </div>
                </div>
                      </div>
            </div>


                     <!-- updateform -->
         <div class="upload" ref="myform" >
            <div class="formUpdate" v-if="update">

              <form action="" method="post" class="col-md-6 col-sm-8 actualUploadForm"   enctype="multipart/form-data">
                    <div class="form-group">

                        <label for="property_name">Property Name</label>
                        <input type="text" name="property_name" id="property_name" v-model="property_name" class="form-control"  required>
                    </div>

                    <div class="form-group">
                        <label for="image">Property Image</label>
                        <input type="file" name="image"   @change="UploadImage"  accept="images/*" >
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"  v-model="description" required>  </textarea>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" v-model="location" required>
                        </div>


                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" v-model="price" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-block"  @click.prevent="updateData">Update</button>
                        <a  class="btn btn-warning btn-block cancleBtn" @click="cancle">Cancle</a>



                </form>

                <!-- viwer -->

                <div class="card profile viwer col-md-4 col-sm-4">
                            <div class="img-card-top imgDeals">

                                <img :src="imageView" class="img-responsive"  alt="">

                            </div>
                        <div class="card-body">
                                <div class="card-title">
                                    <h4>Name: {{property_name}} </h4>
                                </div>
                                <div class="card-text">
                                    <h6>Description:{{description}}  </h6>

                                    <h6>Location:{{location}}  </h6>

                                    <h6>Price:  ${{price/1000}}K</h6>


                                </div>

                         </div>
                </div>
            </div>
         </div>

            <!-- deals -->
            <div class=" Deals"  >



                <h5 class="text-center"> <span>{{totalProperties}}</span>  Deals Uploaded</h5>
                       
                    <div class="card profile col-md-4 col-sm-8 col-md-offset-0 col-sm-offset-6" v-for="(property , index) in properties"  :key="index">
                            <div class="img-card-top imgDeals">
                             
                                <a :href="'property/'+property.property_slug">
                                <img :src="'/public/images/'+property.image" class="img-responsive"  alt="">
                                </a>
                            </div>
                        <div class="card-body">
                                <div class="card-title">
                                    <h4>Name: {{property.property_name}} </h4>
                                </div>
                                <div class="card-text">
                                    <h6>Location:{{property.location}}  </h6>

                                    <h6>Price:  ${{property.price/1000}}K</h6>

                                   <div class="controls" v-if="allowControls">
                                    <button class="btn btn-info btnEdit"   @click="edit(property.id)">Edit</button>


                                    <form action="" method="post" class="pull-right">
                                    <button type="submit" class="btn btn-danger"  @click.prevent="Delete(property.id)">delete</button>


                                    <h5 >uploaded {{HumanTime(property.created_at)}}</h5>

                                    </form>
                                   </div>
                                </div>


                        </div>






                   </div>
            </div>
</div>


</template>


<script>
    export default{
        created(){
       this.fetchProperty();
       this.userControls();
      
        },
        props:['user_id', 'property_userid'],
        data(){
            return{
            showUploadForm:false,
            properties:[],
            location:'',
            price:'',
            property_name:'',
            description:'',
            singleProp:'',
            update:false,
            imageView:'',
            actualImage:'',
            notificationMsg:'',
            allowControls:false,
            targetImg:'',
            totalProperties:''




            }
        },
        methods:{
         fetchProperty()
         {
             axios.get('/jsonprofile/'+this.user_id)
                  .then(data=>{
                  this.update=false;

                      const fetchedData = data.data;
                      //sort data by descending
                         this.properties =fetchedData.sort((a, b) =>  (b.id -a.id))
                      console.log(this.properties)
                     this.totalProperties = data.data.length;
                     


                  })
                  .catch(err =>console.log(err))
         },
            //allow user controls
          userControls()
          {
            if(this.user_id === this.property_userid){
                console.log('equal');
                this.allowControls = true;
            }else{
                console.log('not equal');
                this.allowControls = false;

            }
          },
         //moment
         HumanTime(value)
         {
             return moment(value).fromNow();
         },

         //edit
         edit(id)
         {
             this.update= true;
            this.singleProp = this.properties.filter(elem =>elem.id===id);
               this.singleProp.forEach(element => {
                   this.property_name = element.property_name;
                   this.imageView = '/public/images/'+element.image;
                   this.location = element.location;
                   this.description = element.description;
                   this.price = element.price;
              });




        this.$refs.myform.style.position= "absolute";
        this.$refs.myform.style.width= "100%"
            //   Get form to view
        this.$refs.myform.style.top= window.scrollY;

         },
        //  cancle
        cancle()
        {

            this.update=false;
        },
        // image upload
        UploadImage(e)
        {
           this.actualImage =e.target.files[0];
           
            //  get  actual FormData name
             

            const reader = new FileReader();
            reader.readAsDataURL(this.actualImage);
           reader.onload= e=>{
            this.imageView = e.target.result
           }
        },

        // update
        updateData()
        {  const id = this.singleProp.map(elem => elem.id);
           let fd = new FormData();
           fd.set('image', this.actualImage, this.actualImage.name);
           fd.set('location', this.location);
           fd.set('property_name', this.property_name);
           fd.set('description', this.description);
           fd.set('price', this.price);


            axios.post('/property/update/'+id, fd)
                 .then(data=>{
                    console.log(data.data);
                     this.notificationMsg = data.data;
                    this.fetchProperty();
                     this.update=false;
                     this.noty();
                 } )
                 .catch(err=>console.log(err))

        }, 
        showUpload()
        {
          this.showUploadForm = true ;
          
          
          
        },

        //upload deal
        uploadDeal(e)
        {
          const fileImage =e.target.files[0];
           this.actualImage = fileImage;
            
          
        //   file reader
          const reader = new FileReader();
          reader.readAsDataURL( fileImage );
          reader.onload = e=>{
              this.imageView=e.target.result;
          }
        },
        //actual upload without id
        fileUpload()
        { 
                //    formdata
           var form = new FormData();
           form.set('image', this.actualImage, this.actualImage.name);
           form.set('user_id', this.user_id);
           form.set('location', this.location);
           form.set('description', this.description);
           form.set('price', this.price);
           form.set('property_name', this.property_name);
           
           

            axios.post('/property/upload',form
         )
           .then(data=>{
               this.notificationMsg = data.data;
               this.fetchProperty();
                this.showUploadForm = false;
               this.noty();

           }).catch(err=>console.log(err.response.data))
        },
     //noty
        noty()
        {
            new Noty({
                layout:'topRight',
                type:'success',
                text:this.notificationMsg,
                timeout:3000

            }).show();
        },

        Delete(id)
        {


            if(confirm('Are you sure you want to delete this property?')){
           let singleid= this.properties.filter(elem =>elem.id===id).map(elem=>elem.id);
           let propert_id =singleid[0];

                //axios call
                  axios.post('/property/delete/'+ propert_id)
                 .then(data =>{
                     console.log(data.data)
                     this.notificationMsg = data.data;
                     this.fetchProperty();
                     this.noty();

                     })
                 .catch(err=>console.log(err))


            }else{
                console.log('not deleted')
            }



        },
        

        },
    }
</script>
