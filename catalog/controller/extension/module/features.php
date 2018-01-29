<?php
class ControllerExtensionModuleFeatures extends Controller {
	public function index($setting) {
		if (isset($setting['module_description'][$this->config->get('config_language_id')])) {
			$data['heading_title'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');
			$data['html'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['description'], ENT_QUOTES, 'UTF-8');


			$data['title'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');
			$data['pic'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['pic'], ENT_QUOTES, 'UTF-8');
			$data['description'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['description'], ENT_QUOTES, 'UTF-8');

			$data['titletwo'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['titletwo'], ENT_QUOTES, 'UTF-8');
			$data['pictwo'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['pictwo'], ENT_QUOTES, 'UTF-8');
			$data['descriptiontwo'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['descriptiontwo'], ENT_QUOTES, 'UTF-8');

			$data['titlethree'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['titlethree'], ENT_QUOTES, 'UTF-8');
			$data['picthree'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['picthree'], ENT_QUOTES, 'UTF-8');
			$data['descriptionthree'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['descriptionthree'], ENT_QUOTES, 'UTF-8');

			$data['titlefour'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['titlefour'], ENT_QUOTES, 'UTF-8');
			$data['picfour'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['picfour'], ENT_QUOTES, 'UTF-8');
			$data['descriptionfour'] =  html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['descriptionfour'], ENT_QUOTES, 'UTF-8');

			return $this->load->view('extension/module/features', $data);
		}
	}
}