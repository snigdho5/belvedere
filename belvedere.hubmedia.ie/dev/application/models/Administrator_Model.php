<?php
	class Administrator_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		################# Create unique Slug #################
	
		public function create_unique_slug($string, $table)
		{
			$slug = url_title($string);
			$slug = strtolower($slug);
			$i = 0;
			$params = array ();
			$params['slug'] = $slug;
			if ($this->input->post('id')) {
				$params['id !='] = $this->input->post('id');
			}
			
			while ($this->db->where($params)->get($table)->num_rows()) {
				if (!preg_match ('/-{1}[0-9]+$/', $slug )) {
					$slug .= '-' . ++$i;
				} else {
					$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
				}
				$params ['slug'] = $slug;
				}
			return $slug;
		}

		public function adminLogin($email, $encrypt_password){
			//Validate
			$this->db->where('email', $email);
			$this->db->where('password', $encrypt_password);

			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				return $result->row(0);
			}else{
				return false;
			}
		}

		public function get_posts($slug = FALSE)
		{
			if($slug === FALSE){
				$query = $this->db->order_by('id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_post()
		{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id')
			    );
			return $this->db->insert('posts', $data);
		}

		public function delete($id,$table)
		{
			$this->db->where('id', $id);
			$this->db->delete($table);
			return true;
		}

		public function get_categories(){
			$this->db->order_by("id", "DESC");
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function add_user($post_image,$password)
		{
			$data = array('name' => $this->input->post('name'), 
							'email' => $this->input->post('email'),
							'password' => $password,
							'username' => $this->input->post('username'),
							'zipcode' => $this->input->post('zipcode'),
							'contact' => $this->input->post('contact'),
							'address' => $this->input->post('address'),
							'gender' => $this->input->post('gender'),
							'role_id' => '2',
							'status' => $this->input->post('status'),
							'dob' => $this->input->post('dob'),
							'image' => $post_image,
							'password' => $password,
							'register_date' => date("Y-m-d H:i:s")

						  );
			return $this->db->insert('users', $data);
		}

		public function get_users($username = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($username === FALSE){
				$this->db->order_by('users.id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('username' => $username));
			return $query->row_array();
		}

		public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

		public function get_user($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

		public function update_user_data($post_image)
		{ 
			$data = array('name' => $this->input->post('name'),
							'zipcode' => $this->input->post('zipcode'),
							'contact' => $this->input->post('contact'),
							'address' => $this->input->post('address'),
							'gender' => $this->input->post('gender'),
							'status' => $this->input->post('status'),
							'dob' => $this->input->post('dob'),
							'image' => $post_image,
							'register_date' => date("Y-m-d H:i:s")
						  );

			$this->db->where('id', $this->input->post('id'));
			$d = $this->db->update('users', $data);
		}

		public function create_event_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'event',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function event_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'event');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_event_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_event_category($id = FALSE)
		  {
		   if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		   }

		   $query = $this->db->get_where('categories', array('id' => $id));
		   return $query->row_array();
		  }


		  public function create_event($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'slug' => $this->create_unique_slug($this->input->post('name'),'events'),
							'quantity' => $this->input->post('quantity'),
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'start_date' => $this->input->post('start_date'),
							'end_date' => $this->input->post('end_date'),
							'user_id' => $this->session->userdata('user_id'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'status' => 1,
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'phone' => $this->input->post('phone'),
							'email' => $this->input->post('email'),
							'address' => $this->input->post('address'),
							'map' => $this->input->post('map')
						);
			$this->db->insert('events', $data);
			 return  $insert_id = $this->db->insert_id();
		}

		public function inserteventsmultipleImages($data = array()){
       	 $insert = $this->db->insert_batch('event_images',$data);
       	 return $insert?true:false;
    	}

		// Check Product SKU exists
		public function check_sku_exists($sku){
			$query = $this->db->get_where('events', array('sku' => $sku));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		public function get_events($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('events');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('events', array('id' => $id));
			return $query->row_array();
		}

		public function update_events($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('events');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('events', array('id' => $id));
			return $query->row_array();
		}

		public function event_images($eventId = FALSE){
			$this->db->order_by('id','desc');
			$this->db->where('event_id', $eventId);
			$query = $this->db->get('event_images');
			return $query->result_array();
		}

		public function update_events_data($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'quantity' => $this->input->post('quantity'),
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'start_date' => $this->input->post('start_date'),
							'end_date' => $this->input->post('end_date'),
							'user_id' => $this->session->userdata('user_id'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'status' => 1,
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'phone' => $this->input->post('phone'),
							'email' => $this->input->post('email'),
							'address' => $this->input->post('address'),
							'map' => $this->input->post('map')
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('events', $data);
		}

		public function create_faq_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'faq',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function faq_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'faq');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_faq_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_faq_category($id = FALSE)
		 {
		   	if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		}
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row_array();
		}


		//faq models functions start

		 public function create_faq()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			return $this->db->insert('faqs', $data);
		}


		public function get_faqs()
		{
			$this->db->select('categories.name catName, faqs.id as faqId,faqs.question,faqs.answer,faqs.datetime,faqs.status as faqStatus');
			$this->db->from('faqs');
			$this->db->join('categories', 'categories.id = faqs.faq_cat_id');
				
				$query=$this->db->get();
				return $data=$query->result_array();
		}

		public function update_faqs($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('faqs');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('faqs', array('id' => $id));
			return $query->row_array();
		}

		public function update_faq_data()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('faqs', $data);
		}

		//page pages details start

		public function create_page($image)
		{
			$data = array('title' => $this->input->post('title'), 
						  'slug' => $this->create_unique_slug($this->input->post('title'),'pages'),
						  'f_image' => $image,
						  'f_video' => $this->input->post('f_video'),
						  'status' => 1,
						  'description' => $this->input->post('description'),
						  'meta_title' => $this->input->post('meta_title'),
						  'keywords' => $this->input->post('meta_keyword'),
						  'meta_desc' => $this->input->post('meta_desc')
						);
			return $this->db->insert('pages', $data);
		}

		public function get_pages($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('pages');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('pages', array('id' => $id));
			return $query->row_array();
		}

		public function update_pages($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('pages');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('pages', array('id' => $id));
			return $query->row_array();
		}

		public function update_pages_data($image)
		{
			$data = array('title' => $this->input->post('title'), 
						  'f_image' => $image,
						  'f_video' => $this->input->post('f_video'),
						  'description' => $this->input->post('description'),
						  'meta_title' => $this->input->post('meta_title'),
						  'keywords' => $this->input->post('meta_keyword'),
						  'meta_desc' => $this->input->post('meta_desc')
						);
			/*echo '<pre>';
			print_r($data);
			exit;*/
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('pages', $data);
		}

		//social links
		public function get_sociallinks($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sociallinks');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sociallinks', array('id' => $id));
			return $query->row_array();
		}

		public function add_sociallinks_data($id = FALSE)
		{
			$data = array(
				'social_name' => $this->input->post('social_name'),
				'link' => $this->input->post('link'),
				'icon' => $this->input->post('icon')
			);
			return $this->db->insert('sociallinks', $data);
		}

		public function update_sociallinks($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sociallinks');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sociallinks', array('id' => $id));
			return $query->row_array();
		}

		public function update_sociallinks_data($id = FALSE)
		{
			$data = array(
				'social_name' => $this->input->post('social_name'),
				'link' => $this->input->post('link'),
				'icon' => $this->input->post('icon')
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sociallinks', $data);
		}

		//slider
		public function create_slider($post_image)
		{
			$data = array('title' => $this->input->post('title'), 
							'image' => $post_image,
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status')
						  );
			return $this->db->insert('sliders_img', $data);
		}

		public function get_sliders($id = false)
		{
			if($id === FALSE){
				$query = $this->db->get('sliders_img');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sliders_img', array('id' => $id));
			return $query->row_array();
		}

		public function get_slider_data($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sliders_img');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sliders_img', array('id' => $id));
			return $query->row_array();
		}

		public function update_slider_data($post_image)
		{
			$data = array('title' => $this->input->post('title'), 
							'image' => $post_image,
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sliders_img', $data);
		}

		// blogs models functions starts
		public function create_blog_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'blog',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function blog_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'blog');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_blog_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_blog_category($id = FALSE)
		 {
		   	if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		}
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row_array();
		}



		public function create_blog($post_image)
		{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id'),
			    'post_image' => $post_image,
			    'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('posts', $data);
		}

		public function listblogs($blogId = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($blogId === FALSE){
				$this->db->order_by('posts.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('posts', array('id' => $blogId));
			return $query->row_array();
		}

	
		public function update_blog_data($post_image){
			$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id'),
			    'post_image' => $post_image
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}

		public function list_blog_comments()
		{
			$this->db->select('comments.username, comments.email, comments.comment, comments.id as commentId, comments.created_at createdAt, comments.status as commentStatus, posts.title as blogTitle');
			$this->db->from('comments');
			$this->db->join('posts', 'posts.id = comments.post_id');
			$this->db->where('comments.comment_type', 'blog');

				$query=$this->db->get();
				return $data=$query->result_array();
		}

		public function view_blog_comments($id = FALSE)
		{

			if($id === FALSE){
				$query = $this->db->get('comments');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('comments', array('id' => $id));
			return $query->row_array();

			
		}



		//social links
		public function get_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

		public function update_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

		public function update_siteconfiguration_data($post_image)
		{
			$data = array('site_title' => $this->input->post('site_title'),
						  'site_name' => $this->input->post('site_name'),
						  'logo_img' => $post_image,
						  'phone' => $this->input->post('phone'),
						  'email' => $this->input->post('email'),
						  'address' => $this->input->post('address'),
						  'short_bio' => $this->input->post('short_bio'),
						  'copyright_text' => $this->input->post('copyright_text'),
						);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('site_config', $data);
		}

		//Page Content pages details start
		public function get_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents_data($id = FALSE)
		{
			$data = array('page_name' => $this->input->post('page_name'), 
							'content' => $this->input->post('content'),
							'updated_datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('page_content', $data);
		}

		public function get_galleries_images(){
			$this->db->order_by('id','desc');
			$query = $this->db->get('galleries');
			return $query->result_array();
		}

		public function create_team($team_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $team_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('teams', $data);
		}

		public function listteams($teamId = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($teamId === FALSE){
				$this->db->order_by('teams.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id');
				$query = $this->db->get('teams');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('teams', array('id' => $teamId));
			return $query->row_array();
		}

		public function update_team_data($post_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $post_image
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('teams', $data);
		}

		public function create_testimonial($uploaded_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('testimonials', $data);
		}

		public function listtestimonial($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				$this->db->order_by('testimonials.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('testimonials');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('testimonials', array('id' => $id));
			return $query->row_array();
		}

		public function update_testimonial_data($uploaded_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('testimonials', $data);
		}

		public function get_admin_data()
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

		public function change_password($new_password){

			$data = array(
				'password' => md5($new_password)
			    );
			$this->db->where('id', $this->session->userdata('user_id'));
			return $this->db->update('users', $data);
		}

		public function match_old_password($password)
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('password' => $password));
			return $query->row_array();

		}

		// function start fron forget password

		public function email_exists(){
    $email = $this->input->post('email');
    $query = $this->db->query("SELECT email, password FROM users WHERE email='$email'");    
    if($row = $query->row()){
        return TRUE;
    }else{
        return FALSE;
    }
}
public function temp_reset_password($temp_pass){
    $data =array(
                'email' =>$this->input->post('email'),
                'reset_pass'=>$temp_pass);
                $email = $data['email'];

    if($data){
        $this->db->where('email', $email);
        $this->db->update('users', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}
public function is_temp_pass_valid($temp_pass){
    $this->db->where('reset_pass', $temp_pass);
    $query = $this->db->get('users');
    if($query->num_rows() == 1){
        return TRUE;
    }
    else return FALSE;
}

	}