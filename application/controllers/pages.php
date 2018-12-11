<?php


class pages extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->library('rssparser');
		$this->loggedin = $this->session->userdata('is_client_login')?$this->session->userdata('is_client_login'):0; 
		$this->userid = $this->session->userdata('id')?$this->session->userdata('id'):1;
    }
       public function view($page = 'news',$company_id = '673706')
{
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		$data['classified_images_top1'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1,'id');
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1,'id'+1);
		$data['classified_images_top_rand'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1,'rand()');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,5);
		$data['classified_images_top_banner2'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,5);
		$data['classified_images_top_banner3'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,1);
		$data['classified_images_top_banner4'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,1);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,9);
		$data['classified_images_left1'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,30);
		$data['classified_images_left2'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,3);
		$data['classified_images_left3'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,5);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rand()');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,3);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$this->load->library('rssparser');
		$this->rssparser->set_feed_url('http://www.newspages.co.za/category/government-co-za/feed/');  
		$this->rssparser->set_cache_life(5);                       
		$data['news'] = $this->rssparser->getFeed(1000);

        $this->load->view('vwHeader', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('vwFooter', $data);
}
	
	
	public function post($post = '0')
{
        if ( ! file_exists(APPPATH.'views/pages/post.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['post'] = $post;
		$this->load->library('rssparser');
		$this->rssparser->set_feed_url('http://www.newspages.co.za/category/south-africa/feed/');  
		$this->rssparser->set_cache_life(5);                       
		$data['news'] = $this->rssparser->getFeed(1000);
		$this->load->view('vwHeader', $data);
        $this->load->view('pages/post', $data);
		$this->load->view('vwFooter', $data);
}
	
		public function event($link1 = 'http://www.gov.za/',$link2 = 'speeches/',$link3 = 'deputy-minister-visit-lingelethu-police-station-khayelitsha-6-jul-2017-0000')
{
      
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['link'] = "http://".$link1."/".$link2."/".$link3;
		$this->load->view('vwHeader', $data);
        $this->load->view('pages/event', $data);
		$this->load->view('vwFooter', $data);
}
	
	public function events($page = '0')
{
		$data['page'] = $page;
		$this->load->view('vwHeader', $data);
        $this->load->view('pages/events', $data);
		$this->load->view('vwFooter', $data);
}
	
	public function press($link = 'https://www.pressportal.co.za/')
{
        if ( ! file_exists(APPPATH.'views/pages/pressread.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['link'] = $this->input->post('link');
		$this->load->view('vwHeader', $data);
        $this->load->view('pages/pressread', $data);
		$this->load->view('vwFooter', $data);
}

	
	public function success($link = 'http://www.sanews.gov.za/features-south-africa/youth-urged-be-innovative-start-businesses')
{
        if ( ! file_exists(APPPATH.'views/pages/success.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['link'] = $this->input->post('link');	
		$this->load->view('vwHeader', $data);
        $this->load->view('pages/success', $data);
		$this->load->view('vwFooter', $data);
}
	
}?>