<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
	public function total_siswa()
    {
        return $this->db->table('students')->countAll();
    }
    public function total_admin()
    {
        return $this->db->table('admin')->countAll();
    }

    public function total_percakapan()
    {
        return $this->db->table('chat')->countAll();
    }
    public function total_guru()
    {
        return $this->db->table('guru')->countAll();
    }
    public function get_siswa()
    {
        return $this->db->table('students')->get()->getResultArray();
    }
    public function TopIntent()
    {
        $query = $this->query('select DISTINCT intent, count(1) from chat_bot group by intent order BY COUNT(1) DESC LIMIT 5' );
        return $query->getResultArray();

    }
}
