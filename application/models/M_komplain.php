<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_komplain extends CI_Model {

	public function select_all() {
		$this->db->select('*');
		$this->db->from('kritiksaran');
		$this->db->where('id is NOT NULL', NULL, FALSE);
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kritiksaran WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO kritiksaran VALUES(
		'','" .$data['waktu'] ."','" .$data['cabang'] ."','" .$data['no_hp'] ."','" .$data['nama'] ."','" .$data['nik'] ."','" .$data['jenis'] ."','" .$data['keluhan'] ."','" .$data['tl'] ."','" .$data['p_pickup'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('komplain', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE kritiksaran SET waktu='" .$data['waktu'] ."',cabang='" .$data['cabang'] ."',ho_hp='" .$data['no_hp'] ."',nama='" .$data['nama'] ."',nik='" .$data['nik'] ."',jenis='" .$data['jenis'] ."',keluhan='" .$data['keluhan'] ."',tl='" .$data['tl'] ."',p_pickup='" .$data['p_pickup'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kritiksaran WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_komplain($komplain) {
		$this->db->where('komplain', $komplain);
		$data = $this->db->get('kritiksaran');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('komplain');

		return $data->num_rows();
	}

}

/* End of file M_komplain.php */
/* Location: ./application/models/M_komplain.php */
