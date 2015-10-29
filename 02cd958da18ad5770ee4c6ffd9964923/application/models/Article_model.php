<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {

		public $id;
        public $title;
        public $content;
        public $date;

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function get_last_ten_entries()
        {
            $query = $this->db->get('articles', 10);
            return $query->result();
        }

		public function create()
		{
			return $this->db->insert('articles', $this);
			
		}
		
		public function retrieve()
		{
			$query = $this->db->get_where('articles', array('id' => $this->id));
			return $query->row();
		}
		
		public function update()
		{
			return $this->db->update('articles', $this, array('id' => $this->id));
		}
		
		public function delete()
		{
			return $this->db->delete('articles', array('id' => $this->id));
		}


}