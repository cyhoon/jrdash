<?php

class User_model extends CI_Model
{
    public function get($user_id=null)
    {
        /*
         * @usage
         * $this->user_n->model->get(2),
         * ALL : $this->user_model->get();
         */

        if($user_id === null) {
//            $sql = "SELECT * FROM `user`";
//            $query = $this->db->query($sql);
            $q = $this->db->get('user');
        }else if(is_array($user_id)){
            $q = $this->db->get_where('user',$user_id);
        }
        else{
//            $sql = "SELECT * FROM `user` WHERE user_id = '".$user_id."' ";
//         $query =  $this->db->query($sql);
            $q = $this->db->get_where('user',['user_id' => $user_id]);
        }

//        $result = $query->result_array();
        return $q->result_array();
    }

    public function insert($data)
    {
//        $sql = "INSERT INTO `user` VALUES .....
//        $this->db->query($sql);
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }

    /*
     * @usage $this->user_model->update(['login' => 'Peggy'],3);
     */
    public function update($data,$user_id)
    {
//        $sql = "UPDATE SET `login` = 'Jethro' WHERE user_id = $user_id
//        $this->db->query($sql);
        $this->db->where(['user_id' => $user_id]);
        $this->db->update('user',$data);
        return $this->db->affected_rows();
    }

    /*
     *
     * $usage $this->user_model->delete(6);
     */
    public function delete($user_id)
    {
//        $sql = "DELETE FROM `user` WHERE user_id = '".$user_id."';
//        $query = $this->db->query($sql);
        $this->db->where(['user_id' =>$user_id]);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }
}

?>