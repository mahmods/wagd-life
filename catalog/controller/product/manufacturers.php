<?php
class ControllerProductmanufacturers extends Controller {
	public function index() {
        $this->load->model('catalog/product');
        $this->load->model('catalog/filter');
        $this->load->model('catalog/manufacturer');
        $category_id = $this->request->post['category_id'];

        $json = array();
        
        $json[] = $this->model_catalog_product->getTotalProductsInManufacturersByCategory($category_id);

        $this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}