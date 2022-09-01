<?php 
class Admin extends Controller{

    public function __construct(){
      if(!isLoggedIn() || $_SESSION['user_role'] != 'admin' ){
       redirect('pages/index');
      };

      $this->userModel = $this->model('Rooms');
     
    }
    public function index(){
      $data =  ['title' => 'Avida Hotel',
              'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
     
          ];   
   
      $this->view('admin/index', $data);

      }
      public function rooms(){
        $rooms = $this->userModel->getAllRooms();
        $data =  ['title' => 'Avida Hotel Rooms',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                  'rooms'=> $rooms,
            ];   
     
        $this->view('admin/rooms', $data);
  
        }

 


 
}