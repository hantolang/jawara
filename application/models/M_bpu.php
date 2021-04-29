<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bpu extends CI_Model {

	public function select_all() {
		$this->db->select('*');
		$this->db->from('bpu');
		$this->db->where('id is NOT NULL', NULL, FALSE);
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM bpu WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	//public function insert($data) {
		//$sql = "INSERT INTO kritiksaran VALUES(
		//'','" .$data['waktu'] ."','" .$data['cabang'] ."','" .$data['no_hp'] ."','" .$data['nama'] ."','" .$data['nik'] ."','" .$data['jenis'] ."','" .$data['keluhan'] ."','" .$data['tl'] ."','" .$data['p_pickup'] ."')";

		//$this->db->query($sql);

		//return $this->db->affected_rows();
	//}

	//public function insert_batch($data) {
		//$this->db->insert_batch('komplain', $data);

		//return $this->db->affected_rows();
	//}

	public function update($data) {
		$sql = "UPDATE bpu SET waktu='" .$data['waktu'] ."',nama='" .$data['nama'] ."',nik='" .$data['nik'] ."',usaha='" .$data['usaha'] ."',kab='" .$data['kab'] ."',prog='" .$data['prog'] ."',no_hp='" .$data['no_hp'] ."',p_pickup='" .$data['p_pickup'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM bpu WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_bpu($komplain) {
		$this->db->where('bpu', $bpu);
		$data = $this->db->get('bpu');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('bpu');

		return $data->num_rows();
	}

}

/* End of file M_bpu.php */
/* Location: ./application/models/M_bpu.php */
