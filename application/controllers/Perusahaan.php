<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_perusahaan');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPerusahaan'] = $this->M_perusahaan->select_all();
		$data['page'] 		= "perusahaan";
		$data['judul'] 		= "Data Perusahaan";
		$data['deskripsi'] 	= "List Data Perusahaan yang akan mendaftar";

		$data['modal_tambah_perusahaan'] = show_my_modal('modals/modal_tambah_perusahaan', 'tambah-perusahaan', $data);

		$this->template->views('perusahaan/home', $data);
	}

	public function tampil() {
		$data['dataPerusahaan'] = $this->M_perusahaan->select_all();
		// $data = $this->M_perusahaan->select_all();
		$this->load->view('perusahaan/list_data', $data);
		
	}
	public function prosesTambah() {
		$this->form_validation->set_rules('noformulir', 'No Formulir', 'trim|required');
		$this->form_validation->set_rules('tglformulir', 'Tanggal Formulir', 'trim|required');
		$this->form_validation->set_rules('notelp', 'Nomor Telpon', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Petugas Perusahaan', 'trim|required');
		$this->form_validation->set_rules('perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('wilayah', 'Wilayah', 'trim|required');
		$this->form_validation->set_rules('tk', 'Jumlah TK', 'trim|required');
		$this->form_validation->set_rules('program', 'Program', 'trim|required');
		$this->form_validation->set_rules('upah', 'Upah', 'trim|required');
		$this->form_validation->set_rules('hitung', 'Jumlah Iuran', 'trim|required');
		$this->form_validation->set_rules('id_pic', 'PIC', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_perusahaan->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Perusahaan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Perusahaan Gagal ditambahkan', '20px');
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
		$data['dataPerusahaan'] 	= $this->M_perusahaan->select_by_id($id);

		echo show_my_modal('modals/modal_update_perusahaan', 'update-perusahaan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('noformulir', 'No Formulir', 'trim|required');
		$this->form_validation->set_rules('tglformulir', 'Tanggal Formulir', 'trim|required');
		$this->form_validation->set_rules('notelp', 'Nomor Telpon', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Petugas Perusahaan', 'trim|required');
		$this->form_validation->set_rules('perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('wilayah', 'Wilayah', 'trim|required');
		$this->form_validation->set_rules('tk', 'Jumlah TK', 'trim|required');
		$this->form_validation->set_rules('program', 'Program', 'trim|required');
		$this->form_validation->set_rules('upah', 'Upah', 'trim|required');
		$this->form_validation->set_rules('hitung', 'Jumlah Iuran', 'trim|required');
		$this->form_validation->set_rules('id_pic', 'PIC', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_perusahaan->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Perusahaan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Perusahaan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_perusahaan->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Perusahaan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Perusahaan Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataPerusahaan'] = $this->M_perusahaan->select_by_id($id);
		//$data['dataPerusahaan'] = $this->M_perusahaan->select_all();
		echo show_my_modal('modals/modal_detail_perusahaan', 'detail-perusahaan', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_perusahaan->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "No Formulir");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Tanggal Formulir");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Nomor Telpon");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Nama Petugas Perusahaan");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Nama Perusahaan");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "Wilayah");
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', "Jumlah TK");
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', "Upah");
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', "Jumlah Hasil Hitung Iuran");
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', "PIC");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->noformulir);
		     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tglformulir);
		      $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->notelp); 
		       $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->nama);
		        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->perusahaan);
		         $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->wilayah);
		          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->tk);
		           $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->upah);
		           $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->hitung);
		           $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->id_pic);
		           
		    
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Perusahaan.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Perusahaan.xlsx', NULL);
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