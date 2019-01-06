<?php
// a class to handle users in the database
// CREATE TABLE `user` (
//  `id` int(11) NOT NULL,
//  `name` varchar(64) NOT NULL,
//  `email` varchar(64) NOT NULL,
//  `password` varchar(64) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8;

class Chat_model extends CI_model {
   
    // this function searches for the given email password user in the DB
    // returns the DB row (an array) or false
    public function send($userid, $message) {
        // validate params
        if (trim($userid) == "" || trim($message) == "")
            throw new Exception("Name or meseage empty!");
       
        $data= array('userid'=>$userid,
            'message'=>$message);
        
        $this->db->select('*');
        $this->db->from('chat');
  
        $this->db->insert('chat',$data);

        // execute the query
        if ($query = $this->db->get()) {
            // return an array
            return $query->row_array();
        } else {
            return false;
        }
    }

     public function chat_list() {
        return $this->db
                ->select('*') /* select anything  */
                ->from('chat') /* from car  */
                /* order it by name, ascendant */
                ->get() /* execute the query */
                ->result_array(); /* convert result into an array */
    }
    // returns an array of the corresponding car (DB table row) 
    // with given id in parameter
    public function carWithId($id) {
        // if we wanted to return the row itself we would use ->row_array() instead
        // select * from car where id = $id
        return $this->db
                ->get_where('chat', array('id' => $id))
                ->result_array();
    }

}