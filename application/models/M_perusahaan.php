<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perusahaan extends CI_Model {

	public function select_all() {
		$this->db->select('*');
		$this->db->from('daftarprog');
		$this->db->where('noformulir is NOT NULL', NULL, FALSE);
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM daftarprog WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO daftarprog VALUES(
		'','" .$data['noformulir'] ."','" .$data['tglformulir'] ."','" .$data['notelp'] ."','" .$data['nama'] ."','" .$data['perusahaan'] ."','" .$data['wilayah'] ."','" .$data['tk'] ."','" .$data['program'] ."','" .$data['upah'] ."','" .$data['hitung'] ."','" .$data['id_pic'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('perusahaan', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE daftarprog SET noformulir='" .$data['noformulir'] ."',tglformulir='" .$data['tglformulir'] ."',notelp='" .$data['notelp'] ."',nama='" .$data['nama'] ."',perusahaan='" .$data['perusahaan'] ."',wilayah='" .$data['wilayah'] ."',tk='" .$data['tk'] ."',program='" .$data['program'] ."',upah='" .$data['upah'] ."' ,hitung='" .$data['hitung'] ."' ,id_pic='" .$data['id_pic'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM daftarprog WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_perusahaan($perusahaan) {
		$this->db->where('perusahaan', $perusahaan);
		$data = $this->db->get('daftarprog');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('perusahaan');

		return $data->num_rows();
	}

}

/* End of file M_perusahaan.php */
/* Location: ./application/models/M_perusahaan.php */
