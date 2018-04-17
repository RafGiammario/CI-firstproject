<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
    //CRUD function:

    //C -> Create
    function createToDo($data) {
        $this->db->insert('todo', $data);
    }

    //R -> Read
    function readToDos() {
        $data=null;

        $this->db->select('*');
        $this->db->from('todo');
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function readToDo($id) {
        $this->db->select('*');
        $this->db->from('todo');
        $this->db->where('id', $id);

        $query = $this->db->get()->result();

        if ($query){
            return $query[0];
        } else {
            return null;
        }
    }

    //U -> Update
    function updateToDo($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('todo', $data);
    }

    //D -> Delete
    function deleteToDo($id) {
        $this->db->where('id', $id);
        $this->db->delete('todo');
    }

}