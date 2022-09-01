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
      
  }