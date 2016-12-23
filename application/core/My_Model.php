<?php
/**
 * BaseModel
 */
class MY_Model extends CI_Model
{
    protected $table = '';
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Insert record
     * @return insert_id
     */
    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Update record
     * @param int   $id The id to be updated
     * @param array $data The updated data
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete record using deleted_at
     * @param array $data The updated data
     */
    public function delete($data)
    {
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Find all results
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @return array
     */
    public function find_all($order_by = array())
    {
        if (empty($this->table)) {
            return array();
        }

        $this->db->select('*');
        $this->db->from($this->table.' t');
        foreach ($order_by as $field => $sort) {
            $this->db->order_by($field, strtoupper($sort));
        }

        return $this->db->get()->result();
    }
}
