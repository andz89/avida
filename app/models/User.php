<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Regsiter user
  public function register($data)
  {
    $this->db->query('INSERT INTO users (name, email, password,role,contact_number) VALUES(:name, :email, :password, :role, :contact_number)');
    // Bind values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', $data['role']);
    $this->db->bind(':contact_number', $data['contact_number']);



    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  //login user 
  public function login($email, $password)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }
  //login user 
  public function login_admin($email, $password)
  {
    $this->db->query('SELECT * FROM admin WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if ($password == $hashed_password) {
      return $row;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findUserByEmail($email,)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  // Find user by email
  public function findUserByEmail_admin($email)
  {
    $this->db->query('SELECT * FROM admin WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  // Find user by ID
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function getAllBookings_as_user($id)
  {

    $this->db->query('SELECT * FROM book WHERE user_id = :user_id');
    $this->db->bind(':user_id', $id);

    $results = $this->db->resultSet();

    return $results;
  }
  public function getAllBookings_as_admin()
  {
    $this->db->query('SELECT * FROM book');
    $results = $this->db->resultSet();

    return $results;
  }
  public function getCountBookings()
  {
    $this->db->query('SELECT * FROM book');
    $results = $this->db->resultSet();

    return $this->db->rowCount();
  }
  public function getBookingFee()
  {
    $this->db->query('SELECT booking_fee FROM book');
    $results = $this->db->resultSet();

    return $results;
  }
  public function getTakenDates($data)
  {
    // SELECT COL_NAME AS 'Column_Name', TAB_NAME AS 'Table_Name'
    $this->db->query('SELECT  booking_dates FROM  book WHERE room_name = :room_name');
    $this->db->bind(':room_name', $data);

    $results = $this->db->resultSet();
    return $results;
  }
  public function getCountUsers()
  {

    $this->db->query('SELECT * FROM users');

    $results = $this->db->resultSet();

    return $this->db->rowCount();
  }
  public function getcontact()
  {

    $this->db->query('SELECT * FROM contact');

    $row = $this->db->single();
    return $row;
  }



  public function update_contact($data)
  {

    $this->db->query('UPDATE contact SET telephone = :telephone, email = :email, update_at = :update_at, address = :address WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':telephone', $data['telephone']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':update_at', $data['update_at']);

    // $this->db->bind(':image_thumbnail', $data['image_thumbnail']);



    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getBooking($id)
  {
    $this->db->query('SELECT * FROM book WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }


  public function get_user_details($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function findUserByEmail_updateAccount($email, $id)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email AND id != :id');
    $this->db->bind(':email', $email);
    $this->db->bind(':id', $id);


    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function updateAccount($data, $id)
  {

    $this->db->query('UPDATE users SET contact_number = :contact_number, email = :email, name = :name WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    $this->db->bind(':contact_number', $data['contact_number']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':name', $data['name']);



    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
