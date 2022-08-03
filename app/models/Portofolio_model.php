<?php

class Portofolio_model
{
    private $table = 'tb_portofolio';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getPortofolio()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPortofolioById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
