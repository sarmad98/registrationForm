<?php
class UserModel extends CI_Model{
        
    public function checkUser($email){
        $this->db->select('name');
        $this->db->where('email',$email);
        $result = $this->db->get('user');
        if($result->num_rows() > 0){
            return $email." Exist Having Username ".$result->row()->name;
        }
        else{
            return "Sorry, Email Doesn't Exist !!";
        }
            
    }
    
    
    public function register($data){
        $insert = $this->db->insert('user', $data);
        // Return the status
        return $insert?true:false;
    }
        
}
?>