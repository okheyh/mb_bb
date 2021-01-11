<?php
class M_barang extends CI_Model {
    public $barang = 'barang';


    public function __construct()
    {
        $this->load->database();

    }

    //AMBIL DATA barang
    public function get_barang()
    {
        
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();

        return $query;
    }


    //AMBIL DATA barang BERDASARKAN ID barang
    public function get_barang_byId($id)
    {
        $query = $this->db->get_where('barang', array('id_barang' => $id))->row();

        // Return hasil query
        return $query;

    }

    //INSERT DATA barang DALAM DATABASE
    public function insert($data)
    {
        // Jalankan query
        $query = $this->db->insert($this->barang, $data);

        // Return hasil query
        // return $query;
    }


    //UPDATE DATA barang DALAM DATABASE
    public function update($id, $data)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_barang', $id)
        ->update($this->barang, $data);
        
        // Return hasil query
        return $query;
    }


    //DELETE DATA barang DALAM DATABASE
    public function delete($id)
    {
        // Jalankan query
        $query = $this->db
        ->where('id_barang', $id)
        ->delete($this->barang);
        
        // Return hasil query
        return $query;
    }           
}