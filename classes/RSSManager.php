<?php

require_once 'autoload/autoloading.php';


class RSSManager{

    private $link;
    private $title;
    private $date;
    private $selector;
    private $db;
    private $count = 1;


    public function __construct(){

        $this->db = DB::getInstance();
        $this->selector = isset($_POST['pages']) ? $_POST['pages'] : '';

    }

    public function getFeed($url){

        $xml = simplexml_load_file($url);

        foreach ($xml->channel->item as $item) {

            $this->title = $item->title;
            $this->link = $item->link;
            $this->date = $item->pubDate;
            $this->date = date('Y-m-d H:i:s', strtotime($this->date));

            if($this->selector){

                if($this->db->countRow() < 1) {

                    $this->insertData($this->selector, $this->link, $this->title, $this->date, "no", 30);


                    if(isset($_POST["confirm"])){

                        $this->count++;
                    }

                    if($this->count == 1) {

                        $this->insertData($this->selector, $this->link, $this->title, $this->date, "no", 30);
                    }

                    if($this->count > 1){

                        $this->insertData(null, null, null, null, null, null);
                    }


                } // end if countRow

                  $this->checkIdenticalData($this->title) ? $this->insertData(null, null, null, null, null, null) : $this->insertData($this->selector, $this->link, $this->title, $this->date, "no", 30);

            } // end if selector

        } // end foreach

    } // end getFeed

    public function getRows(){


            $html = "";
            $is_read = "yes";

            $sql = "SELECT * FROM content WHERE url_category = ? ORDER BY create_date DESC";
            $this->db->query($sql, "Param_ON", array($this->selector));
            $row = $result = $this->db->results();

            for ($i = 0; $i < count($row); $i++) {

                $checkIsRead = ($row[$i]['is_read'] == $is_read) ? " <b>przeczytane</b>" : "";

                $html .= "<ul id='rows_posts'>";
                $html .= '<li class="content_posts"><a href="?link=' . $row[$i]['link'] . '">' . $row[$i]['title'] . '</a>' . " " . $row[$i]['create_date'] . str_repeat("&nbsp", 5) . $checkIsRead . '</li>';
                $html .= "</ul>";

            } // end for

            return $html;

    } // end getRows


    public function getImagesServer($url){

        include('includes/simple_html_dom.php');

        $html = file_get_html($url);
        $image = $html->find('img');

        foreach($image as $key => $img) {

            if(preg_match('/\.(jpg|png|jpeg)$/', $img->src)) {

                $img = $html->find('img', $key)->src;

                $save = file_get_contents($img);
                file_put_contents("web/uploads/img.$key.jpg", $save);

            } // end preg_match

        } // end foreach

        libxml_use_internal_errors(true);
        $source = file_get_contents($url);
        $dom = new DomDocument();
        $dom->loadHTML($source);
        $xp = new domxpath($dom);
        foreach ($xp->query("//meta[@property='og:image']") as $el) {

            $save = file_get_contents($el->getAttribute("content"));
            file_put_contents("web/uploads/img.jpg", $save);

        }

    } // end getImagesServer

    public function delete($quantity, $data) {

        for ($i = 0; $i < $quantity; $i++) {

            $sql = ("DELETE FROM content WHERE id = ?");
            $this->db->query($sql, "Param_ON", array($data[$i]));
            $this->db->getExecute();

        } // end for

    } // end delete

    public function deleteOlderthan($time_value){

        $date = date("Y-m-d H:i:s", strtotime('-'. $time_value));

        $sql = ("DELETE FROM content WHERE create_date > ?");
        $this->db->query($sql, "Param_ON", array($date));
        $this->db->getExecute();

    } // end delete_older_than

    public function insertData($url_category, $link, $title, $create_date, $is_read, $time_active_posts){

        $is_read = "no";

        $sql = "INSERT INTO content (url_category, link, title, create_date, is_read, time_active_posts) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, "Param_ON", array($url_category, $link, $title, $create_date, $is_read, $time_active_posts));

    }// end InsertData

    public function checkIdenticalData($data){

        $sql = "SELECT * FROM content WHERE title = ?";
        $this->db->query($sql, "Param_ON", array($data));
        $result = $this->db->results();

        foreach($result as $row){

            if(isset($result[0])){
                if($row['title'] == $data) {
                    return $row['title'];
                }
            }
            return false;
        } // end foreach

    } // end checkIdenticalData

    public function findId($link){

        $sql = "SELECT * FROM content WHERE link = ?";
        $this->db->query($sql, "Param_ON", array($link));
        $result = $this->db->results();

        foreach($result as $row){

            if(isset($result[0])){

                return $row['id'];

            }
            return false;
        } // end foreach

    } // end findId

    public function isRead($id){

        $is_read = "yes";

        $sql = "UPDATE content SET is_read = ? WHERE id = ?";
        return $this->db->query($sql, "Param_ON", array($is_read, $id));

    } // end isRead

    public function addIsRead($link){

        if(isset($_GET['link'])){

            if($_GET['link'] == $link){

                $id = $this->findId($link);
                $this->isRead($id);

            } // end if

        } // end if

    } // end addIsRead

    public function getSelectRemoveTime(){

        $html = "";

        $sql = "SELECT * FROM config_time_remove ORDER BY time_active_posts";
        $this->db->query($sql, "Param_OFF");
        $row = $result = $this->db->results();

        for ($i = 0; $i < count($row); $i++) {

            $html .= '<option value="' . $row[$i]['time_active_posts'] . '">' . $row[$i]['time_active_posts'] . '</option>';

        }
        return $html;

    } // end getSelectRemoveTime

    public function updateRemoveTime($select_data){

        $sql = "UPDATE content SET time_active_posts = ?";
        return $this->db->query($sql, "Param_ON", array($select_data));

    } // end updateRemoveTime

    public function sortBy($website) {

        switch ($website = $this->selector) {

            case $this->selector:

                $dataRss = new DataStoreXML();

                if(isset($_POST['pages'])) {

                    $this->getFeed($dataRss->getUrlAddress($this->selector));

                } // end if
                
            break;

        } // end switch

    } // end sortBy

    public function showSetimeRemove(){

        $sql = "SELECT * FROM content ORDER BY time_active_posts";
        $this->db->query($sql, "Param_OFF");
        $row = $result = $this->db->results();

           return $row[0]['time_active_posts'] . " dni";

    }

    public function getContent(){

        $href = substr($_SERVER["QUERY_STRING"], 5, strlen($_SERVER["QUERY_STRING"]));

        echo $this->sortBy($this->selector);
        ?>
          <div id="content_posts">
           <h3 class="title_category"><?php echo $this->selector ?></h3>
        <?php
        echo $this->getRows();
        ?>
          </div>
        <?php

        $sql = "SELECT * FROM content ORDER BY time_active_posts";
        $this->db->query($sql, "Param_OFF");
        $row = $result = $this->db->results();

        for ($i = 0; $i < count($row); $i++) {

            $this->deleteOlderthan($row[$i]['time_active_posts']);

        }

        if (isset($_GET['link'])) {

            $this->addIsRead($href);
            header("Location: $href");

        }

        if(isset($_GET['link'])) {

            $this->getImagesServer($href);

        }
       
    } // end getContent

} // end class

?>

</body>
</html>