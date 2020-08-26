<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    
    public function save()
	{
        $this->load->model('M_Data', 'data');

		$tanggal = date('Y-m-d H:i:s');

        $suhu = $this->input->get('suhu'); // harus sama dengan yg di arduiono IDE

        $rekap = $this->data->ambil_data_terakhir();
        
        if($rekap) // jika ada nilainya ..
        {
            $suhu_sebelumnya = $rekap[0]["suhu"];
            
            $awal  = date_create($rekap[0]['waktu']); // waktu lalu
            $akhir = date_create(); // waktu sekarang
            $diff  = date_diff( $awal, $akhir );
            
            $hari = $diff->d; // dalam hari
            $jam = $diff->h; // dalam jam

            if ($suhu_sebelumnya == $suhu)
            {
                if ($hari >= 1 || $jam >= 1)
                {
                    // Simoan ke database
                    $this->data->save($suhu);
                    $this->jam();
                }
                else
                {
                    $this->jam();
                }
            }
            else
            {
                // Simpan ke database
                $this->data->save($suhu);
                $this->jam();
            }
        }
        else
        {
            $this->data->save($suhu);
            $this->jam();
        }
    }

    public function jam()
    {
        $this->load->model('M_Data', 'data');

        $rumput = $this->data->jam();

        $lama_pengeringan = $rumput[0]['lama_pengeringan'];
        $awal  = date_create($rumput[0]['waktu']); // waktu lalu
        $akhir = date_create(); // waktu sekarang
        $diff  = date_diff( $awal, $akhir );
        
        $jam = $diff->i; // dalam menit , $jam = $diff->H (jam)

        if ($jam >= $lama_pengeringan)
        {
            echo 0;
        }
        else
        {
            echo 1;
        }
    }

    public function update()
    {
        $this->load->model('M_Data', 'data');

        $tanggal = date('Y-m-d H:i:s');
        $ket = $this->input->get('ket');

        $this->data->update($tanggal, $ket);

        echo "Sukses";
    }

}