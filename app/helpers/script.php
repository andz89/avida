<?php 

function script_edit_rooms_admin(){
    return 
    
  "
  console.log('ssss')
  let imgInp = document.querySelector('#imgInput')
  if(imgInp == false){
  
  }else{
    imgInp.onchange = evt => {
  
      const [file] = imgInp.files
   
      if (file) {
        blah.src = URL.createObjectURL(file)
      }
  
    
      
    }
  }";
  }

  function alert_flash(){
    return "
  





    let alert_flash = document.querySelector('.alert-flash')
    if(alert_flash.innerHTML == ' '){

    }else{
    
      setTimeout(function(){
        
        alert_flash.style.display = 'none'
      }, 3000);

    }
    
    ";
  }

  function getBetweenDates($startDate, $endDate)
  {


      $rangArray = [];
      $startDate = strtotime($startDate);
      $endDate = strtotime($endDate);
      for ($currentDate = $startDate; $currentDate <= $endDate; 
                          $currentDate += (86400)) {
          $date = date('Y-m-d', $currentDate);

          $rangArray[] = $date;

      }
     

      $new_string = [];
      foreach( $rangArray as $date){
      
        $new_string[] = $date;
      }
     $range_dates =  join(" ",$new_string);
      return $range_dates ;
  }
function disable_dates($array,$quantity){
  $data = [];
  foreach($array as $li){

  array_push($data, $li->arrival_date);
  }
  $i = implode(' ', $data);
  $e = explode(' ', $i);
  $new_array = array_count_values($e);
    $final = [];
  foreach($new_array as $li =>$key){
  if($key  > $quantity){
    array_push($final, $li);
  }
  }
  return $final;

}
