<?php

class Dosen_model extends CI_Model {
    public function getAllDosen()
    {
        // //menggunakan cara pertama
        // $query = $this->db->get('mahasiswa');
        // return &query->result_array();

        // menggunakan cara cepat methode chaining
        return  $this->db->get('dosen')->result_array();
    }

    public function tambahDataDosen()
    {
        $data = [
            // "nama" => htmlspecialchars($_POST["nama"]), jika tdk mengunakan CI
            // //atau cara lain
            "nip" => $this->input->post('nip', true),
            "namadosen" => $this->input->post('namadosen', true),
        ];
        $this->db->insert('dosen', $data);
    }

    public function hapusDataDosen($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('dosen');
        // jika ingin mejadikan 1 baris saja $this->db->delete('dosen' ['id' => $id ]);
    }

    public function getDosenById($id)
    {
        return $this->db->get_where('dosen', ['id' => $id])->row_array();
        
    }

    public function ubahDataDosen()
    {
        $data = [
            // "nama" => htmlspecialchars($_POST["nama"]), jika tdk mengunakan CI
            // //atau cara lain
            "nip" => $this->input->post('nip', true),
            "namadosen" => $this->input->post('namadosen', true),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('dosen', $data);
    }

    public function cariDataDosen()
    {
        $keyword = $this->input->post('keyword', true);
        // query builder-->looking for simular data untuk mencari data yang sama
        $this->db->like('namadosen', $keyword);
        $this->db->or_like('nip', $keyword);
        $this->db->or_like('id', $keyword);
        return $this->db->get('dosen')->result_array();

    }
}