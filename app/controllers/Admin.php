<?php 
class Admin extends Controller{

    public function __construct(){
      admin_role('pages/index');

      $this->userModel = $this->model('user');
      $this->roomModel = $this->model('Rooms');

      $this->userCount = $this->userModel->getCountUsers();
      $this->roomCount = $this->roomModel->getCountRooms();
      $this->bookCount = $this->roomModel->getCountBookings();
 

     
    }
    public function index(){
     
      $data =  ['added-rooms'=>$this->roomCount,
                'added-book' =>  $this->bookCount,
                'users' =>  $this->userCount,
    ];   

      $this->view('admin/index', $data);

      }
      public function rooms(){
        $rooms = $this->roomModel->getAllRooms();
        $data =  [
       
          'title' => 'Avida Hotel Rooms',
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
         if(empty($data['image_big_err']) && empty($data['room_name_err']) && empty($data['description_1_err']) && empty($data['description_2_err'])){
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
 




          
          public function edit_room(){
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
          
              $data =  [
              'id' => trim($_GET['id']),
                'room_name' => trim($_POST['room_name']),
              'description_1' => trim($_POST['description_1']),
              'description_2' => trim($_POST['description_2']),
              'large_image' =>trim($_POST['large_image']),
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
          if($fileName == true){
          
            if(!in_array($fileActualExt, $allowed)){
              $data['image_big_err'] = 'Wrong type of file';
    
            }
            if($fileError != 0){
              $data['image_big_err'] = 'there was an error uploading your photo';
    
            }
          }
         
           // Make sure errors are empty
           if((empty($data['image_big_err']) && empty($data['room_name_err']) && empty($data['description_1_err']) && empty($data['description_2_err']))){
           
            // if did not uoload new image
            if($fileName == true){
              $fileNewName = uniqid('',true)."." .$fileActualExt;
              $fileDestination =   'images/'.$fileNewName;
              move_uploaded_file($fileTempName, $fileDestination);
              $data['large_image'] = URLROOT . '/'. 'images/'.$fileNewName;

            }
            
            if($this->roomModel->update_room($data)){
                flash('room added', 'Room added');
                redirect('admin/rooms');
            }else{
              die('something went wrong');
            }
           }else{
            $this->view('admin/edit_room', $data);
           }
  
  
  
            }else{

              
              if($_GET['id'] == null){
                redirect('admin');

              }
              $room =  $this->roomModel->findRoomByRoom($_GET['id']);
            
          if($room->id){
          $data =  [
          'id'=> $room->id,
          'room_name' =>$room->room_name,
          'description_1' => $room->description_1,
          'description_2' =>  $room->description_2,
          'large_image' => $room->large_image

          ]; 
          }else{
          redirect('admin/room');
          }

             
   
            $this->view('admin/edit_room', $data);
            }
          
      
            }

              public function delete(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                  if($this->roomModel->delete_room($_GET['id'])){
                    redirect('admin/rooms');
                  }
                }
              }

              public function bookings(){
                $bookings = $this->userModel->getAllBookings_as_admin();
                 $total_bookings =  $this->userModel->getCountBookings();
                $data= ['booking' => $bookings,
                          'total_bookings'=> $total_bookings          
              ];
              $this->view('admin/bookings', $data);

              }
              public function contact(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                  // Init data
                  $data =[
                   'id' => trim($_POST['id']),
                   'email' => trim($_POST['email']),
                   'telephone' => trim($_POST['telephone']),
                   'address' =>  trim($_POST['address']),

                  
                 ];
                   // Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Pleae enter email';
          }
  
          // Validate Password
          if(empty($data['telephone'])){
            $data['telephone_err'] = 'Please enter telephone';
          }
          // Validate address
          if(empty($data['address'])){
          $data['address_err'] = 'Please enter telephone';
          }

       
  
          // Make sure errors are empty
          if(empty($data['email_err']) && empty($data['telephone_err']) && empty($data['address_err']) ){
            if($this->userModel->update_contact($data)){
              flash('contact_update', 'Contact updated successfuly');
              redirect('admin/contact');
          }else{
            die('something went wrong');
          }
          }else{
            // Load view with errors
            $this->view('users/login', $data);
          }
                }else{
                  $contact =  $this->userModel->getContact();
                  $data= [
                    'id'=> $contact->id,
                    'telephone' => $contact->telephone,
                  'email' => $contact->email,
                  'address' => $contact->address
                             
                ];
                $this->view('admin/contact', $data);
                }
            

              }

}