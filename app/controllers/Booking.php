<?php
class Booking extends Controller{
    public function __construct(){
        if(!isLoggedIn() ){
            redirect('users/login');
           };
     

        $this->dis = 'Book now 10% discount!!'; 
    }

    public function index(){
  
        $data =  ['title' => 'Lavida Hotel',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'discount-btn' =>  $this->dis
            ];   

                
        $this->view('pages/index', $data);
        
    }

    public function add_room(){
  
        $data =  ['title' => 'Pearl Room',
                'description_1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisic',
                
            ];   
        $this->view('booking/add_room', $data);
    }
    public function book_dashboard(){
        $data =  ['discount-btn' =>  $this->dis];
        $this->view('booking/book_dashboard',  $data);
       
    }


}

