<?php 
class Admin extends Controller{

    public function __construct(){
      if(!isLoggedIn() || $_SESSION['user_role'] != 'admin' ){
       redirect('pages/index');
      };

      $this->roomModel = $this->model('Rooms');
      $this->roomCount = $this->roomModel->getCountRooms();
    

     
    }
    public function index(){
      
      $data =  ['added-rooms'=>$this->roomCount];   
   
      $this->view('admin/index', $data);

      }
      public function rooms(){
        $rooms = $this->roomModel->getAllRooms();
        $data =  ['title' => 'Avida Hotel Rooms',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'added-rooms'=>$this->roomCount,
                  'rooms'=> $rooms,
            ];   
     
        $this->view('admin/rooms', $data);
  
        }
        public function add_room(){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){




              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            
              $fileName = $_FILES['image_big']['name'];
              $fileTempName = $_FILES['image_big']['tmp_name'];
                print_r($fileTempName);
              $fileType = $_FILES['image_big']['type'];
              $fileError = $_FILES['image_big']['error'];

  
              $fileExt = explode('.',$fileName);
              $fileActualExt = strtolower(end($fileExt));
              $allowed = array('jpg', 'jpeg', 'png');
              
              // if(in_array($fileActualExt, $allowed)){
              //     if($fileError ==0){
              //       $fileNewName = uniqid('',true)."." .$fileActualExt;
              //       $fileDestination =   'images/'.$fileNewName;
                    
              //         move_uploaded_file($fileTempName, $fileDestination);
              //     }else{
              //       echo 'there was an error uploading your photo';
              //       return false;
              //     }
              // }else{
              //   echo 'wrong type of file';
              //   return false;
              // }
            $data =  [
              'room_name' => trim($_POST['room_name']),
            'description_1' => trim($_POST['description_1']),
            'description_2' => trim($_POST['description_2']),
            // 'image_thumbnail' => trim($_POST['image_thumbnail']),
            'large_image' =>'',
          
            // 'image_thumbnail' => trim($_POST['image_thumbnail']),

            'room_name_err' => '',
            'description_1_err'=> '',
            'description_2_err'=> '',
            'image_big_err'=>''
            
        ]; 
        //validate inputs
        if(empty($data['room_name'])){
                $data['room_name_err'] = 'Please enter room name';
        }
        if(empty($data['description_1'])){
          $data['description_1_err'] = 'Please enter room description';
        }
        if(empty($data['description_2'])){
          $data['description_2_err'] = 'Please enter room description';
        }
        if(!in_array($fileActualExt, $allowed)){
          $data['image_big_err'] = 'Wrong type of file';

        }
        if($fileError != 0){
          $data['image_big_err'] = 'there was an error uploading your photo';

        }
         // Make sure errors are empty
         if(empty($data['image_big_err']) && empty($data['room_name_err']) && empty($data['description_1_err'] && empty($data['descrption_1_err']))){
          $fileNewName = uniqid('',true)."." .$fileActualExt;
          $fileDestination =   'images/'.$fileNewName;
          move_uploaded_file($fileTempName, $fileDestination);
          $data['large_image'] = URLROOT . '/'. 'images/'.$fileNewName;
          
          if($this->roomModel->add_room($data)){
              flash('room added', 'Room added');
              redirect('admin/rooms');
          }else{
            die('something went wrong');
          }
         }else{
          $this->view('admin/add_room', $data);
         }



          }else{
            $data =  ['room_name' => '',
            'description_1' => '',
            'description_2' => '',
          
        ];   
 
          $this->view('admin/add_room', $data);
          }
        
    
          }
 


 
}