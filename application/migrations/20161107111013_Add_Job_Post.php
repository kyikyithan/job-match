<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Job_Post extends CI_Migration
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
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => false,
            ),
            'location' => array(
                'type' => 'INT',
                'constraint' => '5',
                'null' => false,
            ),
            'industry' => array(
                'type' => 'INT',
                'null' => false,
                'constraint' => '5',
            ),
            'responsibilities' => array(
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '1000',
            ),
            'requirement' => array(
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '1000',
            ),
            'other_information' => array(
                'type' => 'VARCHAR',
                'null' => TRUE,
                'constraint' => '1000',
            ),
            'user_id' => array(
                'type' => 'INT',
                'null' => true,
                'constraint' => '5',
            ),
            'update_date' => array(
                'type' => 'date',
                'null' => true,
            ),
            'apply_method' => array(
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '400',
            ),
            'img_loc' => array(
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '50',
            ),
            'job_function' => array(
                'type' => 'INT',
                'null' => true,
                'constraint' => '10',
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('job_post');
    }

    public function down()
    {
        $this->dbforge->drop_table('job_post');
    }
}
