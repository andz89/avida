<?php

  function discount_button($param){
    
    echo '<div class="discount-btn-container"> <a href= " '. URLROOT. '/hotelroom/index"><button type="button" class="btn btn-md btn-danger mb-2"> '.$param.'  </button> </a> </div>';
  }

  function book_button(){
    
  return '<div class="book-btn-container"> <a href="'. URLROOT. '/booking/add_room?id=$_GET["id"]"><button type="button" class="btn btn-md btn-primary mb-2">Book Room  </button></a> </div>';
  }