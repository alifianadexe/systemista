<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kota extends CI_Model
{
	public function select_all()
	{
		$this->db->select('*');
		$this->db->from('kota');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id)
	{
		$sql = "SELECT * FROM kota WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pasien($id)
	{
		$sql = " SELECT pasien.id AS id, pasien.nama AS pasien, pasien.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, klinik.nama AS klinik FROM pasien, kota, kelamin, klinik WHERE pasien.id_kelamin = kelamin.id AND pasien.id_klinik = klinik.id AND pasien.id_kota = kota.id AND pasien.id_kota={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data)
	{
		$sql = "INSERT INTO kota VALUES('','" . $data['kota'] . "')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('kota', $data);

		return $this->db->affected_rows();
	}

	public function update($data)
	{
		$sql = "UPDATE kota SET nama='" . $data['kota'] . "' WHERE id='" . $data['id'] . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM kota WHERE id='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('nama', $nama);
		$data = $this->db->get('kota');

		return $data->num_rows();
	}

	public function total_rows()
	{
		$data = $this->db->get('kota');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */