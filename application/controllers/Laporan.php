<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
    }
    public function laporan_buku()
    {
        $data['judul'] = 'Laporan Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/laporan_buku', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_buku()
    {
        // Mengambil data buku dari ModelBuku dan mengonversinya menjadi array
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();

        // Mengambil data kategori dari ModelBuku dan mengonversinya menjadi array
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        // Memuat view dengan nama 'buku/laporan_print_buku' dan mengirimkan data yang telah diambil
        $this->load->view('buku/laporan_print_buku', $data);
    }
}
