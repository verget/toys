<?php 
include_once APPPATH . 'controllers/prototype.php';
class Fulltextsearch extends Prototype {
	
  function search($search_terms = '', $start = 0){
    // Если форма отправлена перепишем URL добавив строку запроса
    // с некоторыми символами могут быть проблемы.
  	$this->load->model( 'config_model' );
  	$this->load->model( 'slides_model' );
    if ($this->input->post('q'))
    {
      redirect('/search/' . $this->input->post('q'));
    }
    if ($search_terms)
    {
      // Определим сколько результатов
      //выводить на страницу
      $results_per_page = $this->config->item('results_per_page');
      // Загружаем модель, выполняем поиск, определяем
      // сколько всего результатов поиска
      $this->load->model('fulltextsearch_model');
      $results = $this->fulltextsearch_model->search($search_terms, $start, $results_per_page);
      $total_results = $this->fulltextsearch_model->count_search_results($search_terms);
      // Загрузка постраничной навигации
      $this->_setup_pagination('/search/' . $search_terms . '/', $total_results, $results_per_page);
      // Определяем какие результаты выводить
      $first_result = $start + 1;
      $last_result = min($start + $results_per_page, $total_results);
    }
    $this->load->view( 'templates/header', [
    		'title' => 'Поиск',
    		'config' => $this->config_model->getConfig(),
    		'slides' => $this->slides_model->get_slides()
    		]);
    // Загрузка вида и вывод результатов
    $this->load->view('pages/search_results', array(
      'search_terms' => $search_terms,
      'first_result' => @$first_result,
      'last_result' => @$last_result,
      'total_results' => @$total_results,
      'results' => @$results
    ));
    $this->load->view ( 'templates/footer');
  }
  
  
  function _setup_pagination($url, $total_results, $results_per_page)
  {
    // Не забываем загрузить постраничную навигацию
    $this->load->library('pagination');
    $uri_segment = count(explode('/', $url));
    // Инициализация постраничной навигации и установка
    // необходимых параметров
    $this->pagination->initialize(array(
      'base_url' => site_url($url),
      'uri_segment' => $uri_segment,
      'total_rows' => $total_results,
      'per_page' => $results_per_page
    ));
  }
}
?>