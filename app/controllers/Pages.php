<?php
class Pages extends Controller{
    public function __construct(){

        $this->roomModel = $this->model('Rooms');
      $this->userModel = $this->model('User');
    }

    public function index(){
        $data =  ['title' => 'Avida Hotel',
                'description' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.',
      
            ];   
     
        $this->view('pages/index', $data);

    }

  

    public function about(){
        $data =  [
            'title' => 'About Lavida Hotel',
        'description' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates,Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates,
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor.',
   
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
            'room_amount'=> $rooms->room_amount,
            'description_1'=> $rooms->description_1,
            'description_2'=> $rooms->description_2,
        ];
        $this->view('pages/room', $data);
    }
    public function booking(){

      if(!$_SESSION['user_id']){
        redirect('users/login');
        return false;
      }else{
        if(isset($_SESSION['user_role'])){
          if($_SESSION['user_role'] == 'admin'){
            redirect('index');
            return false;
          }
        
        }
      }
   

      $rooms =  $this->roomModel->findRoomByRoom($_GET['id']);
      $date_taken = $this->userModel->getTakenDates($rooms->room_name);

    
          // Check for POST
          check_id($_GET['id'], 'index');#room id
      
          if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data =  ['booking_id'=> uniqid('', true),
                    'user_id' =>$_SESSION['user_id'],
                     'user_name'=> $_SESSION['user_name'],
                     'user_email'=> $_SESSION['user_email'],
                     'user_number'=> $_SESSION['user_contact_number'],
                     'room_id' =>$rooms->id,
                     'room_name' => $rooms->room_name,
                     'number_adults' => trim($_POST['number_adults']),   
                     'number_children' =>  trim($_POST['number_children']),  
                    'booking_dates' => '',
                    'check_in_and_out' => trim($_POST['check_in_and_out']),
                    'booking_fee' =>  $rooms->booking_fee,
                    'room_amount' =>  $rooms->room_amount,

                    'user_email_err'=> '',
                    'check_in_and_out_err' => '',
                    'number_children_err' => ''
                ]; 
            


                //check if room quantity is updated during changes of quantity ---start
                $dates_disable =  disable_dates($date_taken,$rooms->number_of_rooms);

                // Validate check_in_and_out
                if(empty($data['check_in_and_out'])){
                $data['check_in_and_out_err'] = 'Pleae enter range dates';
                $this->view('pages/booking', $data);

                return false;
                }

                $a  =  explode("to",$data['check_in_and_out']);
                $b_range = getBetweenDates($a[0], $a[1]);
                $b  =  explode(" ", $b_range);

                $result = array_merge($dates_disable, $b);
                $new_array = array_count_values($result);//check if naa ba same na date
          
              foreach($new_array as $li =>$key){
              if($key  > 1){
              
                $data['check_in_and_out_err'] = 'sorry! room limit is reached';
              
                $data['date_disabled'] = $dates_disable;
                $this->view('pages/booking', $data);
                return false;
              }
              }
                //check if room quantity is updated during changes of quantity ---end


                    // Validate Email
                    if(empty($data['number_adults'])){
                        $data['number_adults_err'] = 'Pleae enter number_adults';
                    }
                    if(empty($data['number_children'])){
                      $data['number_children_err'] = 'Pleae enter children';
                   }


                   if($data['check_in_and_out'] == null){
                    $data['check_in_and_out_err'] = 'Please select range date';
                

                   }

                   //check if range date is only day 1
                   $string_num = strlen($data['check_in_and_out']);

                   if($string_num == 10){

                    $data['check_in_and_out_err'] = 'Please select range date';

                   }
                   
                  
                 
                    if(empty($data['number_adults_err']) && empty($data['number_children_err']) && empty($data['check_in_and_out_err']) ){
                      
                      $string  =  explode("to",$data['check_in_and_out']);
                      $date_range = getBetweenDates($string[0], $string[1]);
                      $data['booking_dates'] =  $date_range;

                      $token = $_POST["stripeToken"];
                      $amount          = $_POST["booking_fee"]; 
                      $desc            =  $rooms->room_name;
                      $total = $amount * 0.01695;
                      $charge = \Stripe\Charge::create([
                        "amount" => round($total) * 100,
                        "currency" => 'USD',
                        "description"=>$desc,
                        "source"=> $token,
                     
                      ]);
                      if($charge){
                         // Validated
                         if($this->roomModel->insert_booking($data)){

                            
                        } else {
         
      
                          die('Something went wrong');
                        }
                        redirect('pages/rooms');
                      }
                       
                       }else{
                        $this->view('pages/booking', $data);

                       }
              
                  
                

          }else{
          
            check_id($_GET['id'], 'index');#room id
     
      
       
            $dates_disable =  disable_dates($date_taken,$rooms->number_of_rooms);

            array_push($dates_disable, '2022-10-02');
        print_r($dates_disable);
            $data =  ['user_id' =>$_SESSION['user_id'],
                     'user_name'=> $_SESSION['user_name'],
                     'user_email'=> $_SESSION['user_email'],
                     'room_id' =>$rooms->id,
                     'booking_fee' =>$rooms->booking_fee,
                     'room_amount' =>$rooms->room_amount,
                     'user_number'=> $_SESSION['user_contact_number'],


                     'room_name' => $rooms->room_name, 
                     'date_disabled' => $dates_disable,
                     'number_adults'=> '',
                     'number_children'=> ''
                ];   
                $this->view('pages/booking', $data);

          }
            
       
      
    }
 
}

