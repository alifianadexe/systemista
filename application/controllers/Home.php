<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pasien');
		$this->load->model('M_klinik');
		$this->load->model('M_kota');
	}

	public function index()
	{
		$data['jml_pasien'] 	= $this->M_pasien->total_rows();
		$data['jml_klinik'] 	= $this->M_klinik->total_rows();
		$data['jml_kota'] 		= $this->M_kota->total_rows();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

		$klinik 				= $this->M_klinik->select_all();
		$index = 0;
		foreach ($klinik as $value) {
			$color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

			$pasien_by_klinik = $this->M_pasien->select_by_klinik($value->id);

			$data_klinik[$index]['value'] = $pasien_by_klinik->jml;
			$data_klinik[$index]['color'] = $color;
			$data_klinik[$index]['highlight'] = $color;
			$data_klinik[$index]['label'] = $value->nama;

			$index++;
		}

		$kota 				= $this->M_kota->select_all();
		$index = 0;
		foreach ($kota as $value) {
			$color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

			$pasien_by_kota = $this->M_pasien->select_by_kota($value->id);

			$data_kota[$index]['value'] = $pasien_by_kota->jml;
			$data_kota[$index]['color'] = $color;
			$data_kota[$index]['highlight'] = $color;
			$data_kota[$index]['label'] = $value->nama;

			$index++;
		}

		$data['data_klinik'] = json_encode($data_klinik);
		$data['data_kota'] = json_encode($data_kota);

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Manage Data CRUD";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */