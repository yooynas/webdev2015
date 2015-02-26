<?php
class MY_Model extends CI_Model {
    public $table_name = '';
    public $primary_key = '';
    public $table_order = '';
    public $filter = 'intval';
    
    function __construct() {
        parent::__construct();
    }
    public function get($ids = FALSE) {
        // drapeau unique ou multiple
        $unique = $ids === FALSE || is_array($ids) ? FALSE : TRUE;
        
        // Test si un ou plusieur id
        if ($ids !== FALSE) {
            is_array($ids) || $ids = array($ids);
            // protection pour les injections
            $filterIds = $this->filter;
            // Application du filtre
            $ids = array_map($filterIds,$ids);

            $this->db->where_in($this->primary_key, $ids);
        }
        $unique === FALSE || $this->db->limit(1);
        $method = $unique ? 'row_array' : 'result_array';
        return $this->db->get($this->table_name)->$method();
    }
    public function get_by($key, $val = FALSE, $orwhere = FALSE, $unique = FALSE) {
        if(!is_array($key)) {
            $this->db->where(htmlentities($key), htmlentities($val));
        } else {
            $key = array_map('htmlentities', $key);
            $where_method = $orwhere === TRUE ? 'or_where' : 'where';
            $this->db->$where_method($key);
        }
        $unique === FALSE || $this->db->limit(1);
        $method = $unique ? 'row_array' : 'result_array';
        
        return $this->db->get($this->table_name)->$method();
    }
    public function get_key_value($key_field, $value_field, $ids=FALSE) {
        $this->db->select($key_field.','.$value_field);
        $result = $this->get($ids);
        $data = array();
        if (count($result) > 0) {
            if($ids != FALSE && !is_array($ids)) {
                $result = array($result);
            }
            foreach($result as $row) {
                $data[$row[$key_field]] = $row[$value_field];
            }
        }
        return $data;
    }
    public function get_assoc($ids = FALSE) {
        $result = $this->get($ids);
        if($ids != FALSE && !is_array($ids)) {
            $results = array($result);
        }
        $data = $this->to_assoc($result);
        return $data;
    }
    public function to_assoc($result = array()) {
        $data = array();
        if(count($result) > 0) {
            foreach($result as $row) {
                $tmp = array_values(array_slice($row,0,1));
                $data[$tmp[0]] = $row;
            }
        }
        return $data;
    }
    public function save($data,$id = FALSE) {
        if ($id === FALSE) {
            //insertion
            $this->db->set($data)->insert($this->table_name);
        } else {
            //mise à jour
            $filter = $this->filter;
            $this->db->set($data)->where($this->primary_key, $filter($id))->update($this->table_name);
        }
        
        return $id === FALSE ? $this->db->insert_id() : $id;
    }
    public function delete($ids) {
        $filter = $this->filter;
        $ids = !is_array($ids) ? array($ids) : $ids;
        foreach ($ids as $id) {
            $id = $filter($id);
            if ($id) {
                $this->db->where($this->primary_key, $id)->limit(1)->delete($this->table_name);
            }
            
        }
    }
    public function delete_by($key,$value) {
        if(empty($key)) {
            return FALSE;
        }
        $this->db->where(htmlentities($key),htmlentities($value))->delete($this->table_name);
    }
    public function count() {
        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }
}
?>