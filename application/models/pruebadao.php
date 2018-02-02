<?php 
	/**
	* 
	*/
	class Pruebadao extends CI_Model
	{
		
		public function getUsers()
		{
			$query=$this->db->get('users');
			return $query->result();		
		}
		public function addUser($data)
		{
			$this->db->insert('users',$data);
			return;
		}
		public function updateUser($data)
		{
			$x= array('nombre' =>$data["nombre"] ,'user'=> $data["user"] );
			$this->db->update('users',$data, array('id' => $data['id']));
		}
		public function deleteUser($x)
		{
			$this->db->where('id',$x);
			$this->db->delete('users');
		}
		public function getUser($x)
		{
			$this->db->where('id',$x);
			$query=$this->db->get('users');

			return $query->result_array();		
		}

	}
 ?>