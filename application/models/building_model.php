<?php

class Building_Model extends CI_Model {

    /**
     * Constructor
     */
    public function __construct() {
        $this->load->database();
    }



    public function add_building_item( $item ){
        $this->load->database();
        $this->db->reconnect();
        $q = $this->db->get_where('buildings', array('res_id' => $item['res_id']))->result_array();
        if ( count($q) > 0 ) {
            $this->db->where('res_id', $item['res_id']);
            $res = $this->db->update('buildings', $item);
            return $res ? $q[0]['id'] : false;
        }

        $res = $this->db->insert('buildings', $item);
        if ($res) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function add_building_images( $building_id, array $images) {
        $this->load->database();
        $this->db->reconnect();
        $r = $this->db->delete('buildings_images', array('building_id' => intval($building_id), ));
        $data = array();
        foreach ($images as $image) {
            $data[] = array(
                'building_id' => $building_id,
                'image_url'   => $image,
            );
        }
        $res = $this->db->insert_batch('buildings_images', $data);
        return $res ? true : false;
    }


//get metro items
    public function get_metro_items() {
        $this->load->database();
        $this->db->reconnect();
        $query = $this->db->get('buildings_metro');
        return $query->result_array();
    }
// get districts items
    public function get_district_items() {
        $this->load->database();
        $this->db->reconnect();
        $query = $this->db->get('buildings_district');
        return $query->result_array();
    }

    public function add_district($district) {
        $this->load->database();
        $this->db->reconnect();
  //      $region_id = (int) $region_id;
        $id = $this->get_district_id($district);
        if (!$id) {
            $res = $this->db->insert('buildings_district', array( 
                'district_title' => $district, 
         //       'district_region_id' => $region_id,
            ));
            $id = $this->db->insert_id();    
        }
        return $id;
    }

    public function get_district_id($name) {
        $this->load->database();
        $this->db->reconnect();
     //   $region_id = (int) $region_id;
        $name = strtolower(trim($name));
        $this->db->select('id');
        $region_name = preg_split("/[\s\r\n]+/i", $name);
        $region_name = mb_strtolower(trim($region_name[0]));
        $this->db->like('LOWER(TRIM(district_title))', $region_name );
        // $this->db->where('LOWER(TRIM(district_title))', $name );
      //  $this->db->where('district_region_id', $region_id );
        $this->db->from('buildings_district');
        return (int) $this->db->get()->row()->id;
    }


// get region items
    public function get_region_items() {
        $this->load->database();
        $this->db->reconnect();
        $query = $this->db->get('buildings_regions');
        return $query->result_array();
    }

    public function add_region($region) {
        $this->load->database();
        $this->db->reconnect();
        $res = $this->db->insert('buildings_regions', array( 'region_title' => $region, ));
        return $this->db->insert_id();
    }
// get categories items
    public function get_category_items() {
        $this->load->database();
        $this->db->reconnect();
        $query = $this->db->get('buildings_category');
        return $query->result_array();
    }
// get types items
    public function get_type_items() {
        $this->load->database();
        $this->db->reconnect();
        $query = $this->db->get('buildings_types');
        return $query->result_array();
    }

    public function add_building_type($typename) {
        $this->load->database();
        $this->db->reconnect();
        $res = $this->db->insert('buildings_types', array( 'type_title' => $typename, ));
        return $this->db->insert_id();
    }


//     Add locality
    public function add_locality($name) {
        $this->load->database();
        $this->db->reconnect();
        $data = array(
            'locality_title' => $name,
        );
        $id = $this->get_locality_id($name); 
        if (!$id) {
            $this->db->insert('buildings_locality', $data);
            $id = $this->db->insert_id();
        }
        return intval($id);
    }

    public function get_locality_id($name) {
        $name = strtolower(trim($name));
        $this->db->select('id');
        $this->db->where('LOWER(TRIM(locality_title))', $name );
        $this->db->from('buildings_locality');
        return (int) $this->db->get()->row()->id;
    }


    //     Add cottage type
    public function add_cottage_type($name) {
        $this->load->database();
        $this->db->reconnect();
        $data = array(
            'title' => $name,
        );
        $id = $this->get_cottage_type_id($name); 
        if (!$id) {
            $this->db->insert('buildings_cottage_types', $data);
            $id = $this->db->insert_id();
        }
        return intval($id);
    }

    public function get_cottage_type_id($name) {
        $name = strtolower(trim($name));
        $this->db->select('id');
        $this->db->where('LOWER(TRIM(title))', $name );
        $this->db->from('buildings_cottage_types');
        return (int) $this->db->get()->row()->id;
    }

    // Add buildings agent
    public function add_buildings_agent($id, $name, $agency_id = 0, $agency = NULL ) {
        $this->load->database();
        $this->db->reconnect();
         $data = array(
            'id' => $id,
            'title' => $name,
            'agency' => $agency,
            'agency_id' => $agency_id,
        );

        $this->db->where('id',$id);
        $q = $this->db->get('buildings_agents');
        if ( $q->num_rows() > 0 ) 
            return (int) $id;

        $this->db->insert('buildings_agents', $data);
        return (int) $id;
    }

// Curl requests
    /**
     * @param $url
     * @param int $page
     * @return bool|int|mixed
     */
    public function emls_curl_request($url, $page = 1 ) {
        $headers = array(
            'Authorization: a4De13c94c6k5Cu5e8YRXDmtBhdZ3ymR',
        );

        $params = array(
            'limit'=>100,
            'page' => $page,
        );

        return $this->curl_request( $url, 'json', $params, $headers );
    }

    /**
     * @param $url
     * @param array $params
     * @return bool|int|mixed
     */
    public function bn_curl_request( $url, $params = array() ) {
        return $this->curl_request( $url, 'html', $params );
    }

    /***
     * @param $url
     * @param string $type
     * @param array $params
     * @param array $headers
     * @return bool|int|mixed
     * @throws Exception
     */
    public function curl_request( $url, $type = 'html', $params = array(), $headers = array() ) {

        // headers here
        switch ($type) {
            case 'html':
                $heads[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*;q=0.8';
            break;

            case 'json':
                $heads[] = 'Accept: application/json';
            break;
        }

        $heads = array_merge($heads, array (
            'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
            'Accept-Encoding: deflate',
            'Accept-Charset: utf-8,utf-8;q=0.7,*;q=0.7',
        ));

        $heads = array_merge( $heads, $headers );

        // params here
        $url .= '?' . http_build_query( $params );

        $curl = curl_init();

        // Curl options
        curl_setopt ($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $heads);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $res = false;

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        switch ( $http_code ) {
            case 200:
                $res = ($type == 'json')?json_decode($response):iconv('cp1251', 'utf-8', $response);
                break;

            case 404:
                throw new Exception('Page not found. ');
                $res = 404;
                break;

            default:
                $res = false;
                break;
        }
        curl_close($curl);

        return $res;
    }

}
                            