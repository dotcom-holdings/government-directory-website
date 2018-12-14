<?php
Class Company extends CI_Model
{
	private $company = 'companies';

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		// to write all the data to the old/new cdn databases //
		//****************************************************//
		$CI = &get_instance();
		$this->db2 = $CI->load->database('new', TRUE);
		$this->db3 = $CI->load->database('old', TRUE);
		//****************************************************//
	}
	 
	 function create() {
		 $address = $this->input->post('address');
		 $paddress = $this->input->post('paddress');
		 $address = ucwords(strtolower($address));
		 $paddress = ucwords(strtolower($paddress));
	 	$data = array(
			'name'=>$this->input->post('name'),
			'address'=>$address,
			'paddress'=>$paddress,
			'telephone'=>$this->input->post('telephone'),
			'mobile'=>$this->input->post('mobile'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'about_us'=>$this->input->post('about_us'),
			'hours'=>$this->input->post('hours'),
			'status'=>$this->input->post('status'),
			'facebook'=>$this->input->post('facebook'),
			'twitter'=>$this->input->post('twitter'),
			'youtube'=>$this->input->post('youtube'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id'),
			'gov_bus'=>$this->input->post('gov_bus'),
			'freelisting'=>$this->input->post('freelisting'),
			'search_rank_id'=>$this->input->post('search_rank_id')
		);
		
	 	$res = $this->db->insert($this->company, $data);
		$id = $this->db->insert_id();
		
		$logo = $this->input->post('logo');
		if($logo)
		for($x=0;$x<sizeof($logo);$x++)
		{
			$logoArr = array(
					'company_id'=>$id,
					'url'=>$logo[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $logo[$x]);
			$query = $this->db->get('logos');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $logo[$x]);
				$this->db->update('logos', $logoArr);
			}
			else{
				$this->db->insert('logos', $logoArr);
			}
		}
		
		$viewpage_banner = $this->input->post('viewpage_banner');
		if($viewpage_banner)
		for($x=0;$x<sizeof($viewpage_banner);$x++)
		{
			$viewpage_bannerArr = array(
					'company_id'=>$id,
					'url'=>$viewpage_banner[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $viewpage_banner[$x]);
			$query = $this->db->get('viewpage_banners');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $viewpage_banner[$x]);
				$this->db->update('viewpage_banners', $viewpage_bannerArr);
			}
			else{
				$this->db->insert('viewpage_banners', $viewpage_bannerArr);
			}
		}
		
		$classified_banner = $this->input->post('classified_banner');
		if($classified_banner)
		for($x=0;$x<sizeof($classified_banner);$x++)
		{
			$classified_bannerArr = array(
					'company_id'=>$id,
					'url'=>$classified_banner[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $classified_banner[$x]);
			$query = $this->db->get('classified_banners');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $classified_banner[$x]);
				$this->db->update('classified_banners', $classified_bannerArr);
			}
			else{
				$this->db->insert('classified_banners', $classified_bannerArr);
			}
		}
		
		$advert = $this->input->post('advert');
		if($advert) 
		for($x=0;$x<sizeof($advert);$x++)
		{
			$advertArr = array(
					'company_id'=>$id,
					'url'=>$advert[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $advert[$x]);
			$query = $this->db->get('adverts');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $advert[$x]);
				$this->db->update('adverts', $advertArr);
			}
			else{
				$this->db->insert('adverts', $advertArr);
			}
		}
		
		
		$advert_large = $this->input->post('advert_large');
		if($advert_large)
		for($x=0;$x<sizeof($advert_large);$x++)
		{
			$advert_largeArr = array(
					'company_id'=>$id,
					'url'=>$advert_large[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $advert_large[$x]);
			$query = $this->db->get('adverts_large');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $advert_large[$x]);
				$this->db->update('adverts_large', $advert_largeArr);
			}
			else{
				$this->db->insert('adverts_large', $advert_largeArr);
			}
		}
		
		$advert_thin = $this->input->post('advert_thin');
		if($advert_thin)
		for($x=0;$x<sizeof($advert_thin);$x++)
		{
			$advert_thinArr = array(
					'company_id'=>$id,
					'url'=>$advert_thin[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $advert_thin[$x]);
			$query = $this->db->get('adverts_thin');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $advert_thin[$x]);
				$this->db->update('adverts_thin', $advert_thinArr);
			}
			else{
				$this->db->insert('adverts_thin', $advert_thinArr);
			}
		}
		
		$advert_wide = $this->input->post('advert_wide');
		if($advert_wide)
		for($x=0;$x<sizeof($advert_wide);$x++)
		{
			$advert_wideArr = array(
					'company_id'=>$id,
					'url'=>$advert_wide[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $advert_wide[$x]);
			$query = $this->db->get('adverts_wide');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $advert_wide[$x]);
				$this->db->update('adverts_wide', $advert_wideArr);
			}
			else{
				$this->db->insert('adverts_wide', $advert_wideArr);
			}
		}
		
		$profile = $this->input->post('profile');
		if($profile)
		for($x=0;$x<sizeof($profile);$x++)
		{
			$profileArr = array(
					'company_id'=>$id,
					'url'=>$profile[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $profile[$x]);
			$query = $this->db->get('profiles');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $profile[$x]);
				$this->db->update('profiles', $profileArr);
			}
			else{
				$this->db->insert('profiles', $profileArr);
			}
		}
		
		
		$video = $this->input->post('video');
		if($video)
		for($x=0;$x<sizeof($video);$x++)
		{
			$videoArr = array(
					'company_id'=>$id,
					'url'=>$video[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $video[$x]);
			$query = $this->db->get('videos');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $video[$x]);
				$this->db->update('videos', $videoArr);
			}
			else{
				$this->db->insert('videos', $videoArr);
			}
		}
		
		$promotion = $this->input->post('promotion');
		if($promotion)
		for($x=0;$x<sizeof($promotion);$x++)
		{
			$promotionArr = array(
					'company_id'=>$id,
					'url'=>$promotion[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $promotion[$x]);
			$query = $this->db->get('promotions');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $promotion[$x]);
				$this->db->update('promotions', $promotionArr);
			}
			else{
				$this->db->insert('promotions', $promotionArr);
			} 
		}
		
		
		$gallery = $this->input->post('gallery');
		if($gallery)
		for($x=0;$x<sizeof($gallery);$x++)
		{
			$galleryArr = array(
					'company_id'=>$id,
					'url'=>$gallery[$x]
				);
			$this->db->where('company_id', 0);
			$this->db->where('url', $gallery[$x]);
			$query = $this->db->get('galleries');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', 0);
				$this->db->where('url', $gallery[$x]);
				$this->db->update('galleries', $galleryArr);
			}
			else{
				$this->db->insert('galleries', $galleryArr);
			}
		}
			
		//** write to old cdn database **		
		$url = strtolower($this->input->post('name'));
		$url = str_replace('(','',$url);
		$url = str_replace(')','',$url);
		$url = str_replace(' ','-',$url);
		
		$data = array(
			'name'=>$this->input->post('name'),
			'url'=>$url,
			'address'=>$address,
			'postal_address'=>$paddress,
			'phone'=>$this->input->post('telephone'),
			'mobile'=>$this->input->post('mobile'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'about_us'=>$this->input->post('about_us'),
			'hours'=>$this->input->post('hours'),
			'tags'=>$this->input->post('tags'),
			'rank'=>0,
			'status'=>$this->input->post('status'),
			'logo'=>!empty($logo)?'/'.$logo[0]:'',
			'advert'=>!empty($advert)?'/'.$advert[0]:'',
			'video'=>'/'.$video[0],
			'created_at'=>date('Y-m-d H:i:s'),
			'staff_id'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'user_id'=>$this->input->post('user_id')
		);
	
		$res = $this->db2->insert('companies', $data);
		$cdn_id = $this->db2->insert_id();
			
		//*******************************
		//** write to old old database **
		$data = array(
			'name'=>$this->input->post('name'),
			'url'=>$url,
			'physical_address'=>$address,
			'postal_address'=>$paddress,
			'phone'=>$this->input->post('telephone'),
			'mobile'=>$this->input->post('mobile'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'about_us'=>$this->input->post('about_us'),
			'meta'=>'',
			'hours'=>$this->input->post('hours'),
			'tags'=>$this->input->post('tags'),
			'status'=>$this->input->post('status'),
			'logo'=>!empty($logo)?'/'.$logo[0]:'',
			'advert'=>!empty($advert)?'/'.$advert[0]:'',
			'video'=>'/'.$video[0],
			'created_at'=>date('Y-m-d H:i:s'),
			'staff_id'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'user_id'=>$this->input->post('user_id')
		);
		
	 	$res = $this->db3->insert('entries', $data);
		$old_id = $this->db3->insert_id();
		
		//*******************************
		
		//relate id to old db id's
		$this->common->insert_id_relations_to_old($id,$cdn_id,$old_id);		
		
		//website - company
		$website_id = $this->input->post('website_id');
		$this->db->where('company_id', $id);
		$this->db->delete('website_company');
		for($x=0;$x<sizeof($website_id);$x++)
		{
			$website = array(
					'company_id'=>$id,
					'website_id'=>$website_id[$x]
				);
			$this->db->insert('website_company', $website);
		}
		
		//website - company to old cdn db **********************
		$website_id = $this->input->post('website_id');
		$this->db2->where('company_id', $cdn_id);
		$this->db2->delete('company_website');
		for($x=0;$x<sizeof($website_id);$x++)
		{
			$website = array(
					'company_id'=>$cdn_id,
					'website_id'=>$website_id[$x]
				);
			$this->db2->insert('company_website', $website);
		}
		
		//website - company to old old db **********************
		$website_id = $this->input->post('website_id');
		$this->db3->where('entry_id', $old_id);
		$this->db3->delete('entries_websites');
		for($x=0;$x<sizeof($website_id);$x++)
		{
			$website = array(
					'entry_id'=>$old_id,
					'website_id'=>$website_id[$x]
				);
			$this->db3->insert('entries_websites', $website);
		}
		
		//viewpage banners - company to old cdn db banners ********
		if($viewpage_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($viewpage_banner);$x++)
				{
					$viewpage_bannerArr = array(
							'company_id'=>$cdn_id,
							'image'=>$viewpage_banner[$x],
							'position'=>3,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $viewpage_banner[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $viewpage_banner[$x]);
						$this->db2->update('banners', $viewpage_bannerArr);
					}
					else{
						$this->db2->insert('banners', $viewpage_bannerArr);
					}
				}
			}
		}
		
		//viewpage banners - company to old old db banners ********
		if($viewpage_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($viewpage_banner);$x++)
				{
					$viewpage_bannerArr = array(
							'entry_id'=>$old_id,
							'image'=>$viewpage_banner[$x],
							'position'=>3,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $viewpage_banner[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $viewpage_banner[$x]);
						$this->db3->update('banners', $viewpage_bannerArr);
					}
					else{
						$this->db3->insert('banners', $viewpage_bannerArr);
					}
				}
			}
		}
		
		//classified banners - company to old cdn db banners ********
		if($classified_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($classified_banner);$x++)
				{
					$classified_bannerArr = array(
							'company_id'=>$cdn_id,
							'image'=>$classified_banner[$x],
							'position'=>2,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $classified_banner[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $classified_banner[$x]);
						$this->db2->update('banners', $classified_bannerArr);
					}
					else{
						$this->db2->insert('banners', $classified_bannerArr);
					}
				}
			}
		}
		//classified banners - company to old old db banners ********
		if($classified_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($classified_banner);$x++)
				{
					$classified_bannerArr = array(
							'entry_id'=>$old_id,
							'image'=>$classified_banner[$x],
							'position'=>2,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $classified_banner[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $classified_banner[$x]);
						$this->db3->update('banners', $classified_bannerArr);
					}
					else{
						$this->db3->insert('banners', $classified_bannerArr);
					}
				}
			}
		} 
		
		
		//adverts wide - company to old cdn db attachments ********
		if($advert_wide){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_wide);$x++)
				{
					$advert_wideArr = array(
							'company_id'=>$cdn_id,
							'image'=>$advert_wide[$x],
							'position'=>4,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $advert_wide[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $advert_wide[$x]);
						$this->db2->update('banners', $advert_wideArr);
					}
					else{
						$this->db2->insert('banners', $advert_wideArr);
					}
				}
			}
		}
		
		//adverts wide - company to old old db attachments ********
		if($advert_wide){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_wide);$x++)
				{
					$advert_wideArr = array(
							'entry_id'=>$old_id,
							'image'=>$advert_wide[$x],
							'position'=>4,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $advert_wide[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $advert_wide[$x]);
						$this->db3->update('banners', $advert_wideArr);
					}
					else{
						$this->db3->insert('banners', $advert_wideArr);
					}
				}
			}
		}
		
		//adverts thin - company to old cdn db attachments ********
		if($advert_thin){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_thin);$x++)
				{
					$advert_thinArr = array(
							'company_id'=>$cdn_id,
							'image'=>$advert_thin[$x],
							'position'=>5,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $advert_thin[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $advert_thin[$x]);
						$this->db2->update('banners', $advert_thinArr);
					}
					else{
						$this->db2->insert('banners', $advert_thinArr);
					}
				}
			}
		}
		
		//adverts thin - company to old old db attachments ********
		if($advert_thin){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_thin);$x++)
				{
					$advert_thinArr = array(
							'entry_id'=>$old_id,
							'image'=>$advert_thin[$x],
							'position'=>5,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $advert_thin[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $advert_thin[$x]);
						$this->db3->update('banners', $advert_thinArr);
					}
					else{
						$this->db3->insert('banners', $advert_thinArr);
					}
				}
			}
		}
		
		//adverts large - company to old cdn db attachments ********
		if($advert_large){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_large);$x++)
				{
					$advert_largeArr = array(
							'company_id'=>$cdn_id,
							'image'=>$advert_large[$x],
							'position'=>6,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $advert_large[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $advert_large[$x]);
						$this->db2->update('banners', $advert_largeArr);
					}
					else{
						$this->db2->insert('banners', $advert_largeArr);
					}
				}
			}
		}
		
		//adverts large - company to old old db attachments ********
		if($advert_large){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_large);$x++)
				{
					$advert_largeArr = array(
							'entry_id'=>$old_id,
							'image'=>$advert_large[$x],
							'position'=>6,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $advert_large[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $advert_large[$x]);
						$this->db3->update('banners', $advert_largeArr);
					}
					else{
						$this->db3->insert('banners', $advert_largeArr);
					}
				}
			}
		}				
		
		//profiles - company to old cdn db attachments ********
		if($profile){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($profile);$x++)
				{
					$profileArr = array(
							'company_id'=>$cdn_id,
							'image'=>'/'.$profile[$x],
							'type'=>3,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', '/'.$profile[$x]);
					$query = $this->db2->get('attachments');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', '/'.$profile[$x]);
						$this->db2->update('attachments', $profileArr);
					}
					else{
						$this->db2->insert('attachments', $profileArr);
					}
				}
			}
		}
		
		//profiles - company to old old db attachments ********
		if($profile){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($profile);$x++)
				{
					$profileArr = array(
							'entry_id'=>$old_id,
							'advert'=>'/'.$profile[$x],
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('advert', '/'.$profile[$x]);
					$query = $this->db3->get('attachments');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('advert', '/'.$profile[$x]);
						$this->db3->update('attachments', $profileArr);
					}
					else{
						$this->db3->insert('attachments', $profileArr);
					}
				}
			}
		}
		
			//category
			$category = array(
					'company_id'=>$id,
					'category_id'=>$this->input->post('category_id')
				);
			$this->db->where('company_id', $id);
			$this->db->where('category_id', $this->input->post('category_id'));
			$query = $this->db->get('category_company');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('category_id', $this->input->post('category_id'));
				$this->db->update('category_company', $category);
			}
			else{
				$this->db->insert('category_company', $category);
			}
			
			//medical category
			if($this->input->post('medical_category_id')){
				$medical_category = array(
						'company_id'=>$id,
						'category_id'=>$this->input->post('medical_category_id')
					);
				$this->db->where('company_id', $id);
				$this->db->where('category_id', $this->input->post('medical_category_id'));
				$query = $this->db->get('category_company_medical');
				if ($query->num_rows() > 0){
					$this->db->where('company_id', $id);
					$this->db->where('category_id', $this->input->post('medical_category_id'));
					$this->db->update('category_company_medical', $medical_category);
				}
				else{
					$this->db->insert('category_company_medical', $medical_category);
				}
			}
			
			//government category
			if($this->input->post('government_category_id')){
				$government_category = array(
						'company_id'=>$id,
						'category_id'=>$this->input->post('government_category_id')
					);
				$this->db->where('company_id', $id);
				$this->db->where('category_id', $this->input->post('government_category_id'));
				$query = $this->db->get('category_company_government');
				if ($query->num_rows() > 0){
					$this->db->where('company_id', $id);
					$this->db->where('category_id', $this->input->post('government_category_id'));
					$this->db->update('category_company_government', $government_category);
				}
				else{
					$this->db->insert('category_company_government', $government_category);
				}
			}
						
			//category to old cdn db ***********************************************
			$category = array(
					'company_id'=>$cdn_id,
					'category_id'=>$this->input->post('category_id')
				);
			$this->db2->where('company_id', $cdn_id);
			$this->db2->where('category_id', $this->input->post('category_id'));
			$query = $this->db2->get('category_company');
			if ($query->num_rows() > 0){
				$this->db2->where('company_id', $cdn_id);
				$this->db2->where('category_id', $this->input->post('category_id'));
				$this->db2->update('category_company', $category);
			}
			else{
				$this->db2->insert('category_company', $category);
			}
			//category to old old db ***********************************************
			$cat_name = $this->common->get_category_name($this->input->post('category_id'));
			$old_cat_id = $this->common->get_old_category_id($cat_name);
			if(!$old_cat_id) $old_cat_id = $this->input->post('category_id');
			$category = array(
					'entry_id'=>$old_id,
					'category_id'=>$old_cat_id
				);
			$this->db3->where('entry_id', $old_id);
			$this->db3->where('category_id', $old_cat_id);
			$query = $this->db3->get('categories_entries');
			if ($query->num_rows() > 0){
				$this->db3->where('entry_id', $old_id);
				$this->db3->where('category_id', $old_cat_id);
				$this->db3->update('categories_entries', $category);
			}
			else{
				$this->db3->insert('categories_entries', $category);
			}
			
			//tags
			$tags = array(
					'company_id'=>$id,
					'name'=>$this->input->post('tags')
				);
			$this->db->where('company_id', $id);
			$this->db->where('name', $this->input->post('tags'));
			$query = $this->db->get('tags');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('name', $this->input->post('tags'));
				$this->db->update('tags', $tags);
			}
			else{
				$this->db->insert('tags', $tags);
			}
		
		if($this->input->post('cname')){
		$cname = $this->input->post('cname');
		$cposition = $this->input->post('cposition');
		$caddress = $this->input->post('caddress');
		$cpaddress = $this->input->post('cpaddress');
		$ctelephone = $this->input->post('ctelephone');
		$cfax = $this->input->post('cfax');
		$cemail = $this->input->post('cemail');
		
		for($x=1;$x<=sizeof($cname);$x++)
			{	
			$caddress[$x] = ucwords(strtolower($caddress[$x]));
			$cpaddress[$x] = ucwords(strtolower($cpaddress[$x]));		
				$type = array(
					'company_id'=>$id,
					'name'=>$cname[$x],
					'position'=>$cposition[$x],
					'address'=>$caddress[$x],
					'paddress'=>$cpaddress[$x],
					'telephone'=>$ctelephone[$x],
					'fax'=>$cfax[$x],
					'email'=>$cemail[$x],
					'last_updated'=>date('Y-m-d H:i:s')
				);
				$this->db->where('company_id', $id);
				$this->db->where('name', $cname[$x]);
				$query = $this->db->get('contact');
				if ($query->num_rows() > 0){
					$this->db->where('company_id', $id);
					$this->db->where('name', $cname[$x]);
					$this->db->update('contact', $type);
				}
				else{
					$this->db->insert('contact', $type);
				}
			}
		}

		return $id;
	 }

	 function update($id) {
		 $name = $this->input->post('name');
		 $address = $this->input->post('address');
		 $paddress = $this->input->post('paddress');
		 $address = ucwords(strtolower($address));
		 $paddress = ucwords(strtolower($paddress));
	 	$data = array(
			'name'=>$this->input->post('name'),
			'address'=>$address,
			'paddress'=>$paddress,
			'telephone'=>$this->input->post('telephone'),
			'mobile'=>$this->input->post('mobile'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'about_us'=>$this->input->post('about_us'),
			'hours'=>$this->input->post('hours'),
			'status'=>$this->input->post('status'),
			'facebook'=>$this->input->post('facebook'),
			'twitter'=>$this->input->post('twitter'),
			'youtube'=>$this->input->post('youtube'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id'),
			'gov_bus'=>$this->input->post('gov_bus'),
			'freelisting'=>$this->input->post('freelisting'),
			'search_rank_id'=>$this->input->post('search_rank_id')
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->company, $data);
		
		$logo = $this->input->post('logo');
		if($logo)
		for($x=0;$x<sizeof($logo);$x++)
		{
			$logoArr = array(
					'company_id'=>$id,
					'url'=>$logo[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $logo[$x]);
			$query = $this->db->get('logos');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $logo[$x]);
				$this->db->update('logos', $logoArr);
			}
			else{
				$this->db->insert('logos', $logoArr);
			}
		}
		
		$viewpage_banner = $this->input->post('viewpage_banner');
		if($viewpage_banner)
		for($x=0;$x<sizeof($viewpage_banner);$x++)
		{
			$viewpage_bannerArr = array(
					'company_id'=>$id,
					'url'=>$viewpage_banner[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $viewpage_banner[$x]);
			$query = $this->db->get('viewpage_banners');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $viewpage_banner[$x]);
				$this->db->update('viewpage_banners', $viewpage_bannerArr);
			}
			else{
				$this->db->insert('viewpage_banners', $viewpage_bannerArr);
			}
		}
		
		$classified_banner = $this->input->post('classified_banner');
		if($classified_banner)
		for($x=0;$x<sizeof($classified_banner);$x++)
		{
			$classified_bannerArr = array(
					'company_id'=>$id,
					'url'=>$classified_banner[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $classified_banner[$x]);
			$query = $this->db->get('classified_banners');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $classified_banner[$x]);
				$this->db->update('classified_banners', $classified_bannerArr);
			}
			else{
				$this->db->insert('classified_banners', $classified_bannerArr);
			}
			$this->db->where('company_id', 0);
			$this->db->where('url', $classified_banner[$x]);
			$this->db->delete('classified_banners');
		}
		
		$advert = $this->input->post('advert');
		if($advert) 
		for($x=0;$x<sizeof($advert);$x++)
		{
			$advertArr = array(
					'company_id'=>$id,
					'url'=>$advert[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $advert[$x]);
			$query = $this->db->get('adverts');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $advert[$x]);
				$this->db->update('adverts', $advertArr);
			}
			else{
				$this->db->insert('adverts', $advertArr);
			}
			//now update classified ads if exists there
			$ad_data = array(
				'url'=>$advert[$x],
				'updated_at'=>date('Y-m-d H:i:s'),
				'updated_by'=>$this->input->post('user_id')
			);
			$this->db->where('company_id', $id);
			$this->db->where('size_id', 1);
			$query = $this->db->get('classified_ads');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('size_id', 1);
				$this->db->update('classified_ads', $ad_data);
			}			

		}
		
		$advert_large = $this->input->post('advert_large');
		if($advert_large)
		for($x=0;$x<sizeof($advert_large);$x++)
		{
			$advert_largeArr = array(
					'company_id'=>$id,
					'url'=>$advert_large[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $advert_large[$x]);
			$query = $this->db->get('adverts_large');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $advert_large[$x]);
				$this->db->update('adverts_large', $advert_largeArr);
			}
			else{
				$this->db->insert('adverts_large', $advert_largeArr);
			}
		}
		
		$advert_thin = $this->input->post('advert_thin');
		if($advert_thin)
		for($x=0;$x<sizeof($advert_thin);$x++)
		{
			$advert_thinArr = array(
					'company_id'=>$id,
					'url'=>$advert_thin[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $advert_thin[$x]);
			$query = $this->db->get('adverts_thin');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $advert_thin[$x]);
				$this->db->update('adverts_thin', $advert_thinArr);
			}
			else{
				$this->db->insert('adverts_thin', $advert_thinArr);
			}
		}
		
		$advert_wide = $this->input->post('advert_wide');
		if($advert_wide)
		for($x=0;$x<sizeof($advert_wide);$x++)
		{
			$advert_wideArr = array(
					'company_id'=>$id,
					'url'=>$advert_wide[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $advert_wide[$x]);
			$query = $this->db->get('adverts_wide');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $advert_wide[$x]);
				$this->db->update('adverts_wide', $advert_wideArr);
			}
			else{
				$this->db->insert('adverts_wide', $advert_wideArr);
			}
		}
		
		$profile = $this->input->post('profile');
		if($profile)
		for($x=0;$x<sizeof($profile);$x++)
		{
			$profileArr = array(
					'company_id'=>$id,
					'url'=>$profile[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $profile[$x]);
			$query = $this->db->get('profiles');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $profile[$x]);
				$this->db->update('profiles', $profileArr);
			}
			else{
				$this->db->insert('profiles', $profileArr);
			}
		}
		
		
		$video = $this->input->post('video');
		if($video)
		for($x=0;$x<sizeof($video);$x++)
		{
			if($video[$x]==''){
				$this->db->where('company_id', $id);
				$this->db->delete('videos');
			} else {
				$videoArr = array(
						'company_id'=>$id,
						'url'=>$video[$x]
					);
				$this->db->where('company_id', $id);
				$this->db->where('url', $video[$x]);
				$query = $this->db->get('videos');
				if ($query->num_rows() > 0){
					$this->db->where('company_id', $id);
					$this->db->where('url', $video[$x]);
					$this->db->update('videos', $videoArr);
				}
				else{
					$this->db->insert('videos', $videoArr);
				}
			}
		}
		
		$promotion = $this->input->post('promotion');
		if($promotion)
		for($x=0;$x<sizeof($promotion);$x++)
		{
			$promotionArr = array(
					'company_id'=>$id,
					'url'=>$promotion[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $promotion[$x]);
			$query = $this->db->get('promotions');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $promotion[$x]);
				$this->db->update('promotions', $promotionArr);
			}
			else{
				$this->db->insert('promotions', $promotionArr);
			}
		}
		
		
		$gallery = $this->input->post('gallery');
		if($gallery)
		for($x=0;$x<sizeof($gallery);$x++)
		{
			$galleryArr = array(
					'company_id'=>$id,
					'url'=>$gallery[$x]
				);
			$this->db->where('company_id', $id);
			$this->db->where('url', $gallery[$x]);
			$query = $this->db->get('galleries');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('url', $gallery[$x]);
				$this->db->update('galleries', $galleryArr);
			}
			else{
				$this->db->insert('galleries', $galleryArr);
			}
		}
		
		$old_idArr = $this->common->get_id_relations_to_old($id);
		$cdn_id = $old_idArr[0]->cdn_id;
		$old_id = $old_idArr[0]->old_id;
		if(!$cdn_id || $cdn_id==''){
			$cdn_id = $this->common->get_id_relations_from_cdn_by_name_and_address($name,$address);
			$cdn_id = $cdn_id[0]->id;
		}
	
		//** write to old cdn database **		
		$url = strtolower($this->input->post('name'));
		$url = str_replace('(','',$url);
		$url = str_replace(')','',$url);
		$url = str_replace(' ','-',$url);
		
		$data = array(
			'name'=>$this->input->post('name'),
			'url'=>$url,
			'address'=>$address,
			'postal_address'=>$paddress,
			'phone'=>$this->input->post('telephone'),
			'mobile'=>$this->input->post('mobile'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'about_us'=>$this->input->post('about_us'),
			'hours'=>$this->input->post('hours'),
			'rank'=>0,
			'status'=>1,
			'tags'=>$this->input->post('tags'),
			'logo'=>!empty($logo)?'/'.$logo[0]:'',
			'advert'=>!empty($advert)?'/'.$advert[0]:'',
			'video'=>'/'.$video[0],
			'created_at'=>date('Y-m-d H:i:s'),
			'staff_id'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'user_id'=>$this->input->post('user_id')
		);
	
		$this->db2->where('id', $cdn_id);
		$query = $this->db2->get('companies');
		if ($query->num_rows() > 0){
			$this->db2->where('id', $cdn_id);
			$cdn_res = $this->db2->update('companies', $data);
		}
		else {
			$res = $this->db2->insert('companies', $data);
			$cdn_id = $this->db2->insert_id();
		}
			
		//*******************************
		//** write to old old database **
		$data = array(
			'name'=>$this->input->post('name'),
			'url'=>$url,
			'physical_address'=>$address,
			'postal_address'=>$paddress,
			'phone'=>$this->input->post('telephone'),
			'mobile'=>$this->input->post('mobile'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'about_us'=>$this->input->post('about_us'),
			'meta'=>'',
			'hours'=>$this->input->post('hours'),
			'tags'=>$this->input->post('tags'),
			'status'=>1,
			'logo'=>!empty($logo)?'/'.$logo[0]:'',
			'advert'=>!empty($advert)?'/'.$advert[0]:'',
			'video'=>'/'.$video[0],
			'created_at'=>date('Y-m-d H:i:s'),
			'staff_id'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'user_id'=>$this->input->post('user_id')
		);

	 	$this->db3->where('id', $old_id);
		$query = $this->db3->get('entries');
		if ($query->num_rows() > 0){
			$this->db3->where('id', $old_id);
			$old_res = $this->db3->update('entries', $data);
		}
		else {
			$this->db3->insert('entries', $data);
			$old_id = $this->db3->insert_id();
		}
		
		//*******************************
		//relate id to old db id's
		$this->common->insert_id_relations_to_old($id,$cdn_id,$old_id);
		
		//website - company
		$website_id = $this->input->post('website_id');
		$this->db->where('company_id', $id);
		$this->db->delete('website_company');
		for($x=0;$x<sizeof($website_id);$x++)
		{
			$website = array(
					'company_id'=>$id,
					'website_id'=>$website_id[$x]
				);
			$this->db->insert('website_company', $website);
		}
		
		//website - company to old cdn db **********************
		$website_id = $this->input->post('website_id');
		$this->db2->where('company_id', $cdn_id);
		$this->db2->delete('company_website');
		for($x=0;$x<sizeof($website_id);$x++)
		{
			$website = array(
					'company_id'=>$cdn_id,
					'website_id'=>$website_id[$x]
				);
			$this->db2->insert('company_website', $website);
		}
		
		//website - company to old old db **********************
		$website_id = $this->input->post('website_id');
		$this->db3->where('entry_id', $old_id);
		$this->db3->delete('entries_websites');
		for($x=0;$x<sizeof($website_id);$x++)
		{
			$website = array(
					'entry_id'=>$old_id,
					'website_id'=>$website_id[$x]
				);
			$this->db3->insert('entries_websites', $website);
		}
		
		//viewpage banners - company to old cdn db banners ********
		if($viewpage_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($viewpage_banner);$x++)
				{
					$viewpage_bannerArr = array(
							'company_id'=>$cdn_id,
							'image'=>'/'.$viewpage_banner[$x],
							'position'=>3,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $viewpage_banner[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $viewpage_banner[$x]);
						$this->db2->update('banners', $viewpage_bannerArr);
					}
					else{
						$this->db2->insert('banners', $viewpage_bannerArr);
					}
				}
			}
		}
		
		//viewpage banners - company to old old db banners ********
		if($viewpage_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($viewpage_banner);$x++)
				{
					$viewpage_bannerArr = array(
							'entry_id'=>$old_id,
							'image'=>'/'.$viewpage_banner[$x],
							'position'=>3,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $viewpage_banner[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $viewpage_banner[$x]);
						$this->db3->update('banners', $viewpage_bannerArr);
					}
					else{
						$this->db3->insert('banners', $viewpage_bannerArr);
					}
				}
			}
		}
		
		//classified banners - company to old cdn db banners ********
		if($classified_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($classified_banner);$x++)
				{
					$classified_bannerArr = array(
							'company_id'=>$cdn_id,
							'image'=>'/'.$classified_banner[$x],
							'position'=>2,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $classified_banner[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $classified_banner[$x]);
						$this->db2->update('banners', $classified_bannerArr);
					}
					else{
						$this->db2->insert('banners', $classified_bannerArr);
					}
				}
			}
		}
		//classified banners - company to old old db banners ********
		if($classified_banner){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($classified_banner);$x++)
				{
					$classified_bannerArr = array(
							'entry_id'=>$old_id,
							'image'=>'/'.$classified_banner[$x],
							'position'=>2,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $classified_banner[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $classified_banner[$x]);
						$this->db3->update('banners', $classified_bannerArr);
					}
					else{
						$this->db3->insert('banners', $classified_bannerArr);
					}
				}
			}
		} 
		
		
		//adverts wide - company to old cdn db attachments ********
		if($advert_wide){

			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_wide);$x++)
				{
					$advert_wideArr = array(
							'company_id'=>$cdn_id,
							'image'=>'/'.$advert_wide[$x],
							'position'=>4,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $advert_wide[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $advert_wide[$x]);
						$this->db2->update('banners', $advert_wideArr);
					}
					else{
						$this->db2->insert('banners', $advert_wideArr);
					}
				}
			}
		}
		
		//adverts wide - company to old old db attachments ********
		if($advert_wide){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_wide);$x++)
				{
					$advert_wideArr = array(
							'entry_id'=>$old_id,
							'image'=>'/'.$advert_wide[$x],
							'position'=>4,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $advert_wide[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $advert_wide[$x]);
						$this->db3->update('banners', $advert_wideArr);
					}
					else{
						$this->db3->insert('banners', $advert_wideArr);
					}
				}
			}
		}
		
		//adverts thin - company to old cdn db attachments ********
		if($advert_thin){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_thin);$x++)
				{
					$advert_thinArr = array(
							'company_id'=>$cdn_id,
							'image'=>'/'.$advert_thin[$x],
							'position'=>5,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $advert_thin[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $advert_thin[$x]);
						$this->db2->update('banners', $advert_thinArr);
					}
					else{
						$this->db2->insert('banners', $advert_thinArr);
					}
				}
			}
		}
		
		//adverts thin - company to old old db attachments ********
		if($advert_thin){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_thin);$x++)
				{
					$advert_thinArr = array(
							'entry_id'=>$old_id,
							'image'=>'/'.$advert_thin[$x],
							'position'=>5,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $advert_thin[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $advert_thin[$x]);
						$this->db3->update('banners', $advert_thinArr);
					}
					else{
						$this->db3->insert('banners', $advert_thinArr);
					}
				}
			}
		}
		
		//adverts large - company to old cdn db attachments ********
		if($advert_large){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_large);$x++)
				{
					$advert_largeArr = array(
							'company_id'=>$cdn_id,
							'image'=>'/'.$advert_large[$x],
							'position'=>6,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', $advert_large[$x]);
					$query = $this->db2->get('banners');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', $advert_large[$x]);
						$this->db2->update('banners', $advert_largeArr);
					}
					else{
						$this->db2->insert('banners', $advert_largeArr);
					}
				}
			}
		}
		
		//adverts large - company to old old db attachments ********
		if($advert_large){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($advert_large);$x++)
				{
					$advert_largeArr = array(
							'entry_id'=>$old_id,
							'image'=>'/'.$advert_large[$x],
							'position'=>6,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('image', $advert_large[$x]);
					$query = $this->db3->get('banners');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('image', $advert_large[$x]);
						$this->db3->update('banners', $advert_largeArr);
					}
					else{
						$this->db3->insert('banners', $advert_largeArr);
					}
				}
			}
		}
				
		//profiles - company to old cdn db attachments ********
		if($profile){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($profile);$x++)
				{
					$profileArr = array(
							'company_id'=>$cdn_id,
							'image'=>'/'.$profile[$x],
							'type'=>3,
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db2->where('company_id', $cdn_id);
					$this->db2->where('website_id', $website_id[$w]);
					$this->db2->where('image', '/'.$profile[$x]);
					$query = $this->db2->get('attachments');
					if ($query->num_rows() > 0){
						$this->db2->where('company_id', $cdn_id);
						$this->db2->where('website_id', $website_id[$w]);
						$this->db2->where('image', '/'.$profile[$x]);
						$this->db2->update('attachments', $profileArr);
					}
					else{
						$this->db2->insert('attachments', $profileArr);
					}
				}
			}
		}
		
		//profiles - company to old old db attachments ********
		if($profile){
			for($w=0;$w<sizeof($website_id);$w++){
				for($x=0;$x<sizeof($profile);$x++)
				{
					$profileArr = array(
							'entry_id'=>$old_id,
							'advert'=>'/'.$profile[$x],
							'status'=>1,
							'website_id'=>$website_id[$w],
							'created_at'=>date('Y-m-d H:i:s')
						);
					$this->db3->where('entry_id', $old_id);
					$this->db3->where('website_id', $website_id[$w]);
					$this->db3->where('advert', '/'.$profile[$x]);
					$query = $this->db3->get('attachments');
					if ($query->num_rows() > 0){
						$this->db3->where('entry_id', $old_id);
						$this->db3->where('website_id', $website_id[$w]);
						$this->db3->where('advert', '/'.$profile[$x]);
						$this->db3->update('attachments', $profileArr);
					}
					else{
						$this->db3->insert('attachments', $profileArr);
					}
				}
			}
		}
		
			//category
			$category = array(
					'company_id'=>$id,
					'category_id'=>$this->input->post('category_id')
				);
			$this->db->where('company_id', $id);
			$this->db->where('category_id', $this->input->post('category_id'));
			$query = $this->db->get('category_company');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('category_id', $this->input->post('category_id'));
				$this->db->update('category_company', $category);
			}
			else{
				$this->db->insert('category_company', $category);
			}
			
			//medical category
			if($this->input->post('medical_category_id')){
				$medical_category = array(
						'company_id'=>$id,
						'category_id'=>$this->input->post('medical_category_id')
					);
				$this->db->where('company_id', $id);
				$this->db->where('category_id', $this->input->post('medical_category_id'));
				$query = $this->db->get('category_company_medical');
				if ($query->num_rows() > 0){
					$this->db->where('company_id', $id);
					$this->db->where('category_id', $this->input->post('medical_category_id'));
					$this->db->update('category_company_medical', $medical_category);
				}
				else{
					$this->db->insert('category_company_medical', $medical_category);
				}
			}
			
			//government category
			if($this->input->post('government_category_id')){
				$government_category = array(
						'company_id'=>$id,
						'category_id'=>$this->input->post('government_category_id')
					);
				$this->db->where('company_id', $id);
				$this->db->where('category_id', $this->input->post('government_category_id'));
				$query = $this->db->get('category_company_government');
				if ($query->num_rows() > 0){
					$this->db->where('company_id', $id);
					$this->db->where('category_id', $this->input->post('government_category_id'));
					$this->db->update('category_company_government', $government_category);
				}
				else{
					$this->db->insert('category_company_government', $government_category);
				}
			}
			
			//category to old cdn db ***********************************************
			$category = array(
					'company_id'=>$cdn_id,
					'category_id'=>$this->input->post('category_id')
				);
			$this->db2->where('company_id', $cdn_id);
			$this->db2->where('category_id', $this->input->post('category_id'));
			$query = $this->db2->get('category_company');
			if ($query->num_rows() > 0){
				$this->db2->where('company_id', $cdn_id);
				$this->db2->where('category_id', $this->input->post('category_id'));
				$this->db2->update('category_company', $category);
			}
			else{
				$this->db2->insert('category_company', $category);
			}
			//category to old old db ***********************************************
			$cat_name = $this->common->get_category_name($this->input->post('category_id'));
			$old_cat_id = $this->common->get_old_category_id($cat_name);
			if(!$old_cat_id) $old_cat_id = $this->input->post('category_id');
			$category = array(
					'entry_id'=>$old_id,
					'category_id'=>$old_cat_id
				);
			$this->db3->where('entry_id', $old_id);
			$this->db3->where('category_id', $old_cat_id);
			$query = $this->db3->get('categories_entries');
			if ($query->num_rows() > 0){
				$this->db3->where('entry_id', $old_id);
				$this->db3->where('category_id', $old_cat_id);
				$this->db3->update('categories_entries', $category);
			}
			else{
				$this->db3->insert('categories_entries', $category);
			}
			
			//tags
			$tags = array(
					'company_id'=>$id,
					'name'=>$this->input->post('tags')
				);
			$this->db->where('company_id', $id);
			$this->db->where('name', $this->input->post('tags'));
			$query = $this->db->get('tags');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $id);
				$this->db->where('name', $this->input->post('tags'));
				$this->db->update('tags', $tags);
			}
			else{
				$this->db->insert('tags', $tags);
			}
		
		if($this->input->post('cname')){
		$cname = $this->input->post('cname');
		$cposition = $this->input->post('cposition');
		$caddress = $this->input->post('caddress');
		$cpaddress = $this->input->post('cpaddress');
		$ctelephone = $this->input->post('ctelephone');
		$cfax = $this->input->post('cfax');
		$cemail = $this->input->post('cemail');
		
		for($x=1;$x<=sizeof($cname);$x++)
			{	
			$caddress[$x] = ucwords(strtolower($caddress[$x]));
			$cpaddress[$x] = ucwords(strtolower($cpaddress[$x]));		
				$type = array(
					'company_id'=>$id,
					'name'=>$cname[$x],
					'position'=>$cposition[$x],
					'address'=>$caddress[$x],
					'paddress'=>$cpaddress[$x],
					'telephone'=>$ctelephone[$x],
					'fax'=>$cfax[$x],
					'email'=>$cemail[$x],
					'last_updated'=>date('Y-m-d H:i:s')
				);
				$this->db->where('company_id', $id);
				$this->db->where('name', $cname[$x]);
				$query = $this->db->get('contact');
				if ($query->num_rows() > 0){
					$this->db->where('company_id', $id);
					$this->db->where('name', $cname[$x]);
					$this->db->update('contact', $type);
				}
				else{
					$this->db->insert('contact', $type);
				}
			}
		}
		
		return $id;
	 }
	 
	function contact_name_exists($name,$dept_id)
	{
		$this->db->where('name',$name);
		$this->db->where('company_id',$dept_id);
		$query = $this->db->get('contact');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	 
	function disable($id)
	{
		$data = array(
				'status'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->company, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->company, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->company);
	}

	function get_company($id)
	{
		$query = $this->db->query('SELECT * FROM companies WHERE id='.$id);
        return $query->result();
	}
	
	function get_websites($company_id)
	{
		$query = $this->db->query('SELECT website_id FROM website_company WHERE company_id='.$company_id);
        return $query->result();
	}
	
	function get_categories($company_id)
	{
		$query = $this->db->query('SELECT category_id FROM category_company WHERE company_id='.$company_id);
        return $query->result();
	}
	
	function get_medical_categories($company_id)
	{
		$query = $this->db->query('SELECT category_id FROM category_company_medical WHERE company_id='.$company_id);
        return $query->result();
	}
	
	function get_government_categories($company_id)
	{
		$query = $this->db->query('SELECT category_id FROM category_company_government WHERE company_id='.$company_id);
        return $query->result();
	}
	
	function get_tags($category_id,$company_id)
	{
		$query = $this->db->query('SELECT name FROM tags WHERE company_id='.$company_id);
        return $query->result();
	}
	
	function get_contacts($id)
	{
		$query = $this->db->query('SELECT * FROM contact WHERE company_id='.$id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM companies WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//companies does exist
			return false;
		}
		else
		{
			//companies doesn't exists
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->company);
		
		return;
	}
	
	function count_companies()
	{ 
		return $this->db->count_all('companies');
	}

	function get_all_companies(){
        $query = $this->db->query('SELECT * FROM companies');
        return $query->result();
    }
	
	function get_companies_name($id){
        $query = $this->db->query('SELECT complex FROM companies WHERE id='.$id);
        return $query->result();
    }
	
	function fix_update($type) {
		if($this->input->post('db1_company_id')){
			$id = $this->input->post('db1_company_id');
	
			if($type=='delete')
			{
				$this->db2->where('id',$id);
				$this->db2->delete('companies');
				
				$this->db2->where('company_id',$id);
				$this->db2->delete('banners');
				
				$this->db2->where('company_id',$id);
				$this->db2->delete('attachments');
				
				$this->db2->where('company_id',$id);
				$this->db2->delete('category_company');
				
				$this->db2->where('company_id',$id);
				$this->db2->delete('company_website');
			}
			elseif($type=='viewpage')
			{
					$mysqli = new mysqli($this->db2->hostname, $this->db2->username, $this->db2->password,$this->db2->database);
					$query = "SELECT MAX( id ) AS lastid, company_id, COUNT( * ) FROM  banners where company_id=".$id." AND position=3 GROUP BY company_id HAVING COUNT( * ) >1";
					if ($result = $mysqli->query($query)) { 
						while ($row = $result->fetch_assoc()) {
							$query2 = "DELETE FROM banners WHERE company_id=".$id." AND position=3 AND id<".$row['lastid'];
							$mysqli->query($query2);
						}
					}
					$mysqli->close();
			}
			elseif($type=='classified')
			{
					$mysqli = new mysqli($this->db2->hostname, $this->db2->username, $this->db2->password,$this->db2->database);
					$query = "SELECT MAX( id ) AS lastid, company_id, COUNT( * ) FROM  banners where company_id=".$id." AND position=2 GROUP BY company_id HAVING COUNT( * ) >1";
					if ($result = $mysqli->query($query)) {
						while ($row = $result->fetch_assoc()) {
							$query2 = "DELETE FROM banners WHERE company_id=".$id." AND position=2 AND id<".$row['lastid'];
							$mysqli->query($query2);
						}
					}
					$mysqli->close();
			}
		}
		
		if($this->input->post('db2_company_id')){
			$id = $this->input->post('db2_company_id');
	
			if($type=='delete')
			{
				$this->db3->where('id',$id);
				$this->db3->delete('entries');
				
				$this->db3->where('entry_id',$id);
				$this->db3->delete('banners');
				
				$this->db3->where('entry_id',$id);
				$this->db3->delete('attachments');
				
				$this->db3->where('entry_id',$id);
				$this->db3->delete('categories_entries');
				
				$this->db3->where('entry_id',$id);
				$this->db3->delete('entries_websites');
			}
			elseif($type=='viewpage')
			{
					$mysqli = new mysqli($this->db3->hostname, $this->db3->username, $this->db3->password,$this->db3->database);
					$query = "SELECT MAX( id ) AS lastid, entry_id, COUNT( * ) FROM  banners where entry_id=".$id." AND position=3 GROUP BY entry_id HAVING COUNT( * ) >1";
					if ($result = $mysqli->query($query)) { 
						while ($row = $result->fetch_assoc()) {
							$query2 = "DELETE FROM banners WHERE entry_id=".$id." AND position=3 AND id<".$row['lastid'];
							$mysqli->query($query2);
						}
					}
					$mysqli->close();
			}
			elseif($type=='classified')
			{
					$mysqli = new mysqli($this->db3->hostname, $this->db3->username, $this->db3->password,$this->db3->database);
					$query = "SELECT MAX( id ) AS lastid, entry_id, COUNT( * ) FROM  banners where entry_id=".$id." AND position=2 GROUP BY entry_id HAVING COUNT( * ) >1";
					if ($result = $mysqli->query($query)) {
						while ($row = $result->fetch_assoc()) {
							$query2 = "DELETE FROM banners WHERE entry_id=".$id." AND position=2 AND id<".$row['lastid'];
							$mysqli->query($query2);
						}
					}
					$mysqli->close();
			}
		}
		
	 	return true;
	}
	
	function fix_all_duplicates($db,$type=''){
		if($db=='db3') $co_id = 'entry_id';
		else $co_id = 'company_id'; 
		
		if($type=='viewpage') $type = 3;
		elseif($type=='classified') $type = 2;
		else {echo 'No type entered';exit();}
		
		$mysqli = new mysqli($this->{$db}->hostname, $this->{$db}->username, $this->{$db}->password,$this->{$db}->database);
					$query = "SELECT MAX( id ) AS lastid, ".$co_id.", COUNT( * ) FROM banners WHERE position=".$type." GROUP BY ".$co_id." HAVING COUNT( * ) >1";
					if ($result = $mysqli->query($query)) {
						while ($row = $result->fetch_assoc()) {
							$query2 = "DELETE FROM banners WHERE ".$co_id."=".$row[$co_id]." AND position=".$type." AND id<".$row['lastid'];
							$mysqli->query($query2);
						}
					}
					$mysqli->close();
	}
	
	function dropdown_db2($where='',$table='companies',$id=0,$ps=1) 
    {
		$this -> db2 -> select('id, name,address');
		$this -> db2 -> from($table);
		
		if($id!=0)  
		{
			$this -> db2 -> where('id',$id);
		}
		
		$this -> db2 -> where('name like "%'.$where.'%"');

		$query = $this -> db2 -> get();
		
		$dd_data = array();
		if($ps==1) $dd_data[0] = "Please Select";
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['id'].' |  '.$tablerow['name'].' |  '.$tablerow['address'];
		}
		return $dd_data;	
	}
	
	function dropdown_db3($where='',$table='entries',$id=0,$ps=1) 
    {
		$this -> db3 -> select('id, name,physical_address');
		$this -> db3 -> from($table);
		
		if($id!=0)  
		{
			$this -> db3 -> where('id',$id);
		}
		
		$this -> db3 -> where('name like "%'.$where.'%"');

		$query = $this -> db3 -> get();
		
		$dd_data = array();
		if($ps==1) $dd_data[0] = "Please Select";
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['id'].' |  '.$tablerow['name'].' |  '.$tablerow['physical_address'];
		}
		return $dd_data;	
	}
	
	function count_duplicates() {
		//$query = $this->db2->query('SELECT MAX( id ) AS lastid, name, address, phone, COUNT( * ) FROM companies GROUP BY name,address, phone HAVING COUNT( * ) >1');
         return 0;//$query->num_rows(); 
	}


}
