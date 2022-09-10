<?php
  class Rooms {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

     
    // Find user by email
    public function findRoomByRoom($room_id){
    
      $this->db->query('SELECT * FROM rooms WHERE id = :id');
      $this->db->bind(':id', $room_id);
      $row = $this->db->single();
     
      return $row;
     
    }
    public function getAllRooms(){
    
      $this->db->query('SELECT * FROM rooms');
     
      $results = $this->db->resultSet();
     
      return $results;
     
    }
    public function getCountRooms(){
    
      $this->db->query('SELECT * FROM rooms');
     
      $results = $this->db->resultSet();
     
      return $this->db->rowCount();
     

    }

    public function getRoom($room_id){
    
        
      $this->db->query('SELECT * FROM rooms WHERE id = :id');
      $this->db->bind(':id', $room_id);
      $row = $this->db->single();
     
      return $row;
     
    }
    // public function getCountBookings(){
    
    //   $this->db->query('SELECT * FROM book');
     
    //   $results = $this->db->resultSet();
     
    //   return $this->db->rowCount();
     

    // }
    public function add_room($data){
    
      $this->db->query('INSERT INTO rooms (room_name, description_1, description_2,image_path,image_filename) VALUES(:room_name, :description_1, :description_2,:image_path,:image_filename)');
      // Bind values
      $this->db->bind(':room_name', $data['room_name']);
      $this->db->bind(':description_1', $data['description_1']);
      $this->db->bind(':description_2', $data['description_2']);
      $this->db->bind(':image_path', $data['image_path']);
      $this->db->bind(':image_filename', $data['image_filename']);



      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
     
    }
    public function update_room($data){
    
      $this->db->query('UPDATE rooms SET room_name = :room_name, description_1 = :description_1,description_2 = :description_2,image_path = :image_path WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':room_name', $data['room_name']);
      $this->db->bind(':description_1', $data['description_1']);
      $this->db->bind(':description_2', $data['description_2']);
      $this->db->bind(':image_path', $data['image_path']);
      // $this->db->bind(':image_thumbnail', $data['image_thumbnail']);



      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
     
    }
    public function delete_room($id){

      $this->db->query('DELETE FROM rooms WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);
    
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
     
    }
   
    public function insert_booking($data){
    
      $this->db->query('INSERT INTO book (booking_id, user_id, user_name,user_email,room_id,room_name, number_adults,number_children,arrival_date,booking_status) VALUES(:booking_id, :user_id, :user_name,:user_email, :room_id, :room_name,:number_adults,:number_children,:arrival_date,:booking_status)');
      // Bind values
      $this->db->bind(':booking_id', $data['booking_id']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':user_name', $data['user_name']);
      $this->db->bind(':user_email', $data['user_email']);
      $this->db->bind(':room_id', $data['room_id']);
      $this->db->bind(':room_name', $data['room_name']);
      $this->db->bind(':number_adults', $data['number_adults']);
      $this->db->bind(':number_children', $data['number_children']);
      $this->db->bind(':arrival_date', $data['arrival_date']);
      $this->db->bind(':booking_status', $data['booking_status']);



      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
     
    }

 
    // public function insert_dates_booking($data){
      
    //   $this->db->query('SELECT * FROM rooms WHERE room_name = :room_name');
    //   $this->db->bind(':room_name', $data['room_name']);
    //   $row = $this->db->single();
     
    //   if($row){
        

    //   }else{
    //     $this->db->query('INSERT INTO date_booking (dates,room_name) VALUES(:dates,:room_name)');
    //     // Bind values
    //     $this->db->bind(':dates', $data['dates']);
    //     $this->db->bind(':room_name', $data['room_name']);
    //     // Execute
    //     if($this->db->execute()){
    //       return true;
    //     } else {
    //       return false;
    //     }

    //   }
     



    
    //  }
  }