<?php 
function  room_template($id, $large_image, $room_name, $description_1,$description_2){

        echo '
        <div class="card each_rooms ">
          <div class="card-body rooms-content">
               
          <img class="card-img-top" src =" '. $large_image .'"  alt="Card image cap">
                
            
            <div>
            <div class="btn-book">
        
            <div class="book-btn-container"> <a href="'. URLROOT. '/booking/book_room?id= '.$id.'"><button type="button" class="btn btn-md btn-primary mb-2">Book Room  </button></a> </div>
            </div>
            <br>
                <h2 class="room-title">'. $room_name .'</h2>
                <p class="lead">'.$description_1.'</p>
                <p class="lead">'.$description_2.'</p>
        
           
                
            </div>
        
         
      
        
            
          </div>
        
        </div>
        ';
}
