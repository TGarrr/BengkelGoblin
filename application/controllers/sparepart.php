<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sparepart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    //manajemen sparepart
    public function index()
    {
        $data['judul'] = 'Data Sparepart';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['sparepart'] = $this->ModelSparepart->getSparepart()->result_array();
        // $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->form_validation->set_rules('kode', 'Kode Barang', 'required|min_length[3]', [
            'required' => 'Kode Barang harus diisi',
            'min_length' => 'Kode Barang terlalu pendek'
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'Nama Barang harus diisi',
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
            'required' => 'Stok harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('H_modal', 'H_modal', 'required|numeric', [
            'required' => 'Harga Modal harus diisi',
        ]);
        $this->form_validation->set_rules('H_jual', 'H_jual', 'required|numeric', [
            'required' => 'Harga Jual harus diisi',
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sparepart/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'kode' => $this->input->post('kode', true),
                'nama_barang' => $this->input->post('nama_barang', true),
                'stok' => $this->input->post('stok', true),
                'H_modal' => $this->input->post('H_modal', true),
                'H_jual' => $this->input->post('H_jual', true),
                'image' => $gambar
            ];

            $this->ModelSparepart->simpanSparepart($data);
            redirect('sparepart');
        }
    }

    public function hapusSparepart()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelSparepart->hapusSparepart($where);
        redirect('sparepart');
    }

    public function ubahSparepart()
    {
        $data['judul'] = 'Ubah Data sparepart';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['sparepart'] = $this->ModelSparepart->SparepartWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('kode', 'Kode Barang', 'required|min_length[3]', [
            'required' => 'Kode Barang harus diisi',
            'min_length' => 'Kode Barang terlalu pendek'
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'Nama Barang harus diisi',
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
            'required' => 'Stok harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('H_modal', 'H_modal', 'required|numeric', [
            'required' => 'Harga Modal harus diisi',
        ]);
        $this->form_validation->set_rules('H_jual', 'H_jual', 'required|numeric', [
            'required' => 'Harga Jual harus diisi',
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sparepart/ubah_sparepart', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }

            $data = [
                'kode' => $this->input->post('kode', true),
                'nama_barang' => $this->input->post('nama_barang', true),
                'stok' => $this->input->post('stok', true),
                'H_modal' => $this->input->post('H_modal', true),
                'H_jual' => $this->input->post('H_jual', true),
                'image' => $gambar
            ];

            $this->ModelSparepart->updateSparepart($data, ['id' => $this->input->post('id')]);
            redirect('sparepart');
        }
    }

    // //manajemen kategori
    // public function kategori()
    // {
    //     $data['judul'] = 'Kategori Buku';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

    //     $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
    //         'required' => 'Judul Buku harus diisi'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('buku/kategori', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $data = [
    //             'kategori' => $this->input->post('kategori', TRUE)
    //         ];

    //         $this->ModelBuku->simpanKategori($data);
    //         redirect('buku/kategori');
    //     }
    // }

    // public function ubahKategori()
    // {
    //     $data['judul'] = 'Ubah Data Kategori';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     $data['kategori'] = $this->ModelBuku->kategoriWhere(['id' => $this->uri->segment(3)])->result_array();


    //     $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|min_length[3]', [
    //         'required' => 'Nama Kategori harus diisi',
    //         'min_length' => 'Nama Kategori terlalu pendek'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('buku/ubah_kategori', $data);
    //         $this->load->view('templates/footer');
    //     } else {

    //         $data = [
    //             'kategori' => $this->input->post('kategori', true)
    //         ];

    //         $this->ModelBuku->updateKategori(['id' => $this->input->post('id')], $data);
    //         redirect('buku/kategori');
    //     }
    // }

    // public function hapusKategori()
    // {
    //     $where = ['id' => $this->uri->segment(3)];
    //     $this->ModelBuku->hapusKategori($where);
    //     redirect('buku/kategori');
    // }
}
