
<template>
  

  <div class="propertyShow">
  
<div class="frontPage">
  <h1 class="text-center brandName">PROPERTY MASTERS</h1>
  <h4 class="text-center subHeading">Find property with us</h4>
  
</div>
   



<div class="Page navigation">
<h4 class="text-center featuredProperty text-white col-md-12"> {{totalFeatured}} Featured Houses For Sale</h4>
    <div class="pagiLinks">
          <ul class="pagination col-md-3">
            <h5 class="text-white totalItems">Total Items {{totalItems.length}}</h5>
            <li>
              <button  @click="fetchProperties(pagination.prev_page_url)"  class="paginationbtn btn btn-success" aria-label="Previous" 
              
              :disabled= "!pagination.prev_page_url">
                <span aria-hidden="true">&laquo;</span>
              </button>
        </li>

          {{pagination.current_page }} of {{pagination.last_page}}
        

          
            <li> 
              <button @click="fetchProperties(pagination.next_page_url)" class="paginationbtn btn btn-success" aria-label="Next" :disabled= "pagination.current_page ===pagination.last_page">
                <span aria-hidden="true">&raquo;</span>
              </button>
            </li>
          </ul>
  </div>

       <!-- //search -->
       <div class="searchPannel col-md-8 col-sm-12 col-xs-12">
              <div class="form-group col-md-4 col-xs-4">
                <label for="ByName">Search By Name</label>
                    <input type="text"  v-model="search"  class="form-control search" name="search"  placeholder="search property by name">    

              </div>

              <div class="form-group col-md-4 col-xs-4 ">
                <label for="ByCountry">Search By Country</label>
                      <input type="text"  v-model="searchCountry"  class="form-control  search" name="search"  placeholder="search property by country">                   

              </div>
            </div>       

</div>

         <!-- empty response -->
              <div v-if="totalFeatured===0" class="emptyResponse col-md-4">
                  
                 <h4 class="text-empty">

                   oopss...result not found!!!
                 </h4>

              </div>

   <!-- v-for -->
<div class="col-md-12 col-sm-12 col-xs-12 panel-default">
                            
    <div v-if="NotSearch" class="col-md-4 col-sm-8  col-xs-12 col-md-offset-0 col-xs-offset- col-sm-offset-1 singleProduct" v-for="(property, index) in properties" :key="index">
       
       
       <div class="panel-body">
          <a :href="'property/'+property.property_slug">
              <img :src="'public/images/'+property.image" class="img-responsive property" alt="">
            </a>

        </div>
        

        <div class="panel-footer footer">
            <h4 class="text-center "> {{property.property_name}}</h4>
           <h4 class="text-center ">${{property.price/1000}}K<span class="badge">{{property.location}}</span>
           </h4>

           <h6>Posted by: {{property.name}}</h6>
           <h6 class="posted_at">  {{HumanTime(property.created_at)}}</h6>
           
        </div>
           
  </div>

</div>

             
                <!-- v-for search by name -->
        <div class="col-md-12 col-sm-8 col-xm-6 panel-default">
                            
              <div v-if="searchByName" class="col-md-4 col-sm-6 col-sm-offset-2 col-md-offset-0 singleProduct" v-for="(property, id) in filterList" :key="id">
                
                
                <div class="panel-body">
                <a :href="'property/'+property.property_slug">
                    <img :src="'public/images/'+property.image" class="img-responsive property" alt="">
                  </a>

                  </div>
                  

                  <div class="panel-footer footer">
                      <h4 class="text-center "> {{property.property_name}}</h4>
                    <h4 class="text-center ">${{property.price/1000}}K<span class="badge">{{property.location}}</span>
                    </h4>

                    <h6>Posted by: {{property.name}}</h6>
                    <h6 class="posted_at">  {{HumanTime(property.created_at)}}</h6>
                    
                  </div>
           
        </div>


        <!-- v-for search country -->
 <div v-if="searchByCountry" class="col-md-4 col-sm-6 col-sm-offset-2 col-md-offset-0 singleProduct" v-for="(property, index) in filterCountry" :key="index">
       
       
       <div class="panel-body">
       <a :href="'property/'+property.property_slug">
           <img :src="'public/images/'+property.image" class="img-responsive property" alt="">
        </a>

        </div>
        

        <div class="panel-footer footer">
            <h4 class="text-center "> {{property.property_name}}</h4>
                <h4 class="text-center ">${{property.price/1000}}K<span class="badge">{{property.location}}</span>
           </h4>

           <h6>Posted by: {{property.name}}</h6>
           <h6 class="posted_at">  {{HumanTime(property.created_at)}}</h6>
           
        </div>
           
        </div>

   
</div>
             <p><hr></p>  

            <!-- footer pagination -->
            
              <div class="pagination  footer col-md-12">
                      <ul class="pagination footer">
                       
                        <li>
                          <button  @click="fetchProperties(pagination.prev_page_url)"  class="paginationbtn btn btn-success" aria-label="Previous" 
                          
                          :disabled= "!pagination.prev_page_url">
                            <span aria-hidden="true">&laquo;</span>
                          </button>
                    </li>

                      {{pagination.current_page }} of {{pagination.last_page}}
                    

                      
                        <li> 
                          <button @click="fetchProperties(pagination.next_page_url)" class="paginationbtn btn btn-success" aria-label="Next" :disabled= "pagination.current_page ===pagination.last_page">
                            <span aria-hidden="true">&raquo;</span>
                          </button>
                        </li>
                      </ul>
              </div>

              
           


</div>


</template>



<script>
    
   export default{
        data(){
            return{
                current_page:'',
                last_page_url:'',
                last_page:'',
                next_page_url:'',
                prev_page_url:'',
                first_page_url:'',
                path:'',
                pagination:{},
                properties:[],
                searchCountry:'',
                search:'',
                searchByName:true,
                searchByCountry:false,
                totalItems:'',
                AllProperties:'',
                NotSearch:true,
                empty:false,
                totalFeatured:'',
                searchCountryResults:'',
                searchResults:''
                
            }
        },
        created(){
         this.fetchProperties();
         this.fetchAllprops();
         
          
        },
        computed:{
            //filter by name
          filterList:function()
            { 
               this.searchCountry='';
               this.searchCountryResults=null
               this.searchByCountry=false;
               this.searchByName=true;
               
               this.NotSearch= false;
              
                
                 const resultName= this.AllProperties.filter(elem =>elem.property_name.toLowerCase().match(this.search.toLowerCase()));
                  this.totalFeatured =resultName.length;
                  this.searchResults = resultName;
            return this.searchResults;            
            },
              //filter by country
            filterCountry()
            {    
                  this.searchByCountry=true;
                  this.searchByName=false;
                  this.search='';
                  this.NotSearch= false;
                  
                    const resultCountry = this.AllProperties.filter(elem =>elem.location.toLowerCase().match(this.searchCountry.toLowerCase()))
                    this.totalFeatured = resultCountry.length;
                    this.searchCountryResults = resultCountry;
                 return resultCountry;
            },

           

        },

        methods:{

          fetchAllprops()
          {
            axios.get('/properties')
                  .then(data=>{

                   
                    this.totalItems = data.data[1];
                    this.AllProperties = data.data[1];

                       console.log(this.AllProperties);
                    });
          },
            
            fetchProperties(path){
                let vm = this;
                 path= path|| 'properties/'
              axios.get(path )
                  .then(res=>{
                      //   data
                          
                      const fetchedData = res.data[0].data; 
                       this.properties = fetchedData;
                       this.totalFeatured =this.properties.length;
                       this.searchByCountry=false;
                       this.searchByName=false;
                       this.NotSearch = true;
                           
                          //  filter
                        
                             
                    
                      vm.makePagination(res.data[0]);
                      
          })
            },
          
          makePagination(data)
          {
             //  paginating pages
            let pagination ={  
                current_page : data.current_page,
                last_page : data.last_page,                
                last_page_url : data.last_page_url,
                next_page_url : data.next_page_url,
                prev_page_url : data.prev_page_url,
                path: data.path,
                first_page:data.first_page_url
            }
             this.pagination = pagination;
          },

          // moment
          HumanTime(value)
          {
            return moment(value).fromNow(); 
          },
          
            
        },
        
    }
</script>