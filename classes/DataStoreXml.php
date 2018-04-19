<?php namespace MariuszAnuszkiewicz\classes\Data;

use MariuszAnuszkiewicz\classes\Database\DB;

class DataStoreXML{

    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function addNewRSS($url_category, $url_address, $date_to_add, $favorite) {
        if ($this->checkExistsRSS($url_address)){
            return null;
        } else {
            $sql = "INSERT INTO rss_store (url_category, url_address, date_to_add, favorite) VALUES (?, ?, ?, ?)";
            return $this->db->query($sql, array($url_category, $url_address, $date_to_add, $favorite));
        }
    }

    public function checkExistsRSS($url_address) {
        $sql = "SELECT * FROM rss_store WHERE url_address = ?";
        $this->db->query($sql, array($url_address));
        $result = $this->db->results();
        foreach($result as $row) {
            if (isset($result[0])) {
                if ($row['url_address'] === $url_address) {
                    return $row['url_address'];
                }
            }
            return false;
        }
    }

    public function checkExistsSelected($selected) {
        $sql = "SELECT * FROM content WHERE time_active_posts = ?";
        $this->db->query($sql, array($selected));
        $result = $this->db->results();
        foreach($result as $row){
            if(isset($result[0])){
                if($row['time_active_posts'] == $selected) {
                    return $row['time_active_posts'];
                }
            }
            return false;
        }
    }

    public function getUrlAddress($url) {
        $sql = "SELECT * FROM rss_store WHERE url_category = ?";
        $this->db->query($sql, array($url));
        $result = $this->db->results();
        foreach($result as $row){
            if(isset($result[0])){
                return $row['url_address'];
            }
            return false;
        }
    }

    public function getSelectCategory() {
        $output = [];
        $sql = "SELECT * FROM rss_store ORDER BY url_category";
        $this->db->query($sql);
        $row = $result = $this->db->results();
        for ($i = 0; $i < $this->db->countRow(); $i++) {
            $output[] = $row[$i];
        }
        return $output;
    }

    public function getCanalsRows() {
        $output = [];
        $sql = "SELECT * FROM rss_store ORDER BY url_category";
        $this->db->query($sql);
        $row = $result = $this->db->results();
        for ($i = 0; $i < $this->db->countRow(); $i++) {
            $output[] = $row[$i];
        }
        return $output;
    }

    public function deleteCanals($quantity, $post) {
        for ($i = 0; $i < $quantity; $i++) {
             $sql = "DELETE FROM rss_store WHERE id = ?";
             $this->db->query($sql, array($post));
             $this->db->getExecute();
        }
    }

    public function getContent() {
        if(preg_match('/index/', $_SERVER['REQUEST_URI'])) {
            $this->getCanalsRows();
        }else{
            echo $this->getCanalsRows();
        }
    }
}
