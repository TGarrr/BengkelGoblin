<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSparepart extends CI_Model
{
    //manajemen sparepart
    public function getSparepart()
    {
        return $this->db->get('sparepart');
    }

    public function SparepartWhere($where)
    {
        return $this->db->get_where('sparepart', $where);
    }

    public function simpanSparepart($data = null)
    {
        $this->db->insert('sparepart', $data);
    }

    public function updateSparepart($data = null, $where = null)
    {
        $this->db->update('sparepart', $data, $where);
    }

    public function hapusSparepart($where = null)
    {
        $this->db->delete('sparepart', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('sparepart');
        return $this->db->get()->row($field);
    }

    //manajemen kategori
    // public function getKategori()
    // {
    //     return $this->db->get('kategori');
    // }

    // public function kategoriWhere($where)
    // {
    //     return $this->db->get_where('kategori', $where);
    // }

    // public function simpanKategori($data = null)
    // {
    //     $this->db->insert('kategori', $data);
    // }

    // public function hapusKategori($where = null)
    // {
    //     $this->db->delete('kategori', $where);
    // }

    // public function updateKategori($where = null, $data = null)
    // {
    //     $this->db->update('kategori', $data, $where);
    // }

    //join
    // public function joinKategorisparepart($where)
    // {
    //     $this->db->select('sparepart.id_kategori,kategori.kategori');
    //     $this->db->from('sparepart');
    //     $this->db->join('kategori', 'kategori.id = sparepart.id_kategori');
    //     $this->db->where($where);
    //     return $this->db->get();
    // }
}
