<?php
class ControllerExtensionModuleManufacturers extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/manufacturers');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module');
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('manufacturers', $this->request->post);
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
		}
		
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_speed'] = $this->language->get('entry_speed');
		$data['entry_speedex'] = $this->language->get('entry_speedex');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_widthex'] = $this->language->get('entry_widthex');
		$data['entry_height'] = $this->language->get('entry_height');
		$data['entry_heightex'] = $this->language->get('entry_heightex');
		$data['entry_slider'] = $this->language->get('entry_slider');
		$data['entry_random'] = $this->language->get('entry_random');
		$data['entry_select'] = $this->language->get('entry_select');
		$data['entry_status'] = $this->language->get('entry_status');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
		
		if (isset($this->error['code'])) {
			$data['error_code'] = $this->error['code'];
		} else {
			$data['error_code'] = '';
		}

		if (isset($this->error['code1'])) {
			$data['error_code1'] = $this->error['code1'];
		} else {
			$data['error_code1'] = '';
		}

		if (isset($this->error['code2'])) {
			$data['error_code2'] = $this->error['code2'];
		} else {
			$data['error_code2'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/manufacturers', 'token=' . $this->session->data['token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/manufacturers', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/manufacturers', 'token=' . $this->session->data['token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/manufacturers', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);
		
		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}
		
		if (isset($this->request->post['manufacturers_speed'])) {
			$data['manufacturers_speed'] = $this->request->post['manufacturers_speed'];
		} elseif (!empty($module_info)) {
			$data['manufacturers_speed'] = $module_info['manufacturers_speed'];
		} else {
			$data['manufacturers_speed'] = '';
		}		
		
		if (isset($this->request->post['manufacturers_width'])) {
			$data['manufacturers_width'] = $this->request->post['manufacturers_width'];
		} elseif (!empty($module_info)) {
			$data['manufacturers_width'] = $module_info['manufacturers_width'];
		} else {
			$data['manufacturers_width'] = '';
		}

		if (isset($this->request->post['manufacturers_height'])) {
			$data['manufacturers_height'] = $this->request->post['manufacturers_height'];
		} elseif (!empty($module_info)) {
			$data['manufacturers_height'] = $module_info['manufacturers_height'];
		} else {
			$data['manufacturers_height'] = '';
		}

		if (isset($this->request->post['manufacturers_slider'])) {
			$data['manufacturers_slider'] = $this->request->post['manufacturers_slider'];
		} elseif (!empty($module_info)) {
			$data['manufacturers_slider'] = $module_info['manufacturers_slider'];
		} else {
			$data['manufacturers_slider'] = '';
		}
		
		if (isset($this->request->post['manufacturers_random'])) {
			$data['manufacturers_random'] = $this->request->post['manufacturers_random'];
		} elseif (!empty($module_info)) {
			$data['manufacturers_random'] = $module_info['manufacturers_random'];
		} else {
			$data['manufacturers_random'] = '';
		}
		
		if (isset($this->request->post['manufacturers_select'])) {
			$data['manufacturers_select'] = $this->request->post['manufacturers_select'];
		} elseif (!empty($module_info)) {
			$data['manufacturers_select'] = $module_info['manufacturers_select'];
		} else {
			$data['manufacturers_select'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/manufacturers', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/manufacturers')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
		
		if (!$this->request->post['manufacturers_speed']) {
			$this->error['code'] = $this->language->get('error_code');
		}

		if (!$this->request->post['manufacturers_width']) {
			$this->error['code1'] = $this->language->get('error_code1');
		}
		
				if (!$this->request->post['manufacturers_height']) {
			$this->error['code2'] = $this->language->get('error_code2');
		}
		
		return !$this->error;
	}
}