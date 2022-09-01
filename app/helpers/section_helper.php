<?php
  // Simple page redirect
  require_once 'button_helper.php';
  function call_section($param){
 
echo '
<div class="call-section-container text-center  ">
    <div class="call-section-message text-center">
   <h1 class="display-6">Relax and Enjoy in Lavida Hotel</h1>
   <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing e d tempor incididunt ut labore et dolore magna aliqua.</p>

  

<button type="button" class="btn btn-md btn-danger mb-2"><a href= "'.  URLROOT. '/hotelroom/index">  '.$param.' </a> </button> 


<br>
 <span> or</span> 
   <div class="call-icon-container">
       <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
       <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
       </svg>
     
     
       <div class="number">Call us 826 - 3492</div> 
   </div>
 </div>
 </div>
';
  }