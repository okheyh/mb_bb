<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_barang');
    }

    public function index()
    {
        $data['pageTitle'] = 'Data Barang';
        $data['barang'] = $this->m_barang->get_barang()->result();
        $data['pageContent'] = $this->load->view('v_barang', $data, TRUE);

        $this->load->view('template/layout', $data);
    }


    public function insert() 
    {

        if ($this->input->post('submit')) {
            $this->db->trans_start();
            if (!empty($_FILES['foto_barang']['name'])) {
                // Konfigurasi library upload codeigniter
                $config['upload_path'] = './assets/img/foto_barang';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2000;
                $config['width'] = 600;
                $config['height'] = 400;
                $config['file_name'] = '';

                // Load library upload
                $this->load->library('upload', $config);

                // Jika terdapat error pada proses upload maka exit
                if (!$this->upload->do_upload('foto_barang')) {
                    exit($this->upload->display_errors());
                } else {
                    $foto = $this->upload->data()['file_name'];
                }

                $data = array(
                    'id_barang'                         => $this->input->post(''),                        
                    'nama_barang'                       => $this->input->post('nama_barang'),
                    'nama_produsen'                     => $this->input->post('nama_produsen'),
                    'kemasan'                           => $this->input->post('kemasan'),
                    'bentuk_sediaan'                    => $this->input->post('bentuk_sediaan'),
                    'no_pendaftaran'                    => $this->input->post('no_pendaftaran'),
                    'no_batch'                          => $this->input->post('no_batch'),
                    'kadaluarsa'                        => $this->input->post('kadaluarsa'),
                    'kelompok_produk'                   => $this->input->post('kelompok_produk'),
                    'jml_satuan_terkecil'               => $this->input->post('jml_satuan_terkecil'),
                    'taksiran_nilai_satuan'             => $this->input->post('taksiran_nilai_satuan'),
                    'taksiran_nilai_produk'             => $this->input->post('taksiran_nilai_produk'),
                    'justifikasi_penyitaan'             => $this->input->post('justifikasi_penyitaan'),
                    'ket'                               => $this->input->post('ket'),
                    'foto_barang'                       => $foto                
                );

                $this->m_barang->insert($data);
                $id_barang = $this->db->insert_id();
                $this->db->trans_complete();
                    // cek jika query berhasil
            }
            if ($this->db->trans_status() === true)  {
                $this->db->trans_commit();
                $message = array('status' => true, 'message' => 'Data Barang telah ditambahkan');
            }
            else {
                $this->db->trans_rollback();
                $message = array('status' => true, 'message' => 'Data Barang gagal ditambahkan');
            }

                // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

                // refresh page
            redirect('barang', 'refresh');
        }
    }

    //FUNCTION UPDATE DATA Barang

    public function update($id = null)
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $data = array(                       
                'id_pangkat'     => $this->input->post('id_pangkat'),
                'id_jabatan'     => $this->input->post('id_jabatan'),
                'nip'            => $this->input->post('nip'),
                'nama_barang'   => $this->input->post('nama_barang')                
            );

            // Jalankan function update pada model

            $query = $this->Model_Barang->update($id, $data);


            // cek jika query berhasil
            if ($this->db->trans_status() === true)  {
                $this->db->trans_commit();
                $message = array('status' => true, 'message' => 'Data Barang telah diupdate');
            }
            else {
                $this->db->trans_rollback();
                $message = array('status' => true, 'message' => 'Data Barang gagal diupdate');
            }

            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // print_r($data);die;

            // refresh page
            redirect('barang', 'refresh');
        }    
    }


    //FUNCTION DELETE DATA Barang

    public function delete($id = null)
    {
            $Barang = $this->Model_Barang->get_Barang_byId($id);

            if (!$Barang) show_404();

            $query = $this->Model_Barang->delete($id);

            
            // cek jika query berhasil
            if ($this->db->trans_status() === true)  {
                $this->db->trans_commit();
                $message = array('status' => true, 'message' => 'Data Barang telah dihapus');
            }
            else {
                $this->db->trans_rollback();
                $message = array('status' => true, 'message' => 'Data Barang gagal dihapus');
            }

            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            redirect('barang', 'refresh');
    }

}