<?php
class ControllerExtensionModuleAdvancedsearch extends Controller {
	public function index() {
		$this->load->language('extension/module/advancedsearch');

		// Menu
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/manufacturer');

		$this->load->model('catalog/product');

		$data['categories'] = array();

        $categories = $this->model_catalog_category->getCategories(0);
        foreach ($categories as $category) {
            if ($category['top']) {
                $data['categories'][] = array(
                    'id'     => $category['category_id'],
                    'name'     => $category['name'],
                );
            }
        }
		return $this->load->view('extension/module/advancedsearch', $data);
	}
}