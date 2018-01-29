<?php
class ControllerExtensionModuleMaincat extends Controller {
	public function index() {
		$this->load->language('extension/module/maincat');

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('catalog/filter');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 1
                $this->load->model('tool/image');
                $this->load->model('catalog/filter');
                $this->load->model('catalog/product');
                $image = empty($category['image']) ? 'no_image.jpg' : $category['image'];
                $thumb = $this->model_tool_image->resize($image, 368, 245);
                
                $cat_manfs = $this->model_catalog_product->getTotalProductsInManufacturersByCategory($category['category_id']);

				$data['categories'][] = array(
					'name'     => $category['name'],
                    'image'    => $thumb,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id']),
                    'manfs'    => array_slice($cat_manfs, 0, 16),
				);
			}
		}
		return $this->load->view('extension/module/maincat', $data);
	}
}