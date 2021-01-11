<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
    {
           parent::__construct();
          // $this->cekLogin();
           $this->load->library('form_validation');
           $this->load->model('Model_pegawai');
           $this->load->model('Model_pangkat');
           $this->load->model('Model_jabatan');
    }


    //HALAMAN YANG PERTAMA KALI DI LOAD SAAT CONTROLLER DI AKSES

   public function index()
   {
            $data['pageTitle'] = 'Data Pegawai';
            $data['pangkat'] = $this->Model_pangkat->get_pangkat()->result();
            $data['jabatan'] = $this->Model_jabatan->get_jabatan()->result();      
            $data['pegawai'] = $this->Model_pegawai->get_pegawai()->result();
            $data['pageContent'] = $this->load->view('data_pegawai', $data, TRUE);

            $this->load->view('template/layout', $data);
    }


    public function insert() 
    {

           if ($this->input->post('submit')) {

                    $data = array(
                        'id_pegawai'     => $this->input->post(''),                        
                        'id_pangkat'     => $this->input->post('id_pangkat'),
                        'id_jabatan'     => $this->input->post('id_jabatan'),
                        'nip'            => $this->input->post('nip'),
                        'nama_pegawai'   => $this->input->post('nama_pegawai')                
                    );


                    $this->Model_pegawai->insert($data);
                    $id_pegawai = $this->db->insert_id();

                        // cek jika query berhasil
                    if ($this->db->trans_status() === true)  {
                        $this->db->trans_commit();
                        $message = array('status' => true, 'message' => 'Data pegawai telah ditambahkan');
                    }
                    else {
                        $this->db->trans_rollback();
                        $message = array('status' => true, 'message' => 'Data pegawai gagal ditambahkan');
                    }

                        // simpan message sebagai session
                    $this->session->set_flashdata('message', $message);

                        // refresh page
                    redirect('pegawai', 'refresh');
            }
    }


    //FUNCTION UPDATE DATA PEGAWAI

    public function update($id = null)
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $data = array(                       
                'id_pangkat'     => $this->input->post('id_pangkat'),
                'id_jabatan'     => $this->input->post('id_jabatan'),
                'nip'            => $this->input->post('nip'),
                'nama_pegawai'   => $this->input->post('nama_pegawai')                
            );

            // Jalankan function update pada model

            $query = $this->Model_pegawai->update($id, $data);


            // cek jika query berhasil
            if ($this->db->trans_status() === true)  {
                $this->db->trans_commit();
                $message = array('status' => true, 'message' => 'Data pegawai telah diupdate');
            }
            else {
                $this->db->trans_rollback();
                $message = array('status' => true, 'message' => 'Data pegawai gagal diupdate');
            }

            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            // print_r($data);die;

            // refresh page
            redirect('pegawai', 'refresh');
        }    
    }


    //FUNCTION DELETE DATA PEGAWAI

    public function delete($id = null)
    {
            $pegawai = $this->Model_pegawai->get_pegawai_byId($id);

            if (!$pegawai) show_404();

            $query = $this->Model_pegawai->delete($id);

            
            // cek jika query berhasil
            if ($this->db->trans_status() === true)  {
                $this->db->trans_commit();
                $message = array('status' => true, 'message' => 'Data pegawai telah dihapus');
            }
            else {
                $this->db->trans_rollback();
                $message = array('status' => true, 'message' => 'Data pegawai gagal dihapus');
            }

            // simpan message sebagai session
            $this->session->set_flashdata('message', $message);

            redirect('pegawai', 'refresh');
    }

}