<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Content_model extends CI_Model
{
         function show_all(){
            $this->db->select('*');
            $this->db->from('content');
            $this->db->join('user', 'user.id = content.id_user');
            $this->db->join('jenis_content', 'jenis_content.id = content.id_jenis');
            $query = $this->db->get();
            return $query;
      }
        public function getJenisContent(){

        $query = "SELECT *
        FROM `jenis_content` JOIN `content`
        ON `jenis_content`.`id` = `content`.`id_jenis`
         ";
         return $this->db->query($query)->result_array();
    }
}
