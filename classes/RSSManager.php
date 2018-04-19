<?php namespace MariuszAnuszkiewicz\classes\Manager;

use MariuszAnuszkiewicz\classes\Data\DataStoreXML;
use MariuszAnuszkiewicz\classes\Database\DB;

class RSSManager{

    private $link;
    private $title;
    private $date;
    private $selector;
    private $db;
    private $count = 0;

    public function __construct() {
        $this->db = DB::getInstance();
        $this->selector = isset($_POST['pages']) ? $_POST['pages'] : '';
    }

    public function getSelector() {
        return $this->selector;
    }

    public function getFeed($url) {
        $xml = simplexml_load_file($url);
        foreach ($xml->channel->item as $item) {
            $this->title = $item->title;
            $this->link = $item->link;
            $this->date = $item->pubDate;
            $this->date = date('Y-m-d H:i:s', strtotime($this->date));
            if ($this->selector) {
                if ($this->db->countRow() < 1) {
                    $this->insertData($this->selector, $this->link, $this->title, $this->date, "no", 30);
                    if (isset($_POST["confirm"])) {
                        $this->count++;
                    }
                    if ($this->count == 1) {
                        $this->insertData($this->selector, $this->link, $this->title, $this->date, "no", 30);
                    }
                    if ($this->count > 1) {
                        return null;
                    }
                }
                $this->checkIdenticalData($this->title) ? null : $this->insertData($this->selector, $this->link, $this->title, $this->date, "no", 30);
            }
        }
    }

    public function getRows() {
        $output = [];
        $sql = "SELECT * FROM content WHERE url_category = ? ORDER BY create_date DESC";
        $this->db->query($sql, array($this->selector));
        $row = $result = $this->db->results();
        for ($i = 0; $i < $this->db->countRow(); $i++) {
            $output[] = $row[$i];
        }
        return $output;
    }

    public function getImagesServer($url) {
        libxml_use_internal_errors(true);
        $source = file_get_contents($url);
        $dom = new \DomDocument();
        $dom->loadHTML($source);
        $xp = new \domxpath($dom);
        $elements = $xp->query("//meta[@property='og:image']");

        foreach ($elements as $el) {
            $save = file_get_contents($el->getAttribute("content"));
            file_put_contents("web/uploads/" . md5("image") . ".jpg", $save);
        }
    }

    public function delete($quantity, $data) {
        for ($i = 0; $i < $quantity; $i++) {
            $sql = ("DELETE FROM content WHERE id = ?");
            $this->db->query($sql, array($data[$i]));
            $this->db->getExecute();
        }
    }

    public function deleteOlderthan($time_value) {
        $date = date("Y-m-d H:i:s", strtotime('-'. $time_value));
        $sql = ("DELETE FROM content WHERE create_date > ?");
        $this->db->query($sql, array($date));
        $this->db->getExecute();
    }

    public function insertData($url_category, $link, $title, $create_date, $is_read, $time_active_posts) {
        $is_read = "no";
        $sql = "INSERT INTO content (url_category, link, title, create_date, is_read, time_active_posts) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, array($url_category, $link, $title, $create_date, $is_read, $time_active_posts));
    }

    public function checkIdenticalData($data) {
        $sql = "SELECT * FROM content WHERE title = ?";
        $this->db->query($sql, array($data));
        $result = $this->db->results();
        foreach($result as $row){
            if(isset($result[0])){
                if($row['title'] == $data) {
                    return $row['title'];
                }
            }
            return false;
        }
    }

    public function findId($link) {
        $sql = "SELECT * FROM content WHERE link = ?";
        $this->db->query($sql, array($link));
        $result = $this->db->results();
        foreach($result as $row) {
            if(isset($result[0])) {
                return $row['id'];
            }
            return false;
        }
    }

    public function isRead($id) {
        $is_read = "yes";
        $sql = "UPDATE content SET is_read = ? WHERE id = ?";
        return $this->db->query($sql, array($is_read, $id));
    }

    public function addIsRead($link) {
        if(isset($_GET['link'])){
            if($_GET['link'] == $link){
                $id = $this->findId($link);
                $this->isRead($id);
            }
        }
    }

    public function getSelectRemoveTime() {
        $output = [];
        $sql = "SELECT * FROM config_time_remove ORDER BY time_active_posts";
        $this->db->query($sql);
        $row = $result = $this->db->results();
        for ($i = 0; $i < $this->db->countRow(); $i++) {
            $output[] = $row[$i];
        }
        return $output;
    }

    public function updateRemoveTime($select_data){
        $sql = "UPDATE content SET time_active_posts = ?";
        return $this->db->query($sql, array($select_data));
    }

    public function sortBy($website) {
        switch ($this->selector = $website) {
            case $this->selector:
                $dataRss = new DataStoreXML();
                if(isset($_POST['pages'])) {
                    $this->getFeed($dataRss->getUrlAddress($this->selector));
                    include "views/rss_posts.php";
                }
            break;
        }
    }

    public function showSetimeRemove() {
        $sql = "SELECT * FROM content ORDER BY time_active_posts";
        $this->db->query($sql);
        $row = $result = $this->db->results();
        if ($this->db->countRow() > 0) {
            return $row[0]['time_active_posts'] . " dni";
        } else {
            return null;
        }
    }

    public function getContent() {
        $href = substr($_SERVER["QUERY_STRING"], 5, strlen($_SERVER["QUERY_STRING"]));
        $this->sortBy($this->selector);
        $sql = "SELECT * FROM content ORDER BY time_active_posts";
        $this->db->query($sql);
        $row = $result = $this->db->results();

        for ($i = 0; $i < $this->db->countRow(); $i++) {
            $this->deleteOlderthan($row[$i]['time_active_posts']);
        }
        if (isset($_GET['link'])) {
            $this->addIsRead($href);
            header("Location: $href");
        }
        if (isset($_GET['link'])) {
            $this->getImagesServer($href);
        }
    }
}

