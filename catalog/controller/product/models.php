<?php
class ControllerProductModels extends Controller {
	public function index() {
        $this->load->model('catalog/product');
        $this->load->model('catalog/filter');
        $this->load->model('catalog/manufacturer');
        $category_id = $this->request->post['category_id'];
        $manufacturer_id = null;
        if(isset($this->request->post['manufacturer'])) {
            $manufacturer  = $this->request->post['manufacturer'];
            $manufacturers = $this->model_catalog_manufacturer->getManufacturers();
            foreach ($manufacturers as $key => $value) {
                if ($value['name'] ==  $manufacturer) {
                    $manufacturer_id = $value['manufacturer_id'];
                }
            }
        }

        $manf_id = null;
        if(isset($this->request->post['manf_id'])) {
            $manf_id = $this->request->post['manf_id'];
        }
        $json = array();
        
        $filters = $this->model_catalog_filter->getManufactererFilters($manf_id);
        //var_dump($filter_groups);
        
        foreach ($filters as $filter) {
            $filter_data = array(
                'filter_category_id' => $category_id,
                'filter_filter'      => $filter['filter_id'],
                'filter_filter2'      => $manf_id,
                'filter_manufacturer_id'    => $manufacturer_id
            );
            $x = $this->model_catalog_product->getTotalProductsInModels($filter_data);
            if($x > 0) {
                $childen_data[] = array(
                    'filter_id' => $filter['filter_id'],
                    'name'      => $filter['name']
                );
            }
        }
        if (isset($childen_data)) {
            $json[] = $childen_data;
        }

        $this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}