<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pasien extends CI_Model
{
	public function select_all_pasien()
	{
		$sql = "SELECT * FROM pasien";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all()
	{
		$sql = " SELECT pasien.id AS id, pasien.nama AS pasien, pasien.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, klinik.nama AS klinik FROM pasien, kota, kelamin, klinik WHERE pasien.id_kelamin = kelamin.id AND pasien.id_klinik = klinik.id AND pasien.id_kota = kota.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id)
	{
		$sql = "SELECT pasien.id AS id_pasien, pasien.nama AS nama_pasien, pasien.id_kota, pasien.id_kelamin, pasien.id_klinik, pasien.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, klinik.nama AS klinik FROM pasien, kota, kelamin, klinik WHERE pasien.id_kota = kota.id AND pasien.id_kelamin = kelamin.id AND pasien.id_klinik = klinik.id AND pasien.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_klinik($id)
	{
		$sql = "SELECT COUNT(*) AS jml FROM pasien WHERE id_klinik = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id)
	{
		$sql = "SELECT COUNT(*) AS jml FROM pasien WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data)
	{
		$sql = "UPDATE pasien SET nama='" . $data['nama'] . "', telp='" . $data['telp'] . "', id_kota=" . $data['kota'] . ", id_kelamin=" . $data['jk'] . ", id_klinik=" . $data['klinik'] . " WHERE id='" . $data['id'] . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM pasien WHERE id='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data)
	{
		$id = md5(DATE('ymdhms') . rand());
		$sql = "INSERT INTO pasien VALUES('{$id}','" . $data['nama'] . "','" . $data['telp'] . "'," . $data['kota'] . "," . $data['jk'] . "," . $data['klinik'] . ",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('pasien', $data);

		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('nama', $nama);
		$data = $this->db->get('pasien');

		return $data->num_rows();
	}

	public function total_rows()
	{
		$data = $this->db->get('pasien');

		return $data->num_rows();
	}
}

/* End of file M_pasien.php */
/* Location: ./application/models/M_pasien.php */