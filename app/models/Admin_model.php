<?php 


class Admin_model
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function auth($data)
    {
        $this->db->query("SELECT username, password FROM user WHERE username=:username");
        $this->db->bind('username', $data['username']);
        $admin = $this->db->get();

        if(password_verify($data['password'], $admin['password'])) {

            $token = password_hash($admin['username'], PASSWORD_DEFAULT);
            
            Flasher::setSession('auth', $token);

            return true;
        }
    }
}