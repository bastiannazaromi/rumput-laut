<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Data extends CI_Model {

	public function save($suhu)
	{
        $tanggal = date('Y-m-d H:i:s');
        
        $data = [
            "waktu" => $tanggal,
            "suhu" => $suhu
        ];

        $this->db->insert('tbrekap', $data);
    }

    public function ambil_data_terakhir()
    {
        $this->db->select('*');
        $this->db->from('tbrekap');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }

    public function jam()
    {
        return $this->db->get('tbrumput')->result_array();
    }

    public function update($tanggal, $ket)
    {
        if ($ket == 1)
        {
            $data = [
                "waktu" => $tanggal,
                "keterangan" => 'Dalam proses pengeringan'
            ];
        }
        else
        {
            $data = [
                "keterangan" => 'Tidak ada rumput laut'
            ];
        }

        $this->db->update('tbrumput', $data);
    }

}