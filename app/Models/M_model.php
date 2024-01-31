<?php namespace App\Models;

use CodeIgniter\Model;

class M_model extends Model
{
	public function tampil($table){
		return $this->db->table($table)->get()->getResult();
	}

	public function hapus($table, $where){
		return $this->db->table($table)->delete($where);
	}

	public function simpan($table, $data){
		return $this->db->table($table)->insert($data);
	}

	public function getWhere($table, $where){
		return $this->db->table($table)->getWhere($where)->getRow();
	}

	public function qedit($table, $data, $where){
		return $this->db->table($table)->update($data, $where);
	}

	public function join($table, $table2, $on)
	{
		return $this->db->table($table)->join($table2, $on)->get()->getResult();
	}

	public function join2($table1, $table2, $on){
		return $this->db->table($table1)->join($table2, $on, 'left')->get()->getResult();
	}

	public function getWhere2($table, $where){
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}
    
	public function join3($table1, $table2,$table3, $on,$on1,$where){
		return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on1, 'left')->getWhere($where)->getResult();
	}

	public function join4($table1, $table2, $table3, $on, $on2)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->get()->getResult();
	}
}