<?php

//Global Controller
class MY_Controller extends CI_Controller //CI Controller is the core controller in CodeIgniter
{
    public function __construct()
    {
        parent::__construct();

        //Loop to get all settings in the "globals" table - I want the settings to be available from everywhere
        foreach ($this->settings_model->get_global_settings() as $result){
            $this->global_data[$result->thekey] = $result->value;
        }
    }
}