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
            'image_path'=> $rooms->image_path,
            'description_1'=> $rooms->description_1,
            'description_2'=> $rooms->description_2,
        ];
        $this->view('pages/room', $data);
    }
    public function booking(){
      $rooms =  $this->roomModel->findRoomByRoom($_GET['id']);
      $date_taken = $this->userModel->getTakenDates($rooms->room_name);

        
          // Check for POST
          check_id($_GET['id'], 'index');#room id
      
    
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
                  
                    'booking_status' =>'pending',
                    'user_email_err'=> '',
                    'arrival_date_err' => '',
                    'number_children_err' => ''
                ]; 
            
                //check if room quatity is updated during changes of quantity
         
                $dates_disable =  disable_dates($date_taken,$rooms->number_of_rooms);
                // $arr = [];
                // foreach($dates_disable as $list){
                //     array_push($arr, $list);
                // }
               
              
                $a  =  explode("to",$data['arrival_date']);
                $b_range = getBetweenDates($a[0], $a[1]);
                $b  =  explode(" ", $b_range);

             

             
                $result = array_merge($dates_disable, $b);
             
               
                $new_array = array_count_values($result);
          
              foreach($new_array as $li =>$key){
              if($key  > 1){
              
                $data['arrival_date_err'] = 'soory! room limit is reached Please refresh the page!';
           
                $this->view('pages/booking', $data);
                return false;
              }
              }


                                // Validate Email
                    if(empty($data['number_adults'])){
                        $data['number_adults_err'] = 'Pleae enter number_adults';
                    }
                    if(empty($data['number_children'])){
                      $data['number_children_err'] = 'Pleae enter children';
                   }


                   if($data['arrival_date'] == null){
                    $data['arrival_date_err'] = 'Please select range date';
                

                 
                   }

                   $string_num = strlen($data['arrival_date']);

                   if($string_num == 10){

                    $data['arrival_date_err'] = 'Please select range date';

                   }
                   
                  
                 
                    if(empty($data['number_adults_err']) && empty($data['arrival_date_err']) ){
                      $string  =  explode("to",$data['arrival_date']);
                      $date_range = getBetweenDates($string[0], $string[1]);
                      $data['arrival_date'] =  $date_range;
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
      
          
            
            $dates_disable =  disable_dates($date_taken,$rooms->number_of_rooms);
        
            $data =  ['user_id' =>$_SESSION['user_id'],
                     'user_name'=> $_SESSION['user_name'],
                     'user_email'=> $_SESSION['user_email'],
                     'room_id' =>$rooms->id,
                     'room_name' => $rooms->room_name, 
                     'date_disabled' => $dates_disable,
                     'number_adults'=> '',
                     'number_children'=> ''
                ];   
            $this->view('pages/booking', $data);
          }
            
       
      
    }
 
}

