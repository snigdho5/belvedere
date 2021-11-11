<?php

class Articles extends MY_Controller
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
        if(!empty($this->input->post('keywords'))) //Find out if any text was typed in the Search box
        {
            //Get Filtered Articles
            $data['articles'] = $this->article_model->get_filtered_articles($this->input->post('keywords'),'id','DESC',10);
        }
        else
            {
                //Get Articles
                $data['articles'] = $this->article_model->get_articles('id','DESC',10);
            }

        //Get Categories
        $data['categories'] = $this->article_model->get_categories('id','DESC',5);

        //Get Users
        $data['users'] = $this->user_model->get_users('id','DESC',5);

        //View
        $data['main_content'] = 'admin/articles/index';
        $this->load->view('admin/layouts/main',$data);
    }


    /*
     * Add Article
     */
    public function add()
    {
        //Validation Rules
        $this->form_validation->set_rules('title','Title','trim|required|min_length[4]');
        $this->form_validation->set_rules('body','Body','trim|required');
        $this->form_validation->set_rules('is_published','Publish','required');
        $this->form_validation->set_rules('category','Category','required');

        $data['categories'] = $this->article_model->get_categories();

        $data['users'] = $this->user_model->get_users();

        //$data['groups'] = $this->User_model->get_groups();

        if($this->form_validation->run() == FALSE)
        {
            //Views
            $data['main_content'] = 'admin/articles/add';
            $this->load->view('admin/layouts/main', $data);
        }
        else
            {
                //Create Articles Data Array
                $data = array(
                    'title'         => $this->input->post('title'),
                    'body'          => $this->input->post('body'),
                    'category_id'   => $this->input->post('category'),
                    'user_id'       => $this->input->post('user'),
                    'access'   		=> $this->input->post('access'),
                    'is_published'  => $this->input->post('is_published'),
                    'in_menu'  		=> $this->input->post('in_menu'),
                    'position'  		=> $this->input->post('position')
                );

                //Articles Table Insert - Insert the Articles in the DB
                $this->article_model->insert($data);

                //Create Message
                $this->session->set_flashdata('article_saved', 'Your article has been saved');


                //Redirect to pages
                redirect('admin/articles');
            }
    }


    /*
     * Edit Article
     *
     * @param - $id
    */
    public function edit($id)
    {
        //Validation Rules
        $this->form_validation->set_rules('title','Title','trim|required|min_length[4]');
        $this->form_validation->set_rules('body','Body','trim|required');
        $this->form_validation->set_rules('is_published','Publish','required');
        $this->form_validation->set_rules('category','Category','required');

        $data['categories'] = $this->article_model->get_categories();

        $data['users'] = $this->user_model->get_users();

        $data['article'] = $this->article_model->get_article($id);

        if($this->form_validation->run() == FALSE)
        {
            //Views
            $data['main_content'] = 'admin/articles/edit';
            $this->load->view('admin/layouts/main', $data);
        }
        else
            {
                //Create Articles Data Array
                $data = array(
                    'title'         => $this->input->post('title'),
                    'body'          => $this->input->post('body'),
                    'category_id'   => $this->input->post('category'),
                    'user_id'       => $this->input->post('user'),
                    'access'   		=> $this->input->post('access'),
                    'is_published'  => $this->input->post('is_published'),
                    'in_menu'  		=> $this->input->post('in_menu'),
                    'position'  	=> $this->input->post('position')
                );

                //Articles Table Insert
                $this->article_model->update($data, $id);

                //Create Message
                $this->session->set_flashdata('article_saved', 'Your article has been saved');

                //Redirect to pages
                redirect('admin/articles');
            }
    }


    /*
     * Publish Article
    *
    * @param - (int) $id
    */
    public function publish($id)
    {
        //Publish Menu Items in array
        $this->article_model->publish($id);

        //Create Message
        $this->session->set_flashdata('article_published', 'Your article has been published');

        //Redirect to articles
        redirect('admin/articles');
    }



    /*
     * Unpublish Article
    *
    * @param - (int) $id
    */
    public function unpublish($id)
    {
        //Publish Menu Items in array
        $this->article_model->unpublish($id);

        //Create Message
        $this->session->set_flashdata('article_unpublished', 'Your article has been unpublished');

        //Redirect to articles
        redirect('admin/articles');
    }


    /*
     * Delete Article
     *
     * @param - (int) $id
     */
    public function delete($id)
    {
        $this->article_model->delete($id);

        //Create Message
        $this->session->set_flashdata('article_deleted', 'Your article has been deleted');

        //Redirect to articles
        redirect('admin/articles');
    }
}