<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komplain extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_komplain');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKomplain'] = $this->M_komplain->select_all();
		$data['page'] 		= "Komplain";
		$data['judul'] 		= "Data Komplain";
		$data['deskripsi'] 	= "List Data Komplain dari kantor cabang";

		$data['modal_tambah_komplain'] = show_my_modal('modals/modal_tambah_komplain', 'tambah-komplain', $data);

		$this->template->views('komplain/home', $data);
	}

	public function tampil() {
		$data['dataKomplain'] = $this->M_komplain->select_all();
		// $data = $this->M_perusahaan->select_all();
		$this->load->view('komplain/list_data', $data);
		
	}
	public function prosesTambah() {
		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		$this->form_validation->set_rules('cabang', 'Cabang', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Peserta', 'trim|required');
		$this->form_validation->set_rules('nik', 'Nomor e-KTP', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Segmen Kepesertaan', 'trim|required');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'trim|required');
		$this->form_validation->set_rules('tl', 'Tindak Lanjut', 'trim|required');
		$this->form_validation->set_rules('p_pickup', 'PIC Tindak Lanjut', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_komplain->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Komplain Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Komplain Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataKomplain'] 	= $this->M_komplain->select_by_id($id);

		echo show_my_modal('modals/modal_update_komplain', 'update-komplain', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		$this->form_validation->set_rules('cabang', 'Cabang', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Peserta', 'trim|required');
		$this->form_validation->set_rules('nik', 'Nomor e-KTP', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Segmen Kepesertaan', 'trim|required');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'trim|required');
		$this->form_validation->set_rules('tl', 'Tindak Lanjut', 'trim|required');
		$this->form_validation->set_rules('p_pickup', 'PIC Tindak Lanjut', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_komplain->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Komplain Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Komplain Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_komplain->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Komplain Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Komplain Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataKomplain'] = $this->M_komplain->select_by_id($id);
		//$data['dataPerusahaan'] = $this->M_perusahaan->select_all();
		echo show_my_modal('modals/modal_detail_komplain', 'detail-komplain', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_komplain->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Waktu");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Kode Kantor");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Nomor HP");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Nama Peserta");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Nomor E-KTP");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "Jenis");
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', "Isi Keluhan");
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', "Hasil Tindak Lanjut");
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', "PIC Tindak Lanjut");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->waktu);
		     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->cabang);
		      $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->no_hp); 
		       $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->nama);
		        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->nik);
		         $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->jenis);
		          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->keluhan);
		           $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->tl);
		           $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->p_pickup);
		           
		    
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Komplain.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Komplain.xlsx', NULL);
	}

	/*public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_perusahaan->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_perusahaan->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Perusahaan Berhasil diimport ke database'));
						redirect('Perusahaan');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Perusahaan');
				}

			}
		}
	}*/

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */