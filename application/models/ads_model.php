<?php
class Ads_model extends CI_Model {
    public static $search_fields = [
                    'price1',
                    'price2',
                    'price',
                    'category_id',
                  	'type_id',
		    		'country_id',
		    		'article',
		    		'in_stock',
    ];
    
    public function __construct(){
        $this->load->database();
    }
    
    public static function checkSearchFields($input){
        foreach( self::$search_fields as $field )
            if(! isset( $input[$field] ))
                $input[$field] = '';
        return $input;
    }
    
    public function fetch_ads($search = false, $limit = 10, $start = 0, $count = false, $self_agent = false){
        $this->db->select( [
            'items.*',
            'items_category.category_title',
        	'items_countries.country_title',
        	'items_types.type_title',
            'items_images.image_url',
        ] );
        $this->db->from( 'items' );
        if(! empty( $search )){
            foreach( $search as $key => $val )
                if(empty( $val ) || $key == 'search')
                    unset( $search[$key] );
            
            if(! empty( $search['price1'] )){
                if(! empty( $search['price2'] ))
                    $this->db->where( '(price >= "' . $search['price1'] . '" AND price <= "' . $search['price2'] . '")' );
                else
                    $this->db->where( '(price >= "' . $search['price1'] . '")' );
                unset( $search['price1'] );
                unset( $search['price2'] );
            }

            if(! empty( $search['type_id'] )){
                $this->db->where( 'type_id', $search['type_id'] );
                unset( $search['type_id'] );
            }
            
            if(! empty( $search['category_id'] )){
                $this->db->where( 'category_id', $search['category_id'] );
                unset( $search['category_id'] );
            }
            
            if(! empty( $search['country_id'] )){
            	$this->db->where( 'country_id', $search['country_id'] );
            	unset( $search['country_id'] );
            }
            
            if(! empty( $search['article'] )){
            	$this->db->where( 'article', $search['article'] );
            	unset( $search['article'] );
            }
            
            if(! empty( $search['in_stock'] )){
            	$this->db->where( 'in_stock', $search['in_stock'] );
            	unset( $search['in_stock'] );
            }

            if(! empty( $search['keyword'] )){
            	$this->db->like( 'description', $search['keyword'] );
            	unset( $search['keyword'] );
            }
        }

        if($count){
            $this->db->distinct();
            $num = $this->db->count_all_results();
            return $num;
        }
        $this->db->query('SET SQL_BIG_SELECTS=1');
        
        $this->db->join( 'items_types', 'items_types.id = type_id', 'LEFT' );
        $this->db->join( 'items_category', 'items_category.id = category_id', 'LEFT' );
        $this->db->join( 'items_images', 'items_images.item_id = items.id', 'LEFT' );
        $this->db->join( 'items_countries', 'items_countries.id = items.country_id', 'LEFT' );

        $this->db->group_by( 'items.id' );
        $this->db->limit( $limit, $start );
        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = [];
            foreach( $query->result() as $row ) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function fetch_one_ads($ads_id){
        $this->db->limit( 1 );
        $this->db->select( [
                        'items.*',
			            'items_category.category_title',
			        	'items_countries.country_title',
			        	'items_types.type_title',
			            'items_images.image_url',
        ] );
        $this->db->from( 'items' );
        $this->db->join( 'items_types', 'items_types.id = type_id', 'LEFT' );
        $this->db->join( 'items_category', 'items_category.id = category_id', 'LEFT' );
        $this->db->join( 'items_images', 'items_images.item_id = items.id', 'LEFT' );
        $this->db->join( 'items_countries', 'items_countries.id = items.country_id', 'LEFT' );
        $this->db->where( 'items.id = "' . $ads_id . '"' );
        
        $res = $this->db->get();
        if($res->num_rows() > 0){
            $tmp = $res->result()[0];
            $tmp->images = $this->getAdsImages( $tmp->id );
            return $tmp;
        }
        return false;
    }
    
    public function storeAds($params, $ad_id = 0){
        if(empty( $params ))
            return false;
        if($ad_id){
            return $this->db->update( 'items', $params, ['id' => $ad_id],1 );
        }else{
            return $this->db->insert( 'items', $params );
        }
    }
    
    public function removeAds( $ad_id ){
        $images = $this->getAdsImages($ad_id);
        if( !empty($images) ){
            foreach ($images as $img)
                @unlink(APPPATH . '../images/ads/' . $img->image_url);
            $this->db->delete('items_images', 'item_id = ' . $ad_id);
        }
        $this->db->delete('items', 'id = ' . $ad_id);
        return true;
    }
    
    public function storeAdsImage($fileName, $ad_id){
        $this->db->insert( 'items_images', [
                        'item_id' => $ad_id,
                        'image_url' => $fileName 
        ] );
        return $this->db->insert_id();
    }
    
    public function removeAdsImage($img_id){
        $this->db->select( 'image_url' );
        $this->db->from( 'items_images' );
        $this->db->where( 'id = ' . $img_id );
        $res = $this->db->get();
        if($res->num_rows() <= 0)
            return false;
        
        $img = $res->result()[0];
        @unlink( APPPATH . '../images/ads/' . $fileName );
        
        return $this->db->delete( 'items_images', 'id = ' . $img_id );
    }
    
    public function uploadAdsImages($ad_id){
        $res = [];
        if(! empty( $_FILES )){
            for($i = 0; $i < count( $_FILES['photos']['name'] ); $i ++){
                $fileExt = pathinfo( $_FILES['photos']['name'][$i], PATHINFO_EXTENSION );
                $fileName = $ad_id . '_' . md5( $ad_id . $_FILES['photos']['tmp_name'][$i] ) . '.' . $fileExt;
                if(move_uploaded_file( $_FILES['photos']['tmp_name'][$i], APPPATH . '../images/ads/' . $fileName )){
                    $newId = $this->storeAdsImage( $fileName, $ad_id );
                    $res[] = [
                                    'file_name' => $fileName,
                                    'image_id' => $newId 
                    ];
                }
            }
        }
        return $res;
    }
    
    public function getAdsImages($ads_id){
        $this->db->from( 'items_images' );
        $this->db->where( 'item_id', $ads_id );
        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = [];
            foreach( $query->result() as $row )
                $data[] = $row;
            return $data;
        }
        return false;
    }
    
    public function getAvailCategory($appId = false, $appName = false){
    	$this->db->select( 'items_category.category_title, category_id' );
    	$this->db->from( 'items' );
    	$this->db->join( 'items_category', 'items_category.id = category_id', 'LEFT' );
    	$this->db->group_by( 'category_id' );
    
    	$query = $this->db->get();
    	if($query->num_rows() > 0){
    		$data = [];
    		if(! empty( $appId ) || ! empty( $appName )){
    			$tmp = new stdClass();
    			$tmp->category_id = $appId;
    			$tmp->category_title = $appName;
    			$data[] = $tmp;
    		}
    		foreach( $query->result() as $row )
    			if($row->category_title)
    				$data[] = $row;
    
    			return $data;
    	}
    	return false;
    }
    
    
    public function getAvailTypes($appId = false, $appName = false, $category_id = 0){
        $this->db->select( 'items_types.type_title, type_id');
        $this->db->from( 'items' );
        $this->db->join( 'items_types', 'items_types.id = items.type_id', 'LEFT' );
        $this->db->group_by( 'type_id' );
        if( isset($category_id) )
        	$this->db->where('category_id', $category_id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = [];
            if(! empty( $appId ) || ! empty( $appName )){
                $tmp = new stdClass();
                $tmp->type_id = $appId;
                $tmp->type_title = $appName;
                $data[] = $tmp;
            }
            foreach( $query->result() as $row )
                if($row->type_title)
                    $data[] = $row;
            return $data;
        }
        return false;
    }
    
    public function getItems($cart){
        $array = array();
        foreach($cart as $item){
            $this->db->select( '*');
            $this->db->from( 'items' );
            $this->db->where('id', $item);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                foreach( $query->result() as $row ) {
                    $array[] = $row;
                }
            }
        }
        return $array;
    }
    
    public function getAvailCountry($appId = false, $appName = false){
    	$this->db->select( 'items_countries.country_title, country_id');
    	$this->db->from( 'items' );
    	$this->db->join( 'items_countries', 'items_countries.id = items.country_id', 'LEFT' );
    	$this->db->group_by( 'country_id' );
    
    	$query = $this->db->get();
    	if($query->num_rows() > 0){
    		$data = [];
    		if(! empty( $appId ) || ! empty( $appName )){
    			$tmp = new stdClass();
    			$tmp->country_id = $appId;
    			$tmp->country_title = $appName;
    			$data[] = $tmp;
    		}
    		foreach( $query->result() as $row )
    			if($row->country_title)
    				$data[] = $row;
    			return $data;
    	}
    	return false;
    }
    
     public function setOrder($name, $address, $items) {
         $this->db->insert( 'orders', [
                         'client_name' => $name,
                         'client_address' => $address,
                         'items' => implode(",", $items),
         ] );
         return $this->db->insert_id();
     }
     
     public function getOrders() {
         $array = array();
         $this->db->select( '*');
         $this->db->from( 'orders' );
         $query = $this->db->get();
         if($query->num_rows() > 0){
             foreach( $query->result() as $row ) {
                 $array[] = $row;
             }
         }
         return $array;
     }

    
    public function getCategoryList($appId = false, $appName = false){
        $this->db->from( 'items_category' );
        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = [];
            if(! empty( $appId ) || ! empty( $appName )){
                $tmp = new stdClass();
                $tmp->id = $appId;
                $tmp->category_title = $appName;
                $data[] = $tmp;
            }
            foreach( $query->result() as $row )
                if($row->category_title)
                 $data[] = $row;
            return $data;
        }
        return false;
    }
    
    public function getTypeList($appId = false, $appName = false){
    	$this->db->from( 'items_types' );
    
    	$query = $this->db->get();
    	if($query->num_rows() > 0){
    		$data = [];
    		if(! empty( $appId ) || ! empty( $appName )){
    			$tmp = new stdClass();
    			$tmp->id = $appId;
    			$tmp->type_title = $appName;
    			$data[] = $tmp;
    		}
    		foreach( $query->result() as $row )
    			if($row->type_title)
    				$data[] = $row;
    			return $data;
    	}
    	return false;
    }
    public function getCountryList($appId = false, $appName = false){
    	$this->db->from( 'items_countries' );
    
    	$query = $this->db->get();
    	if($query->num_rows() > 0){
    		$data = [];
    		if(! empty( $appId ) || ! empty( $appName )){
    			$tmp = new stdClass();
    			$tmp->id = $appId;
    			$tmp->country_title = $appName;
    			$data[] = $tmp;
    		}
    		foreach( $query->result() as $row )
    			if($row->country_title)
    				$data[] = $row;
    			return $data;
    	}
    	return false;
    }
    
}
