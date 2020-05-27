<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  //reset the password
  public function resetPass($data)
  {
    $this->db->query("UPDATE author_details 
      SET PASSWORD = :password  
      WHERE EMAIL = :email");
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':email', $data['email']);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  //Journals Fields
  public function getJournalsById($id)
  {
    $this->db->query('SELECT * FROM journal_names WHERE JOURNAL_ID = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
  // Regsiter user
  public function register($data)
  {
    $this->db->query('INSERT INTO  author_details
    ( FNAME, MNAME, LNAME, A_TITLE, GENDER, EMAIL, MOBILE,
      DESIGNATION, INSTITUTE_NAME, CITY, STATE, COUNTRY,PASSWORD )
    VALUES ( :name, :mname, :lname, :title, :gender, :email, :phone,
     :designation, :institute, :city, :stat, :country,:passwor )');
    // Bind values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':mname', $data['mname']);
    $this->db->bind(':lname', $data['lname']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':designation', $data['designation']);
    $this->db->bind(':institute', $data['institute']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':stat', $data['state']);
    $this->db->bind(':country', $data['country']);
    $this->db->bind(':passwor', $data['password']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Login User
  public function login($email, $PASSWORD)
  {
    $this->db->query('SELECT * FROM author_details WHERE EMAIL = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->PASSWORD;
    if (password_verify($PASSWORD, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM author_details WHERE EMAIL = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Get User by ID
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
