<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => false,
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => false,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '40',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '20',
            ),
            'type' => array(
                'type' => 'INT',
                'null' => true,
                'constraint' => '11',
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '500',
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('user');
    }

    public function down()
    {
        $this->dbforge->drop_table('user');
    }
}
