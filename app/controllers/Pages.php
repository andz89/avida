<?php
class Pages extends Controller{
    public function __construct(){

     
        $this->dis = 'Book now 10% discount!!';
      $this->userModel = $this->model('User');
    }

    public function index(){
        $data =  ['title' => 'Avida Hotel',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'discount-btn' =>  $this->dis
            ];   
     
        $this->view('pages/index', $data);

    }
   
  

    public function about(){
        $data =  [
            'title' => 'About Lavida Hotel',
        'description' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates,Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates,
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit.  amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit.g elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit. Magni porro rem voluptates, Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni porro rem voluptates, sit amet consectetur adipisicing elit',
        'discount-btn' =>  $this->dis
    ];
        $this->view('pages/about',  $data);
       
    }
   
    public function contact(){
        $data =  ['discount-btn' =>  $this->dis];
        $this->view('pages/contact',  $data);
      
    }

  
}

