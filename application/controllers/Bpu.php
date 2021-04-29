<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpu extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_bpu');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataBpu'] = $this->M_bpu->select_all();
		$data['page'] 		= "Potensi BPU";
		$data['judul'] 		= "Data Potensi BPU";
		$data['deskripsi'] 	= "List Data Potensi BPU dari kantor cabang";

		//$data['modal_tambah_komplain'] = show_my_modal('modals/modal_tambah_komplain', 'tambah-komplain', $data);

		$this->template->views('bpu/home', $data);
	}

	public function tampil() {
		$data['dataBpu'] = $this->M_bpu->select_all();
		// $data = $this->M_perusahaan->select_all();
		$this->load->view('bpu/list_data', $data);
		
	}
	
	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataBpu'] 	= $this->M_bpu->select_by_id($id);

		echo show_my_modal('modals/modal_update_bpu', 'update-bpu', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');		
		$this->form_validation->set_rules('nama', 'Nama Peserta', 'trim|required');
		$this->form_validation->set_rules('nik', 'Nomor e-KTP', 'trim|required');
		$this->form_validation->set_rules('usaha', 'Pekerjaan Sekarang', 'trim|required');
		$this->form_validation->set_rules('kab', 'Alamat Kab/Kota', 'trim|required');
		$this->form_validation->set_rules('prog', 'Jumlah Program', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required');
		$this->form_validation->set_rules('p_pickup', 'PIC Tindak Lanjut', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bpu->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data BPU Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data BPU Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_bpu->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data BPU Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data BPU Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataKomplain'] = $this->M_bpu->select_by_id($id);
		//$data['dataPerusahaan'] = $this->M_perusahaan->select_all();
		echo show_my_modal('modals/modal_detail_bpu', 'detail-vpu', $data, 'lg');
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
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Nama Calon Peserta");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Nomor e-KTP");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Jenis Usaha");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Alamat Kab/Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "Jumlah Program");
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', "Nomor HP");
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', "PIC Tindak Lanjut");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->waktu);
		     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->nama);
		      $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->nik); 
		       $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->usaha);
		        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->kab);
		         $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->prog);
		          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->no_hp);
		           $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->p_pickup);
		           
		    
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Potensi BPU.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Potensi BPU.xlsx', NULL);
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