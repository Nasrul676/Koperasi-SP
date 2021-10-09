<?php 

class Koperasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('anggota_model');
    $this->load->library('session');
  

  
  }

  public function index()
  {
    

    $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();




    $data['sum_anggota'] = $this->anggota_model->get_sum_anggota();
    $data['sum_sukarela'] = $this->anggota_model->get_sum_sukarela();
    $data['sum_wajib'] = $this->anggota_model->get_sum_wajib();
    $data['sum_pinjaman'] = $this->anggota_model->get_sum_pinjaman();
    $data['count_anggota'] = $this->anggota_model->get_count_anggota();
    $data['count_pegawai'] = $this->anggota_model->get_count_pegawai();
    $data['baru_pegawai'] = $this->anggota_model->get_baru_pegawai();
    $data['baru_anggota'] = $this->anggota_model->get_baru_anggota();

    $data['judul'] = 'beranda';
    $this->load->view('templates/header', $data);
    $this->load->view('koperasi/index');
    $this->load->view('templates/footer');
  }







  public function pegawai($offset = 0)
  {
   $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();



   $this->load->model('anggota_model');
   $data['pegawai'] = $this->anggota_model->getallpegawai();
   $data['judul'] = 'Pegawai';
   $this->load->view('templates/header', $data);
   $this->load->view('koperasi/pegawai', $data);
   $this->load->view('templates/footer');
 }




 public function detailpegawai($id){

   $data['judul'] = 'Detail Pegawai';
   $data['pegawai'] = $this->anggota_model->getpegawaiById($id);
   $this->load->view('templates/header', $data);
   $this->load->view('koperasi/detail_pegawai', $data);
   $this->load->view('templates/footer');

 }




 public function pokok(){
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  
  $data['data'] = $this->anggota_model->get_all_pokok();
  $data['judul'] = 'Simpanan Pokok';
  $this->load->view('templates/header', $data);
  $this->load->view('simpanan/pokok', $data);
  $this->load->view('templates/footer');
}







public function form_pokok()
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('simpanan_pokok', 'Jumlah Simpanan Pokok', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'Tambah Simpanan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_pokok', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->tambahsimpanan();
  $this->session->set_flashdata('message','Ditambahkan');
  redirect('koperasi/pokok');
}    
}




public function form_wajib()
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('date_created', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('simpanan_wajib', 'Jumlah Simpanan wajib', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'Tambah Simpanan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_wajib', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->tambahsimpananwajib();
  $this->session->set_flashdata('message','Ditambahkan');
  redirect('koperasi/wajib');
}    
}


public function form_sukarela()
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('date_created', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('simpanan_sukarela', 'Jumlah Simpanan sukarela', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'Tambah Simpanan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_sukarela', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->tambahsimpanansukarela();
  $this->session->set_flashdata('message','Ditambahkan');
  redirect('koperasi/sukarela');
}    
}



public function wajib(){
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  
  $data['data'] = $this->anggota_model->get_all_wajib();
  $data['judul'] = 'Simpanan Wajib';
  $this->load->view('templates/header', $data);
  $this->load->view('simpanan/wajib', $data);
  $this->load->view('templates/footer');
}






public function sukarela(){
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  
  $data['data'] = $this->anggota_model->get_all_sukarela();
  $data['judul'] = 'Simpanan Sukarela';
  $this->load->view('templates/header', $data);
  $this->load->view('simpanan/sukarela', $data);
  $this->load->view('templates/footer');
}







public function anggota()
{ 
 $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();

 if ($this->input->post('keyword')) {
  $data['anggota'] = $this->anggota_model->caridata();
}

$this->load->model('anggota_model');
$data['anggota'] = $this->anggota_model->getallanggota();
$data['judul'] = 'anggota';
$this->load->view('templates/header', $data);
$this->load->view('koperasi/anggota', $data);
$this->load->view('templates/footer');
}



public function tambah(){
 $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();

 $this->form_validation->set_rules('fname', 'Full Name', 'trim|required');
 $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
 $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
 $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');

 if ($this->form_validation->run() == false) {
  $data['judul'] = 'Form Tambah Anggota';
  $this->load->view('templates/header', $data);
  $this->load->view('koperasi/form_anggota');
  $this->load->view('templates/footer');
} else {
  $this->anggota_model->tambahanggota();
  $this->session->set_flashdata('message','Ditambahkan');
  redirect('koperasi/form_wajib');

}

}





public function hapus($id)
{

 $this->anggota_model->hapusdataanggota($id);
 $this->session->set_flashdata('message','Dihapus');
 redirect ('koperasi/anggota');
}


public function hapuspegawai($id)
{

 $this->anggota_model->hapusdatapegawai($id);
 $this->session->set_flashdata('message','Dihapus');
 redirect ('koperasi/pegawai');
}

public function hapuspinjaman($id)
{

 $this->anggota_model->hapusdatapinjaman($id);
 $this->session->set_flashdata('message','Dihapus');
 redirect ('koperasi/pinjaman');
}

public function hapuswajib($id)
{

$this->anggota_model->hapusdatawajib($id);
 $this->session->set_flashdata('message','Dihapus');
 redirect ('koperasi/wajib');
}

public function hapuspokok($id)
{

 $this->anggota_model->hapusdatapokok($id);
 $this->session->set_flashdata('message','Dihapus');
 redirect ('koperasi/pokok');
}
public function hapussukarela($id)
{

 $this->anggota_model->hapusdatasukarela($id);
 $this->session->set_flashdata('message','Dihapus');
 redirect ('koperasi/sukarela');
}

public function edit_wajib($id = null)
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
  $data['simpanan_wajib'] = $this->anggota_model->getsimpananwajib($id);
  $data['status'] = ['Anggota', 'Calon Anggota'];

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('date_created', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('simpanan_wajib', 'Jumlah Simpanan wajib', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'ubah Simpanan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_ubahwajib', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->ubahsimpananwajib();
  $this->session->set_flashdata('message','Diubah');
  redirect('koperasi/wajib', $data);
}    
}


public function pembayaran($id = null)
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
  $data['pinjaman'] = $this->anggota_model->getpinjaman($id);
  $data['status'] = ['Lunas', 'Proses'];

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah Angsuran', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'pembayaran';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_pembayaran', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->ubahpinjaman();
  $this->session->set_flashdata('message','Dibayar');
  redirect('koperasi/pinjaman', $data);
}    
}

public function edit_sukarela($id = null)
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
  $data['simpanan_sukarela'] = $this->anggota_model->getsimpanansukarela($id);
  $data['status'] = ['Anggota', 'Calon Anggota'];

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('date_created', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('simpanan_sukarela', 'Jumlah Simpanan sukarela', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'ubah Simpanan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_ubahsukarela', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->ubahsimpanansukarela();
  $this->session->set_flashdata('message','Diubah');
  redirect('koperasi/sukarela', $data);
}    
}


public function form_penarikan($id = null)
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
  $data['simpanan_sukarela'] = $this->anggota_model->getsimpanansukarela($id);
  $data['status'] = ['Anggota', 'Calon Anggota'];

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('date_created', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('simpanan_sukarela', 'Jumlah Simpanan sukarela', 'trim|required|numeric');
  $this->form_validation->set_rules('jumlah_penarikan', 'Jumlah Penarikan', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'Form Penarikan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_penarikan', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->penarikansukarela();
  $this->session->set_flashdata('message','Ditarik');
  redirect('koperasi/sukarela', $data);
}    
}



public function edit_pokok($id = null)
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
  $data['simpanan_pokok'] = $this->anggota_model->getsimpananpokok($id);
  $data['status'] = ['Anggota', 'Calon Anggota'];

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('date_created', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('simpanan_pokok', 'Jumlah Simpanan pokok', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'ubah Simpanan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_ubahpokok', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->ubahsimpananpokok();
  $this->session->set_flashdata('message','Diubah');
  redirect('koperasi/pokok', $data);
}    
}


public function edit_pinjaman($id = null)
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
  $data['simpanan_pokok'] = $this->anggota_model->getsimpananpokok($id);
  $data['status'] = ['Anggota', 'Calon Anggota'];

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('date_created', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('simpanan_pokok', 'Jumlah Simpanan pokok', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'ubah Simpanan';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_ubahpokok', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->ubahsimpananpokok();
  $this->session->set_flashdata('message','Diubah');
  redirect('koperasi/pokok', $data);
}    
}



public function detail($id){

 $data['judul'] = 'detail';
 $data['anggota'] = $this->anggota_model->getanggotaById($id);
 $this->load->view('templates/header', $data);
 $this->load->view('koperasi/detail', $data);
 $this->load->view('templates/footer');
}



public function pinjaman(){
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  
  $data['data'] = $this->anggota_model->ambil_data_pinjaman();
  $data['judul'] = 'pinjaman';
  $this->load->view('templates/header', $data);
  $this->load->view('koperasi/pinjaman', $data);
  $this->load->view('templates/footer');
}





public function form_pinjaman()
{
  $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

  $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
  $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|numeric');
  $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required|numeric');
  $this->form_validation->set_rules('no_telp', 'No. Telpon', 'trim|required|numeric');
  $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal', 'trim|required');
  $this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah Pinjaman', 'trim|required|numeric');
  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


  if ($this->form_validation->run() == false) {
   $data['judul'] = 'Tambah Pinjaman';
   $this->load->view('templates/header', $data);
   $this->load->view('form/form_pinjaman', $data);
   $this->load->view('templates/footer');

 } else {
  $this->anggota_model->tambahpinjaman();
  $this->session->set_flashdata('message','Ditambahkan');
  redirect('koperasi/pinjaman');
}    
}





public function angsuran()
{
 $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();

 $data['judul'] = 'data angsuran';
 $this->load->view('templates/header', $data);
 $this->load->view('koperasi/angsuran');
 $this->load->view('templates/footer');
}









public function editprofile(){
 $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();

 $this->form_validation->set_rules('fname', 'Nama Lengkap', 'required|trim');

 if($this->form_validation->run() == false){

  $data['judul'] = 'edit Profile';
  $this->load->view('templates/header', $data);
  $this->load->view('koperasi/edit_profile');
  $this->load->view('templates/footer');
}else{
  $name = $this->input->post('fname');
  $email = $this->input->post('email');

  $upload_image = $_FILES['image']['name'];

  if($upload_image){
   $config['allowed_types'] = 'jpg|png|gif';
   $config['max_size'] = '3048';
   $config['upload_path'] = './asset/img/profile/';
   $this->load->library('upload', $config);

   if ($this->upload->do_upload('image')){
    $old_image = $data['user']['image'];
    if($old_image != 'default.jpg'){
     unlink(FCPATH . 'asset/img/profile/' . $old_image);
   }
   $new_image = $this->upload->data('file_name');
   $this->db->set('image', $new_image);
 }else{
  $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ukuran Gambar Terlalu Besar!</div>');
  redirect('koperasi/editprofile');
}
}

$this->db->set('fname', $name);
$this->db->where('email', $email);
$this->db->update('user');

$this->session->set_flashdata('message', 'Di Ubah !');
redirect('koperasi');
}
}

}



