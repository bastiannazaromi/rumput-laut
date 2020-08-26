<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			$this->session->set_flashdata('flash-error', 'Anda Belum Login');
			redirect('Login','refresh');
		}

		$this->load->model('M_Rekap', 'rekap');
		$this->load->model('M_Data', 'data');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'backend/dashboard';
		$data['rumput'] = $this->rekap->getRumput();

		$rumput = $this->data->jam();

        $lama_pengeringan = $rumput[0]['lama_pengeringan'];
        $keterangan = $rumput[0]['keterangan'];

        $awal  = date_create($rumput[0]['waktu']); // waktu lalu
        $akhir = date_create(); // waktu sekarang
        $diff  = date_diff( $awal, $akhir );
        
        $jam = $diff->i; // dalam menit , $jam = $diff->H (jam)

        if ($keterangan != "Tidak ada rumput laut")
        {
        	if ($jam >= $lama_pengeringan)
	        {
	            $data['menit'] = 0;
	            $data['detik'] = 0;
	        }
	        else
	        {
	        	if ($diff->i == 0)
	        	{
	        		$data['menit'] = $lama_pengeringan - 1;
	        	}
	        	else
	        	{
	        		$data['menit'] = $lama_pengeringan - $diff->i - 1;
	        	}
	            $data['detik'] = 60 - $diff->s;
	        }
        }
        else
        {
        	$data['menit'] = 0;
	        $data['detik'] = 0;
        }

		$this->load->view('backend/index', $data);
	}

	public function profile()
	{
		$data['title'] = 'Profile';
		$data['page'] = 'backend/profile';
		$this->load->view('backend/index', $data);	
	}

	public function editProfile()
	{
		if ($this->input->post('password', true))
		{
			$data = [
	            "nama" => $this->input->post('nama', true),
	            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
	        ];
		}
		else
		{
			$data = [
	            "nama" => $this->input->post('nama', true)
	        ];
		}
		
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('tbuser', $data);

		$this->session->set_flashdata('flash-sukses', 'Profile berhasil diedit');
		redirect('Dashboard/profile', 'refresh');
	}

	public function get_realtime(){
		$data_tabel = $this->rekap->getGrafik();
		echo json_encode($data_tabel);
	}

	public function dashboard_realtime()
	{
		$suhu = $this->rekap->getLast();
		$rumput = $this->rekap->getRumput();

		$data = [
			"suhu" => $suhu[0]['suhu'],
			"sejak" => date('H:i:s', strtotime($rumput[0]['waktu'])),
			"rumput" => $rumput[0]['keterangan']
		];

		echo json_encode($data);
	}

	public function grafik()
	{
		$data['title'] = 'Grafik Suhu';
		$data['page'] = 'backend/grafik';
		$this->load->view('backend/index', $data);
	}

	public function rekap()
	{
		$data['title'] = 'Data Rekap';
		$data['page'] = 'backend/rekap';
		$data['rekap'] = $this->rekap->getAll();
		$this->load->view('backend/index', $data);
	}

	public function hapusRekap($id)
	{
		$this->rekap->hapusRekap($id);
		$this->session->set_flashdata('flash-sukses', 'data berhasil dihapus');
		redirect('Dashboard/rekap');
	}

	public function editJam()
	{
		$data = [
			"lama_pengeringan" => $this->input->post('jam', true)
		];
		
        $this->db->where('id', 1);
        $this->db->update('tbrumput', $data);

		$this->session->set_flashdata('flash-sukses', 'Jam berhasil diedit');
		redirect('Dashboard', 'refresh');
	}

}
