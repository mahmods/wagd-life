<?php
class ControllerExtensionModuleAllreviews extends Controller {
	public function index() {
		$this->load->language('extension/module/allreviews');

		// Menu
		$this->load->model('catalog/review');

		$data['reviews'] = array();

		$reviews = $this->model_catalog_review->getReviews();

		foreach ($reviews as $review) {
			$data['reviews'][] = array(
                'author'     => $review['author'],
                'text'     => $review['text'],
                'rating'     => $review['rating'],
            );
		}

		return $this->load->view('extension/module/allreviews', $data);
	}
}