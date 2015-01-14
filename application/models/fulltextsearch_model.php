<?php 
class Fulltextsearch_model extends CI_Model {
  function search($terms, $start = 0, $results_per_page = 0)
  {
    // Зададим лимит выбираемых записей
    //и стартовую позицию
    if ($results_per_page > 0)
    {
      $limit = "LIMIT $start, $results_per_page";
    }
    else
    {
      $limit = '';
    }
    // Выполнение SQL запроса
    $sql = "SELECT * FROM buildings WHERE description LIKE(?)";
    $query = $this->db->query($sql, array($terms, $terms));
    return $query->result();
  }
  function count_search_results($terms)
  {
    // Run SQL to count the total number of search results
    $sql = "SELECT COUNT(*) AS count
          FROM buildings
          WHERE description LIKE(?)";
    $query = $this->db->query($sql, array($terms));
    return $query->row()->count;
  }
}
?>