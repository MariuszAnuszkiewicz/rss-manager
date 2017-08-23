<?php

if(preg_match('/view/', $_SERVER['REQUEST_URI'])) {

    include_once("../autoload/autoloading.php");

}else{

    include_once("autoload/autoloading.php");

}

class DataStoreXML{

    private $db;

    public function __construct(){

        $this->db = DB::getInstance();

    } // end construct

    public function addNewRSS($url_category, $url_address, $date_to_add, $favorite){

        if($this->checkExistsRSS($url_address)){

            return null;

        }else{

            $sql = "INSERT INTO rss_store (url_category, url_address, date_to_add, favorite) VALUES (?, ?, ?, ?)";
            return $this->db->query($sql, "Param_ON", array($url_category, $url_address, $date_to_add, $favorite));
        }

    } // end addNewRSS

    public function checkExistsRSS($url_address){

        $sql = "SELECT * FROM rss_store WHERE url_address = ?";
        $this->db->query($sql, "Param_ON", array($url_address));
        $result = $this->db->results();

        foreach($result as $row){

            if(isset($result[0])){

                if($row['url_address'] == $url_address) {

                    return $row['url_address'];
                }

            } // end if
            return false;

        } // end foreach

    } // end checkExistsRSS

    public function checkExistsSelected($selected){

        $sql = "SELECT * FROM content WHERE time_active_posts = ?";
        $this->db->query($sql, "Param_ON", array($selected));
        $result = $this->db->results();

        foreach($result as $row){

            if(isset($result[0])){

                if($row['time_active_posts'] == $selected) {

                    return $row['time_active_posts'];
                }

            } // end if
            return false;

        } // end foreach

    }

    public function getUrlAddress($url){

        $sql = "SELECT * FROM rss_store WHERE url_category = ?";
        $this->db->query($sql, "Param_ON", array($url));
        $result = $this->db->results();

        foreach($result as $row){

            if(isset($result[0])){

                return $row['url_address'];
            }
            return false;

        } // end foreach

    } // end getUrlAddress

    public function getSelectCategory(){

        $html = "";

        $sql = "SELECT * FROM rss_store ORDER BY url_category";
        $this->db->query($sql, "Param_OFF");
        $row = $result = $this->db->results();

        for ($i = 0; $i < count($row); $i++) {

            $select = (isset($_POST['pages']) && $_POST['pages'] == $row[$i]['url_category']) ? 'selected="selected"' : '';
            $html .= '<option value="' . $row[$i]['url_category'] . '"' . $select . '>' . $row[$i]['url_category'] . '</option>';

        } // end for

        return $html;

    } // end getSelectCategory

    public function getCanalsRows(){

        $html = "";

        $sql = "SELECT * FROM rss_store ORDER BY url_category";
        $this->db->query($sql, "Param_OFF");
        $row = $result = $this->db->results();

        for ($i = 0; $i < count($row); $i++) {

           $html .= "<ul id='rows_canals'>";
           $html .= '<li class="content_canals">' . $row[$i]['url_address'] . '</li>';
           $html .= "</ul>";

        } // end for

           return $html;

    } // end getCanalsRows

    public function deleteCanals($quantity, $post) {

        for ($i = 0; $i < $quantity; $i++) {

             $sql = ("DELETE FROM rss_store WHERE id = ?");
             $this->db->query($sql, "Param_ON", array($post));
             $this->db->getExecute();

        } // end for

    } // end delete

    public function getContent(){

        if(preg_match('/index/', $_SERVER['REQUEST_URI'])) {
            $this->getCanalsRows();
        }else{
            echo $this->getCanalsRows();
        }

    } // end getContent


} // end class


?>