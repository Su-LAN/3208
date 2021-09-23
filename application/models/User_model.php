<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class User_model extends CI_Model{

    // Log in
    public function login($username, $password){
        // Validate
        
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');

        if($result->num_rows() >= 1){
            return true;
        } else {
            return false;
        }
    }
    public function get_hash($username){
        $query=$this->db->query(
            "SELECT password as password FROM users WHERE username = '$username'"
        );
        if($query->num_rows() >= 1){
            return $query->row()->password;
        }
    }
    public function check_phone($phone_num){
        $this->db->where('phone', $phone_num);
        $result = $this->db->get('users');
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function check_user($new_username){
        $this->db->where('username', $new_username);
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    public function change_pw($email,$password){
        $this->db->query("UPDATE users SET password = '$password' WHERE email = '$email';");

    }
    public function check_email($email){
        $this->db->where('email', $email);
        $result = $this->db->get('users');
            
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function inster_user($new_username,$first_password){
        $this->db->query(
            "INSERT INTO users(username,password) VALUE (\"$new_username\",\"$first_password\");"
        );
    }
    public function register($username,$email,$password,$date){
        $this->db->query(
            "INSERT INTO users(username,password,email,r_date,is_confirm,path) VALUE (\"$username\",\"$password\",\"$email\",\"$date\",\"0\",\"user.png\");"
        );
    }
    public function get_info($username){
        $this->db->select('*')->from('users')->where('username',$username);
        $result = $this->db->get();
        if($result->num_rows() >= 1){
            return $result->row_array();
        }else{
            return "can not find";
        }
    }
    public function edit_info($email,$phone,$username){
        if(!$email == null){
            if(!$phone ==null){
                $this->db->query("UPDATE users SET email = '$email', phone_num= '$phone',is_confirm = '0' WHERE username = '$username';");
            }else{
                $this->db->query("UPDATE users SET email = '$email',is_confirm = '0' WHERE username = '$username';");
            }
        }else{
            if(!$phone ==null){
                $this->db->query("UPDATE users SET phone_num= '$phone' WHERE username = '$username';");
            }
        }
        
    }
    public function set_confirm($username){
        $this->db->query("UPDATE users SET is_confirm = '1' WHERE username = '$username';");
    }
}
?>