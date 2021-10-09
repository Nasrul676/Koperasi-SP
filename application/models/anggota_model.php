<?php 

class Anggota_model extends CI_Model
{
	public function getallanggota()
	{
		return $this->db->get('anggota')->result_array();
	}

	public function tambahanggota(){
		$data = [
			"fname" => $this->input->post('fname', true),
			"date_created" => time(),
			"no_ktp" => $this->input->post('no_ktp', true),
			"kelamin" => $this->input->post('kelamin', true),
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('no_telp', true),
			"image" => 'default.jpg'
		];

		$this->db->insert('anggota', $data);
	}
	

	public function hapusdataanggota($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('anggota');
	}

	public function hapusdatapinjaman($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pinjaman');
	}

	public function hapusdatapegawai($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
	public function hapusdatapokok($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('simpanan_anggota');
	}
	public function hapusdatawajib($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('simpanan_wajib');
	}

	public function hapusdatasukarela($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('simpanan_sukarela');
	}

	public function getanggotaById($id)
	{
		return $this->db->get_where('anggota',['id' => $id])->row_array();
	}
	

	public function getallpegawai()
	{
		return $this->db->get('user')->result_array();
	}

	public function getpegawaiById($id)
	{
		return $this->db->get_where('user',['id' => $id])->row_array();
	}

	public function tambahpinjaman(){
		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"tanggal_pinjam" => $this->input->post('tanggal_pinjam',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"jumlah_pinjaman" => $this->input->post('jumlah_pinjaman', true),
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->insert('pinjaman', $data);
	}

	function ambil_data($perpage, $offset){
		return $this->db->get("simpanan_anggota", $perpage, $offset)->result();
	}

	function ambil_datapgw($perpage, $offset){
		return $this->db->get("user", $perpage, $offset)->result();
	}


	function ambil_data_sukarela($perpage, $offset){
		return $this->db->get("simpanan_sukarela", $perpage, $offset)->result();
	}
	

	public function ambil_data_pinjaman(){
		$query = $this->db->get('pinjaman');
		return $query->result();
	}


	public function tambahsimpanan(){
		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"date_created" => $this->input->post('date_created',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"simpanan_pokok" => $this->input->post('simpanan_pokok', true),
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->insert('simpanan_anggota', $data);
	}


	public function tambahsimpananwajib(){
		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"date_created" => $this->input->post('date_created',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"simpanan_wajib" => $this->input->post('simpanan_wajib', true),
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->insert('simpanan_wajib', $data);
	}
	public function getsimpananpokok($id)
	{
		return $this->db->get_where('simpanan_anggota',['id' => $id])->row_array();
	}

	public function getpinjaman($id)
	{
		return $this->db->get_where('pinjaman',['id' => $id])->row_array();
	}

	public function tambahsimpanansukarela(){
		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"date_created" => $this->input->post('date_created',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"simpanan_sukarela" => $this->input->post('simpanan_sukarela', true),
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->insert('simpanan_sukarela', $data);
	}
	public function ambilpinjaman($id){
		return $this->db->get_where('pinjaman', ['id' => $id])->row_array();
	}
	public function ubahpinjaman(){

		$data['jumlah_pinjaman']=(int)$this->input->post('jumlah_pinjaman',true);
		$data['angsuran']=(int)$this->input->post('angsuran',true);
		$data['hasil']=$data['jumlah_pinjaman']-$data['angsuran'];

		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"tanggal_pinjam" => $this->input->post('tanggal_pinjam',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"jumlah_pinjaman" => $this->input->$data['hasil']=$data['jumlah_pinjaman']-$data['angsuran'],	
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('pinjaman', $data);
	}
	public function getsimpananwajib($id){
		return $this->db->get_where('simpanan_wajib', ['id' => $id])->row_array();
	}

	public function ubahsimpananwajib(){

		$data['simpanan_wajib']=(int)$this->input->post('simpanan_wajib',true);
		$data['simpanan_wajib_selanjutnya']=(int)$this->input->post('simpanan_wajib_selanjutnya',true);
		$data['hasil']=$data['simpanan_wajib']+$data['simpanan_wajib_selanjutnya'];

		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"date_created" => $this->input->post('date_created',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"simpanan_wajib" => $this->input->$data['hasil']=$data['simpanan_wajib']+$data['simpanan_wajib_selanjutnya'],	
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('simpanan_wajib', $data);
	}


	public function getsimpanansukarela($id){
		return $this->db->get_where('simpanan_sukarela', ['id' => $id])->row_array();
	}


	public function ubahsimpanansukarela(){
		$data['simpanan_sukarela']=(int)$this->input->post('simpanan_sukarela',true);
		$data['simpanan_sukarela_selanjutnya']=(int)$this->input->post('simpanan_sukarela_selanjutnya',true);
		$data['hasil']=$data['simpanan_sukarela']+$data['simpanan_sukarela_selanjutnya'];

		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"date_created" => $this->input->post('date_created',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"simpanan_sukarela" => $this->input->$data['hasil']=$data['simpanan_sukarela']+$data['simpanan_sukarela_selanjutnya'],
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('simpanan_sukarela', $data);
	}


	public function penarikansukarela(){
		$data['simpanan_sukarela']=(int)$this->input->post('simpanan_sukarela',true);
		$data['jumlah_penarikan']=(int)$this->input->post('jumlah_penarikan',true);
		$data['hasil']=$data['simpanan_sukarela']+$data['jumlah_penarikan'];

		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"date_created" => $this->input->post('date_created',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"simpanan_sukarela" => $this->input->$data['hasil']=$data['simpanan_sukarela']-$data['jumlah_penarikan'],
			"alamat" => $this->input->post('alamat', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('simpanan_sukarela', $data);
	}


	public function ubahsimpananpokok(){
		$data = [
			"nama_anggota" => $this->input->post('nama_anggota', true),
			"date_created" => $this->input->post('date_created',true),
			"no_ktp" => $this->input->post('no_ktp', true),
			"no_kk" => $this->input->post('no_kk', true),
			"no_telp" => $this->input->post('no_telp', true),
			"simpanan_pokok" => $this->input->post('simpanan_pokok', true),
			"alamat" => $this->input->post('alamat', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('simpanan_anggota', $data);
	}

	public function get_sum_anggota(){
		$sql = "SELECT sum(simpanan_pokok) as simpanan_pokok FROM simpanan_anggota";
		$result = $this->db->query($sql);
		return $result->row()->simpanan_pokok;	 
	}

	public function get_sum_sukarela(){
		$sql = "SELECT sum(simpanan_sukarela) as simpanan_sukarela FROM simpanan_sukarela";
		$result = $this->db->query($sql);
		return $result->row()->simpanan_sukarela;	 
	}

	public function get_sum_wajib(){
		$sql = "SELECT sum(simpanan_wajib) as simpanan_wajib FROM simpanan_wajib";
		$result = $this->db->query($sql);
		return $result->row()->simpanan_wajib;	 
	}

	public function get_sum_pinjaman(){
		$sql = "SELECT sum(jumlah_pinjaman) as jumlah_pinjaman FROM pinjaman";
		$result = $this->db->query($sql);
		return $result->row()->jumlah_pinjaman;	 
	}

	public function get_count_anggota(){
		$sql = "SELECT count(fname) as fname FROM anggota";
		$result = $this->db->query($sql);
		return $result->row()->fname;	 
	}

	public function get_count_pegawai(){
		$sql = "SELECT count(fname) as fname FROM user";
		$result = $this->db->query($sql);
		return $result->row()->fname;	 
	}
	public function get_baru_pegawai(){
		$sql = "SELECT (fname) as fname FROM user order by id DESC LIMIT 1";
		$result = $this->db->query($sql);
		return $result->row()->fname;	 
	}

	public function get_baru_anggota(){
		$sql = "SELECT (fname) as fname FROM anggota order by id DESC LIMIT 1";
		$result = $this->db->query($sql);
		return $result->row()->fname;	 
	}

	public function get_all_wajib(){
		$query = $this->db->order_by('status', 'DESC')->get('simpanan_wajib');
		return $query->result();
	}


	public function get_all_pokok(){
		$query = $this->db->get('simpanan_anggota');
		return $query->result();
	}

	public function get_all_sukarela(){
		$query = $this->db->get('simpanan_sukarela');
		return $query->result();
	}

} 



