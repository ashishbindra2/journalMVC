<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    //Get Associate Editor
    public function getEditor()
    {
        $this->db->query(" SELECT editors.STREAM_ID AS esid,
     stream.STREAM_ID AS jsid,
     editors.NAME AS editorName,
     editors.EMAIL AS editorEmail,
     editors.MOBILE AS editorMobile,
     editors.WEBLINK AS editorWeb,
     editors.DETAIL AS editorDetail,
     editors.College_name AS editorCollege,
     editors.STATUS AS editorStatus,
     stream.STREAM_NAME AS sName  FROM  
     editors
     JOIN
     stream 
     WHERE (ROLE ='Editor-in-chief' 
          OR editors.ROLE ='Editor-in-Chief'
          OR editors.ROLE ='Editor')
          AND (stream.STATUS=1)");
        $results = $this->db->resultSet();
        return $results;
    }
    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM  signin WHERE email = :email');
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
    // Find user by email
    public function findEditorByEmail($email)
    {
        $this->db->query('SELECT * FROM editors WHERE EMAIL = :email');
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

    // Login User
    public function login($email, $PASSWORD)
    {
        $this->db->query('SELECT * FROM  signin WHERE email = :email AND pass = :pass');
        $this->db->bind(':email', $email);
        $this->db->bind(':pass', $PASSWORD);
        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
}
