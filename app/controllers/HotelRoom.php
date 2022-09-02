<?php
class HotelRoom extends Controller{
    public function __construct(){
        $this->dis = 'Book now 10% discount!!';
        //the function of this area is to get data from database
        $this->userModel = $this->model('Rooms');
        }
       
    public function index(){
        $rooms = $this->userModel->getAllRooms();
        $data =  ['discount-btn' => $this->dis,
                  'rooms'=> $rooms,
                 ];   
             
        $this->view('hotelroom/index', $data);  
    }

    public function room(){
        $rooms =  $this->userModel->findRoomByRoom($_GET['id']);
       
        $data = [
            'id'=> $rooms->id,
            'room_name'=> $rooms->room_name,
            'large_image'=> $rooms->large_image,
            'description_1'=> $rooms->description_1,
            'description_2'=> $rooms->description_2,
        ];
        $this->view('hotelroom/room', $data);
    }
  

}

