
<?php

function user_role($page){

  if(isLoggedIn() && isset($_SESSION['user_id']) && !$_SESSION['user_role'] == 'user'){
    redirect($page);  
  }
  if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'){
    redirect($page);  

  }

}
function admin_role($page){
  if(isset($_SESSION['user_role'])){
  if(isLoggedIn() && $_SESSION['user_role'] == 'admin'){
    return true;
  }else{
    redirect($page);
    return false;

  }
}
}
function check_id($id,$page){
  if(isset($id)== true){

        return true;
    }else{
        redirect($page);
        return false;
    }
}

