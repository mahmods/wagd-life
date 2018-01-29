<?php
    class ControllerExtensionModuleFilter extends Controller {
        public function index() {
            if (isset($this->request->get['path'])) {
                $parts = explode('_', (string)$this->request->get['path']);
            } else {
                $parts = array();
            }

            $category_id = end($parts);

            $this->load->model('catalog/category');

            $this->load->model('catalog/manufacturer');

            $data['manufacturer'] = $this->model_catalog_manufacturer->getManufacturers();
            
            if (isset($this->request->get['manufacturer_id'])) {
                $data['manufacturer_id'] = $this->request->get['manufacturer_id'];
            } else {
                $data['manufacturer_id'] = '';
            }
            
            if (isset($this->request->get['filter_manf'])) {
                $filter_manf = $this->request->get['filter_manf'];
            } else {
                $filter_manf = '';
            }
            $data['category_id'] = $category_id;
            $category_info = $this->model_catalog_category->getCategory($category_id);

            if ($category_info) {
                $this->load->language('extension/module/filter');

                $url = '';

                if (isset($this->request->get['sort'])) {
                    $url .= '&sort=' . $this->request->get['sort'];
                }

                if (isset($this->request->get['order'])) {
                    $url .= '&order=' . $this->request->get['order'];
                }

                if (isset($this->request->get['limit'])) {
                    $url .= '&limit=' . $this->request->get['limit'];
                }

                if (isset($this->request->get['manufacturer_id'])) {
                    $url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
                }

                $data['action'] = str_replace('&amp;', '&', $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url));

                if (isset($this->request->get['filter'])) {
                    $data['filter_category'] = explode(',', $this->request->get['filter']);
                } else {
                    $data['filter_category'] = array();
                }

                if (isset($this->request->get['model'])) {
                    $data['filter_category'][] = $this->request->get['model'];
                }

                if (isset($this->request->get['filter_manf'])) {
                    $data['filter_category'][] = $this->request->get['filter_manf'];
                }

                if (isset($this->request->get['manufacturer'])) {
                    $data['filter_category'][] = $this->request->get['manufacturer'];
                }
                $this->load->model('catalog/product');
                $this->load->model('catalog/filter');

                $data['filter_groups'] = array();
                
                $filter_groups = $this->model_catalog_filter->getAllFilters();

                if(isset($this->request->get['filter_manf'])) {
                    foreach ($filter_groups as $filter_group) {
                        if ($filter_group['name'] == 'Models' ){
                            $filter_group['filter'] = $this->model_catalog_filter->getManufactererFilters($this->request->get['filter_manf']-1);
                        }
                    }
                }
                if ($filter_groups) {
                    foreach ($filter_groups as $filter_group) {
                        $childen_data = array();
                        if ($filter_group['name'] == 'Manufacturers' ){
                            $Manufacterers = $this->model_catalog_product->getTotalProductsInManufacturersByCategory($category_id);
                            foreach ($Manufacterers as $manuf) {
                                $childen_data[] = array(
                                    'filter_id' => $manuf['filter_id'],
                                    'name'      => $manuf['name'] . ' (' . $manuf['total'] . ')'
                                );
                            }
                        } else {
                            foreach ($filter_group['filter'] as $filter) {
                                $childen_data[] = array(
                                    'filter_id' => $filter['filter_id'],
                                    'name'      => $filter['name'] ,
                                );
                            }
                        }
                        $data['filter_groups'][] = array(
                            'filter_group_id' => $filter_group['filter_group_id'],
                            'name'            => $filter_group['name'],
                            'filter'          => $childen_data
                        );
                    }
                    return $this->load->view('extension/module/filter', $data);
                }
            }
        }
    }