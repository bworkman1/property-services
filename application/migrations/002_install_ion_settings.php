<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_ion_settings extends CI_Migration {

    private $NewGroups;
    private $Type;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');

        $this->NewGroups = [
            'customer' => 'This will be the default group that users are added to from the website',
            'employee' => 'This group will be where employees are added and allows them access to parts of the app'
        ];
    }

    public function up()
    {
        $this->Type = 'Updated';

        // CREATE NEW GROUPS
        foreach($this->NewGroups as $name => $desc) {
            $this->ion_auth->create_group($name, $desc);
        }

        // REMOVE DEFAULT GENERATED GROUP (members)
        @$this->ion_auth->delete_group(2);

        $this->setUpgradeData();
    }

    public function down()
    {
        $this->Type = 'Removed';

        // REMOVE NEW GROUPS
        $groups = $this->ion_auth->groups()->result();
        foreach($groups as $group) {
            if(array_key_exists($group->name, $this->NewGroups)) {
                $this->ion_auth->delete_group($group->id);
            }
        }

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