<?php
class ControllerExtensionModuleManufacturers extends Controller {
	public function index($setting) {
		static $module = 0;
		$this->load->language('extension/module/manufacturers');
		$this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');
		$this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.transitions.css');
		$this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');
		
		$this->load->model('catalog/manufacturer');
		$this->load->model('tool/image'); 

		$data['heading_title'] = $this->language->get('heading_title');
		$data['select_text'] = $this->language->get('select_text');
		$data['width'] = $setting['manufacturers_width'];
		$data['height'] = $setting['manufacturers_height'];
		$data['speed'] = $setting['manufacturers_speed'];
		$data['slider'] = $setting['manufacturers_slider'];
		$data['select'] = $setting['manufacturers_select'];
		$data['random'] = $setting['manufacturers_random'];
		
		$results = $this->model_catalog_manufacturer->getManufacturers();

		foreach ($results as $result) {
				$data['manufacturers'][] = array(
					'name' => $result['name'],
					'href' => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),					
					'image' => $this->model_tool_image->resize($result['image'], $data['width'], $data['height'])
				);
				$data['manslides'] = $data['manufacturers'];
		}
		$data['module'] = $module++;
		return $this->load->view('extension/module/manufacturers', $data);
	}
}