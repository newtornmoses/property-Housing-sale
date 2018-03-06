 {{--  whats on your mind  --}}
 <div class="col-md-6 ">
        <form action="{{route('post.post')}}"  class="uploadform"  method="post">
            <div class="form-group">
               <textarea name="body" class="form-control" cols="30" rows="10" placeholder="Say something ..."></textarea>
               </div>
               <div class="uploadTypes">
                    <i class="fa fa-camera upload"> Camera </i>
                    <i class="fa fa-photo upload"> Photo</i>
                    <i class="fa fa-video-camera upload"> Video</i>
                    <i class="fa fa-microphone upload"> Audio</i>
               </div>
               
            
               <div class="form-group">
                <input type="file" name="image" class="form-control postfileUpload" >
                </div>
                <hr>
               <input type="submit" class ="btn btn-warning col-md-offset-4" value="Say something">
              
               {{csrf_field()}}
           
            </form>


 </div>

 <script src="{{asset('js/scripts.js')}}"></script> 