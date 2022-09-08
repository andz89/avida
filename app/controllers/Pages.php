<?php
class Pages extends Controller{
    public function __construct(){

        $this->roomModel = $this->model('Rooms');
      $this->userModel = $this->model('User');
    }

    public function index(){
        $data =  ['title' => 'Avida Hotel',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
      
            ];   
     
        $this->view('pages/index', $data);

    }
   
  

    public function about(){
        $data =  [
            'title' => 'About Lavida Hotel',
        'description' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates,Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates,
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit.  amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit.g elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit',
   
    ];
        $this->view('pages/about',  $data);
       
    }
   
    public function contact(){
        $contact =  $this->userModel->getContact();
        $data= ['contact' => $contact->telephone,
        'email' => $contact->email,
        'address' => $contact->address
                   
      ];
      $this->view('pages/contact', $data);
 
      
    }
  
    public function rooms(){
        $rooms = $this->roomModel->getAllRooms();
        $data =  [
                  'rooms'=> $rooms,
                 ];   
             
        $this->view('pages/rooms', $data);  
    }
    public function room(){
        if(!isset($_GET['id']) ){
        redirect('pages/rooms');
        }
        $rooms =  $this->roomModel->findRoomByRoom($_GET['id']);
       
        $data = [
            'id'=> $rooms->id,
            'room_name'=> $rooms->room_name,
            'large_image'=> $rooms->large_image,
            'description_1'=> $rooms->description_1,
            'description_2'=> $rooms->description_2,
        ];
        $this->view('pages/room', $data);
    }
    public function booking(){
       
          // Check for POST
          check_id($_GET['id'], 'index');#room id
      
          $rooms =  $this->roomModel->findRoomByRoom($_GET['id']);

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            user_role('pages/booking');
         
         
            $data =  ['booking_id'=> uniqid('', true),
                    'user_id' =>$_SESSION['user_id'],
                     'user_name'=> $_SESSION['user_name'],
                     'user_email'=> $_SESSION['user_email'],
                     'user_number'=> $_SESSION['user_contact_number'],

                     'room_id' =>$rooms->id,
                     'room_name' => $rooms->room_name,
                     'number_adults' => trim($_POST['number_adults']),   
                     'number_children' =>  trim($_POST['number_children']),   
                    'arrival_date' => trim($_POST['arrival_date']),
                    'departure_date' => trim($_POST['departure_date']),
                    'booking_status' =>'pending',
                    'user_email_err'=> ''

                ]; 
           
                                // Validate Email
                    if(empty($data['number_adults'])){
                        $data['number_adults_err'] = 'Pleae enter number_adults';
                    }

                 
                    if(empty($data['number_adults_err']) ){
                        // Validated
                        if($this->roomModel->insert_booking($data)){
                  
                            redirect('pages/rooms');
                          } else {
           
        
                            die('Something went wrong');
                          }
                       }else{
                        $this->view('pages/booking', $data);

                       }
              
                  
                

          }else{
          
            check_id($_GET['id'], 'index');#room id
            user_role('users/login');
            $rooms =  $this->roomModel->findRoomByRoom($_GET['id']);
            $data =  ['user_id' =>$_SESSION['user_id'],
                     'user_name'=> $_SESSION['user_name'],
                     'user_email'=> $_SESSION['user_email'],
                     'room_id' =>$rooms->id,
                     'room_name' => $rooms->room_name,
                ];   
            $this->view('pages/booking', $data);
          }
            
       
      
    }
 
}

