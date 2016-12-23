<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Location extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('location');
    }

    public function down()
    {
        $this->dbforge->drop_table('location');
    }
}
