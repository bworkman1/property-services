<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_ion_settings extends CI_Migration {

    private $NewGroups;

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
        // CREATE NEW GROUPS
        foreach($this->NewGroups as $name => $desc) {
            $group = $this->ion_auth->create_group($name, $desc);
            echo !$group ? $this->ion_auth->messages() : $name . ' was created (' . $group . ')<br>';
        }

        // REMOVE DEFAULT GENERATED GROUP (members)
        $removed_group = $this->ion_auth->delete_group(2);
    }

    public function down()
    {
        // REMOVE NEW GROUPS
        $groups = $this->ion_auth->groups()->result();
        foreach($groups as $group) {
            if(array_key_exists($group->name, $this->NewGroups)) {
                $removed_group = $this->ion_auth->delete_group($group->id);
                echo !$removed_group ? $this->ion_auth->messages() : $group->name . ' was deleted (' . $group->id . ')<br>';
            }
        }


    }
}