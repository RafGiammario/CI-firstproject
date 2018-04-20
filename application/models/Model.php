<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    function validateCredential($email, $password) {
        $this->db->select('*');
        $this->db->from('access');
        $this->db->where('email', $email);
        $this->db->where('password', sha1($password));

        $get_rows = $this->db->get();
        $num_rows_affected = $get_rows->num_rows();
        $query = $get_rows->result();

        if (isset($query) and $num_rows_affected == 1) {
            return $query[0];
        } else {
            return null;
        }
    }

    //CRUD function:

    //C -> Create
    function create($table, $data) {
        $this->db->insert($table, $data);

    }

    //R -> Read
    function readAll($table, $column=null, $id=null) {
        $data=null;

        $this->db->select('*');
        $this->db->from($table);
        if ($user) $this->db->where($column, $id);

        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function read($table, $id, $column = null, $user = null) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $id);
        if ($column and $user) $this->db->where($column, $user);

        $query = $this->db->get()->result();

        if ($query){
            return $query[0];
        } else {
            return null;
        }
    }

    //U -> Update
    function update($table, $id, $data, $user = null) {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        if ($user) $this->db->where('id_access', $user);
    }

    //D -> Delete
    function delete($table, $id, $user = null) {
        $this->db->where('id', $id);
        $this->db->delete($table);
        if ($user) $this->db->where('id_access', $user);
    }

}