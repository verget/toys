<?php
class News_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    
    public function get_news($slug = FALSE, $limit = 10, $offset = 0, $count = false){
        $this->db->from('news');
        if( !empty($slug) )
            $this->db->where(['slug' => $slug]);
        
        if( $count ){
            $num = $this->db->count_all_results();
            return $num;
        }
        $this->db->limit( $limit, $offset );
        $this->db->order_by('created', 'DESC');
        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = [];
            foreach( $query->result() as $row )
                $data[] = $row;
            return $data;
        }
        return false;
    }
    
    public function fetch_one_news($news_id){
        $this->db->limit(1);
        $this->db->select(['news.*']);
        $this->db->from('news');
        $this->db->where('news.id = "' . $news_id . '"');
        $res = $this->db->get();
        if($res->num_rows() > 0)
            return $res->result()[0];
        return false;
    }
    
    public function storeNews($params, $id){
        if(empty( $params ))
            return false;
        
        if( empty($params['created']) )
            $params['created'] = date('Y-m-d H:i:s');
        
        if($id)
            return $this->db->update( 'news', $params, ['id' => $id], 1 );
        else
            return $this->db->insert( 'news', $params );
    }
    
    public function removeNews($id){
        return $this->db->delete('news', 'id = ' . $id);
    }
}
