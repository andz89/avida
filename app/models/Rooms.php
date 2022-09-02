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
    public function add_room($data){
    
      $this->db->query('INSERT INTO rooms (room_name, description_1, description_2,large_image) VALUES(:room_name, :description_1, :description_2,:large_image)');
      // Bind values
      $this->db->bind(':room_name', $data['room_name']);
      $this->db->bind(':description_1', $data['description_1']);
      $this->db->bind(':description_2', $data['description_2']);
      $this->db->bind(':large_image', $data['large_image']);
      // $this->db->bind(':image_thumbnail', $data['image_thumbnail']);



      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
     
    }
  }