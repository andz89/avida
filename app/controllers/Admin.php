<?php 
class Admin extends Controller{

    public function __construct(){
      admin_role('pages/index');

      $this->userModel = $this->model('user');
      $this->roomModel = $this->model('Rooms');

      $this->userCount = $this->userModel->getCountUsers();
      $this->roomCount = $this->roomModel->getCountRooms();
      $this->bookCount = $this->userModel->getCountBookings();
 

     
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
            
            
              $fileName = $_FILES['image_path']['name'];
              $fileTempName = $_FILES['image_path']['tmp_name'];
                print_r($fileTempName);
              $fileType = $_FILES['image_path']['type'];
              $fileError = $_FILES['image_path']['error'];

  
              $fileExt = explode('.',$fileName);
              $fileActualExt = strtolower(end($fileExt));
              $allowed = array('jpg', 'jpeg', 'png');
        
            $data =  [
              'room_name' => trim($_POST['room_name']),
            'description_1' => trim($_POST['description_1']),
            'description_2' => trim($_POST['description_2']),
            'number_of_rooms' => trim($_POST['number_of_rooms']),
            'price' => trim($_POST['price']),
            'image_path' =>'',
            'room_name_err' => '',
            'description_1_err'=> '',
            'description_2_err'=> '',
        
            
        ]; 
        //validate inputs
        if(empty($data['room_name'])){
                $data['room_name_err'] = 'Please enter room name';
        }
        if(empty($data['price'])){
          $data['price_err'] = 'Please enter room price';
  }
        if(empty($data['number_of_rooms'])){
          $data['number_of_rooms_err'] = 'Please enter room quantity';
  }
        if(empty($data['description_1'])){
          $data['description_1_err'] = 'Please enter room description';
        }
        if(empty($data['description_2'])){
          $data['description_2_err'] = 'Please enter room description';
        }
        if(!in_array($fileActualExt, $allowed)){
          $data['image_path_err'] = 'Wrong type of file';

        }
        if($fileError != 0){
          $data['image_path_err'] = 'there was an error uploading your photo';

        }
         // Make sure errors are empty
         if(empty($data['image_path_err']) && empty($data['price_err']) && empty($data['room_name_err']) && empty($data['description_1_err']) && empty($data['description_2_err']) &&  empty($data['number_of_rooms_err'])){
          $fileNewName = uniqid('',true)."." .$fileActualExt;
          $fileDestination =   'images/'.$fileNewName;  
          move_uploaded_file($fileTempName, $fileDestination);
          $data['image_path'] =URLROOT . '/'.'images/'.$fileNewName;
          $data['image_filename'] = $fileNewName;
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
            $data =  [
            'room_name' => '',
            'description_1' => '',
            'description_2' => '',
            'number_of_rooms' => '',
            'price' => '',


        ];   
 
          $this->view('admin/add_room', $data);
          }
        
    
          }
 




          
          public function edit_room(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
  

  
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              
              
                $fileName = $_FILES['image_path']['name'];
                $fileTempName = $_FILES['image_path']['tmp_name'];
              
                $fileType = $_FILES['image_path']['type'];
                $fileError = $_FILES['image_path']['error'];
  
    
                $fileExt = explode('.',$fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png');
          
              $data =  [
              'id' => trim($_GET['id']),
                'room_name' => trim($_POST['room_name']),
              'description_1' => trim($_POST['description_1']),
              'description_2' => trim($_POST['description_2']),
              'image_path' =>trim($_POST['image_path']),
              'number_of_rooms' =>trim($_POST['number_of_rooms']),
              'price' =>trim($_POST['price']),
              'room_name_err' => '',
              'description_1_err'=> '',
              'description_2_err'=> '',
          ]; 
          //validate inputs
          if(empty($data['room_name'])){
                  $data['room_name_err'] = 'Please enter room name';
          }
          if(empty($data['price'])){
            $data['price_err'] = 'Please enter room name';
    }
          if(empty($data['number_of_rooms'])){
            $data['number_of_rooms_err'] = 'Please enter room quantity';
    }
          if(empty($data['description_1'])){
            $data['description_1_err'] = 'Please enter room description';
          }
          if(empty($data['description_2'])){
            $data['description_2_err'] = 'Please enter room description';
          }
         
          if($fileName == true){
         
            if(!in_array($fileActualExt, $allowed)){
              $data['image_path_err'] = 'Wrong type of file';
    
            }
            if($fileError != 0){
              $data['image_path_err'] = 'there was an error uploading your photo';
    
            }
          }
   
           // Make sure errors are empty
           if((empty($data['image_path_err']) && (empty($data['price_err'])) && empty($data['room_name_err']) && empty($data['description_1_err']) && empty($data['description_2_err']) && empty($data['number_of_rooms_err']))){
           
            // if did not uoload new image
            if($fileName == true){
              $fileNewName = uniqid('',true)."." .$fileActualExt;
              $fileDestination =   'images/'.$fileNewName;
              move_uploaded_file($fileTempName, $fileDestination);
              $data['image_path'] = URLROOT . '/'. 'images/'.$fileNewName;
            
            }
          
            if($this->roomModel->update_room($data)){
                flash('room added', 'Room added');
                redirect('admin/rooms');
            }else{
              die('something went wrong');
            }
           }else{
      
            return false;
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
          'image_path' => $room->image_path,
          'number_of_rooms' => $room->number_of_rooms,
          'price' => $room->price



          ]; 
          }else{
          redirect('admin/room');
          }

             
   
            $this->view('admin/edit_room', $data);
            }
          
      
            }

              public function delete(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  $image_path =  $this->roomModel->getroom($_GET['id']);
                  $filename = 'images/'. $image_path->image_filename;
                  // print_r($filename);
                  // URLROOT . '/'. 'images/'.$fileNewName
                  // return false;
                  if (file_exists($filename)) {
                    unlink($filename);

                  }else{
                    print_r($filename);
                    return false;
                  }
                  

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
                   'update_at' => date("Y-m-d H:i:s"),

                  


                  
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
                  'address' => $contact->address,
                  'update_at' => $contact->update_at

                             
                ];
                $this->view('admin/contact', $data);
                }
            

              }
              
              public function approve_book(){
     
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 $booking = $this->userModel->getBooking($_GET['id']);
            
        
                $data = [
                  'id' => $booking->id,
                   'booking_status'=>'Approved',
                   'date_approved'=> date("l jS \of F Y h:i:s A")
                ];      
         
                 
                    if($this->userModel->approve_booking($data)){
                    
                      redirect('admin/bookings');
                    }
         
                 
                }
              }
}