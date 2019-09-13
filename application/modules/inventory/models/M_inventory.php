<?php
/**
 * Name:    Inventory Model
 * Author:  Fadhel Widya Rakhman
 *           fadhelwr@gmail.com
 * @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon (Ion Auth)
 *
 * Created:  24.07.2019
 *
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-Ion-Auth with HMVC
 * @author     Dhelright
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Ion Auth Model
 * @property Ion_auth $ion_auth The Ion_auth library
 */
class M_inventory extends CI_Model
{

    var $tb_inventory = "inventory";

    function __construct(){

		parent::__construct();
    }
    
    function get_all(){
        return $this->db->get($this->tb_inventory);
    }

    function insert_new($data){
        return $this->db->insert($this->tb_inventory, $data);
    }

    function update_item($data, $where){
        $this->db->where($where);
        $this->db->update($this->tb_inventory, $data);
        return TRUE;
    }

    function delete_item($where){
        $this->db->where($where);
        $this->db->delete($this->tb_inventory);
        return TRUE;
    }
}