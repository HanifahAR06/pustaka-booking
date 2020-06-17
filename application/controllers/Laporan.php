<?php 
defined('BASEPATH') or exit('No Direct script access allowed'); 
class Laporan extends CI_Controller 
{ 
  function __construct() 
  { 
    parent::__construct(); 
    $this->load->model(['ModelUser', 'ModelBuku', 'ModelPinjam']); 
  } 
  public function laporan_buku() 
  { 
    $data['judul'] = 'Laporan Data Buku'; 
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
    $data['buku'] = $this->ModelBuku->getBuku()->result_array(); 
    $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
     
    $this->load->view('templates/header', $data); 
    $this->load->view('templates/sidebar', $data); 
    $this->load->view('templates/topbar', $data); 
    $this->load->view('buku/laporan_buku', $data); 
    $this->load->view('templates/footer'); 
  }
public function cetak_laporan_buku() 
  { 
    $data['buku'] = $this->ModelBuku->getBuku()->result_array(); 
    $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
    
    $this->load->view('buku/laporan_print_buku', $data);


}
public function laporan_buku_pdf() 
{ 
  $this->load->library('dompdf_gen');
$data['buku'] = $this->ModelBuku->getBuku()->result_array();

$this->load->library('dompdf_gen');
$this->load->view('buku/laporan_pdf_buku.php', $data); $paper_size = 'A4'; // ukuran kertas 
$orientation = 'landscape'; //tipe format kertas potrait atau landscape 
$this->dompdf->set_paper($paper_size, $orientation); 
//Convert to PDF 
$this->pdf->filename = "laporan_data_buku.pdf";
//nama file pdf yang di hasilkan}
$this->dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
}


public function export_excel() 
{ 
$data = array('title' => 'Laporan Buku','buku' => $this->ModelBuku->getBuku()->result_array());
$this->load->view('buku/export_excel_buku', $data);
 
}
  public function laporan_anggota() 
  { 
    $data['judul'] = 'Laporan anggota'; 
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
    $data['buku'] = $this->ModelBuku->getBuku()->result_array(); 
    $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
     
    $this->load->view('templates/header', $data); 
    $this->load->view('templates/sidebar', $data); 
    $this->load->view('templates/topbar', $data); 
    $this->load->view('anggota/laporan_anggota', $data); 
    $this->load->view('templates/footer'); 
  }
}
