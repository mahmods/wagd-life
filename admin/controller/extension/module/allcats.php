<?php
class ControllerExtensionModuleAllcats extends Controller {
	private $error = array();
	public function index() {
	$check = $this->db->query("SELECT * FROM `" . DB_PREFIX . "setting` where `code`='module_allcats'");
		if ($check->num_rows < 1){
			$this->db->query("INSERT INTO `" . DB_PREFIX . "setting` SET `code`='module_allcats', `key`='module_allcats_status', `value`='1'");
		}	
		$this->load->language('extension/module/allcats');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_allcats', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/allcats', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/allcats', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->post['module_allcats_status'])) {
			$data['module_allcats_status'] = $this->request->post['module_allcats_status'];
		} else {
			$data['module_allcats_status'] = $this->config->get('module_allcats_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/allcats', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/allcats')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}