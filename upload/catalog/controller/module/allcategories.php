<?php

class ControllerModuleAllCategories extends Controller {
	
	public function index() {
		
		$this->language->load('module/allcategories');
		$this->load->model('tool/image'); 
		
      	$this->data['heading_title'] = $this->language->get('heading_title');
      	$this->data['description'] = $this->language->get('description');
		
 	  	$this->document->setTitle($this->language->get('heading_title')); 

      	$this->data['breadcrumbs'][] = array(
        		'text'      => $this->language->get('heading_title'),
				'href'      => $this->url->link('module/allcategories'),      		
        		'separator' => '/'
      	);	
		$this->load->model('catalog/category');
		$this->load->model('catalog/allcategories');
		$categories = $this->model_catalog_category->getCategories();
		$cats		=	array();
		$subcats	=	array();
		foreach($categories as $category){
			
			$subcategories = $this->model_catalog_category->getCategories($category['category_id']);
			foreach($subcategories as $subcategory){
				$img		=	$this->model_tool_image->resize($subcategory['image'], 20, 20);
				$URL			=	$this->model_catalog_allcategories->getUrlCategory($subcategory['category_id']);
				if($URL['keyword']==""){
					$RealUrl	=	$this->url->link('product/category','path='.$category['category_id'].'_'.$subcategory['category_id']);
					}else{
					$RealUrl	=	HTTP_SERVER.$URL['keyword'];
				}
				$subcats[]	=	array(
				'name'			=> $subcategory['name'],
				'image'			=> $img,
				'id'			=> $subcategory['category_id'],
				'url'			=> $RealUrl
				);
			}
			$URL			=	$this->model_catalog_allcategories->getUrlCategory($category['category_id']);
			if($URL['keyword']==""){
				$RealUrl	=	$this->url->link('product/category','path='.$category['category_id']);
				}else{
				$RealUrl	=	HTTP_SERVER.$URL['keyword'];
			}
			$img			=	$this->model_tool_image->resize($category['image'], 250, 150);
			$cats[]=array(
			'name'			=> $category['name'],
			'image'			=> $img,
			'id'			=> $category['category_id'],
			'url'			=> $RealUrl,
			'subcats'		=> $subcats
			);
			$subcats		=	'';
		}
		$this->data['cats']		=	$cats;
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/allcategories.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/allcategories.tpl';
		} else {
			$this->template = 'default/template/module/allcategories.tpl';
		}
		
		$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer',
				'common/header'
		);
	  		$this->response->setOutput($this->render());
	}

}
?>