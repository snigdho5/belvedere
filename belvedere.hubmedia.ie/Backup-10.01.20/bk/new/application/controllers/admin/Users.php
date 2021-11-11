<?php


class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Access Control
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }
    }


    public function index()
    {
        //Get Users
        $data['users'] = $this->user_model->get_users();

        //Views
        $data['main_content'] = 'admin/users/index';
        $this->load->view('admin/layouts/main', $data);
    }


    /*
     * Add User
     */
    public function add(){
        //Validation Rules
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required'); //Validation rule for password confirm field.

        $data['groups'] = $this->user_model->get_groups();

        if($this->form_validation->run() == FALSE)
        {
            //Views
            $data['main_content'] = 'admin/users/add';
            $this->load->view('admin/layouts/main', $data);
        }
        else
            {
                //Create Data Array
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    'username' 	 => $this->input->post('username'),
                    'password'   => md5($this->input->post('password')),
                    'group_id'   => $this->input->post('group'),
                    'email'  	 => $this->input->post('email')
                );
                //Table Insert
                $this->user_model->insert($data);

                //Create Message
                $this->session->set_flashdata('user_saved', 'User has been saved');

                //Redirect to pages
                redirect('admin/users');
            }
    }


    /*
     * Edit User
     *
     * @param - $id
     */
    public function edit($id)
    {
        //Validation Rules
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');

        $data['groups'] = $this->user_model->get_groups();

        $data['user'] = $this->user_model->get_user($id);

        if($this->form_validation->run() == FALSE)
        {
            //Views
            $data['main_content'] = 'admin/users/edit';
            $this->load->view('admin/layouts/main', $data);
        }
        else
            {
                //Create Data Array
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    'username' 	 => $this->input->post('username'),
                    'group_id'   => $this->input->post('group'),
                    'email'  	 => $this->input->post('email')
            );

            //Table Update
            $this->user_model->update($data, $id);

            //Create Message
            $this->session->set_flashdata('user_saved', 'User has been saved');

            //Redirect to pages
            redirect('admin/users');

            }
    }


    /*
     * Delete User
     *
     * @param - (int) $id
     */
    public function delete($id)
    {
        $this->user_model->delete($id);

        //Create Message
        $this->session->set_flashdata('user_deleted', 'User has been deleted');

        //Redirect To Index
        redirect('admin/users');
    }
}