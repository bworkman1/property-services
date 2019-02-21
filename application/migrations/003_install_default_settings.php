<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_default_settings extends CI_Migration {

    private $NewGroups;
    private $Type;

    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {
        $this->Type = 'Updated';

        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 9,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'unique' => TRUE,
            ),
            'value' => array(
                'type' =>'VARCHAR',
                'constraint' => '255',
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_field("`added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");

        $this->dbforge->add_key(['id', 'name']);

        $this->dbforge->create_table('settings', TRUE);

        $data = [
            ['name' => 'login_page_image', 'value' => 'assets/images/uploads/admin/default-login-image.jpg'],
            ['name' => 'login_with_facebook', 'value' => '0'],
            ['name' => 'login_with_google', 'value' => '0']
        ];
        $this->db->insert_batch('settings', $data);

        $this->setUpgradeData();
    }

    public function down()
    {
        $this->Type = 'Removed';

        $this->dbforge->drop_table('settings', TRUE);

        $this->setUpgradeData();
    }

    private function setUpgradeData()
    {
        $classNameArray = explode('_', get_class($this));

        unset($classNameArray[0]);

        $previousChange = $this->session->userdata('changed');
        $changed = $previousChange . '<h3>' . $this->Type . ' ' . ucwords(implode(' ', $classNameArray)) . '</h3>';
        $this->session->set_userdata('changed', $changed);
    }
}