<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
 class File_model extends CI_Model{

    // upload file
    public function upload($filename, $path, $username){

        $data = array(
            'filename' => $filename,
            'path' => $path,
            'username' => $username
        );
        $query = $this->db->insert('files', $data);

    }
    public function get_file_by_id($id){
            $this->db->select("*");
            $this->db->from("files");
            $this->db->where('id',$id);
            return $this->db->get()->row();
    }
    public function search_data($query){
        if($query == '')
        {
            $this->db->from('users');
            $this->db->join('files', 'users.username = files.username');
            $query = $this->db->get();         
            return $query->result();   
        }else{
            $this->db->from('users');
            $this->db->join('files', 'users.username = files.username');
            $this->db->like('filename', $query);
            $this->db->or_like('users.username', $query);
            $query = $this->db->get();         
            return $query->result();   
        }
    }
    public function fetch_data($query)
    {
        if($query == '')
        {
            return null;
        }else{
            $this->db->select("*");
            $this->db->from("files");
            $this->db->like('filename', $query);
            $this->db->or_like('username', $query);
            $this->db->order_by('filename', 'DESC');
            return $this->db->get();
        }
    }
    public function ajax_fetch_data($limit, $start,$file_id)
    {
        $this->db->select("*");
        $this->db->from("file_description");
        $this->db->where('file_id', $file_id);
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }
    public function upload_user_avatar($username,$path){
        if(!$path == NULL){
            $this->db->query("UPDATE users SET path = '$path' WHERE username = '$username';");
        }
        
    }
    public function print_data(){

        $this->db->from('users');
      $this->db->join('files', 'users.username = files.username');
        $query = $this->db->get();         
        return $query->result();   
    }

    public function show_description_detail($fileid){
        $this->db->from("file_description");
        $this->db->where('file_id', $fileid);
        $query = $this->db->get();
        if($query->num_rows() >= 1){
            $result = $query->result();
            return $result;
        }else{
            return null;
        }
    }
    public function add_comment($username,$fileid,$comment){
        
        $this->db->query(
            "INSERT INTO file_description(username, file_id, description) VALUES ('$username', '$fileid', '$comment')"
        );
    }
    public function add_anon_comment($username,$localIP,$fileid,$comment){
        $this->db->query(
            "INSERT INTO file_description(username, file_id, description,ip_address) VALUES ('$username', '$fileid', '$comment','$localIP')"
        );
    }
    public function count_favourite($fileid){
        $query = $this->db->query(
            "SELECT count(*) as count FROM favourite WHERE file_id = $fileid AND y_n = '1' "
        );
        
        return $query->row();
    }
    public function check_like($username, $fileid){
        $query=$this->db->query(
            "SELECT y_n as y_n FROM favourite WHERE username = '$username' AND file_id = $fileid"
        );
        if($query->num_rows() < 1){
            return 0;
        }else{
            if($query->row()->y_n == 1){
                return 1;
            }else{
                return 0;
            }
        }
    }
    public function set_like($username, $fileid){
        $query=$this->db->query(
            "SELECT y_n as y_n FROM favourite WHERE username = '$username' AND file_id = $fileid"
        );
        if($query->num_rows() <= 0){
            $this->db->query(
                "INSERT INTO favourite(username, file_id, y_n) VALUES ('$username', '$fileid', '1')"
            );
        }else{
            if($query->row()->y_n == 1){
                $query=$this->db->query(
                    "UPDATE favourite
                SET y_n = 0
                WHERE username = '$username' AND file_id = $fileid"
                );
                
            }else{
                $query=$this->db->query(
                    "UPDATE favourite
                SET y_n = 1
                WHERE username = '$username' AND file_id = $fileid"
                );
            }
        }
    }
    public function get_collect_list($username){
        $this->db->select("*");
        $this->db->from('collect');
        $this->db->join('files', 'collect.file_id = files.id');
        $this->db->where('collect.username',$username);
        $query = $this->db->get();         
        return $query->result();   
    }
    public function collect($username, $fileid){
        $query=$this->db->query(
            "SELECT * FROM collect WHERE username = '$username' AND file_id = $fileid"
        );
        if($query->num_rows() < 1){
            $this->db->query(
                "INSERT INTO collect(username, file_id) VALUES ('$username', '$fileid')"
            );
        }else{
            $this->db->query(
                "DELETE FROM collect WHERE username = '$username' AND file_id = $fileid"
            );
        }
    }
    public function check_collect($username, $fileid){
        $query=$this->db->query(
            "SELECT * FROM collect WHERE username = '$username' AND file_id = $fileid"
        );
        if($query->num_rows() < 1){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
