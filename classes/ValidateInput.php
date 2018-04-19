<?php namespace MariuszAnuszkiewicz\classes\ValidateInput;

use MariuszAnuszkiewicz\classes\Data\DataStoreXml;
use MariuszAnuszkiewicz\classes\Database\DB;

class ValidateInput{

    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function process($submit, $input){
        if(isset($submit)) {
            if (empty(filter_var($this->db->escape($input), FILTER_VALIDATE_URL))) {
                return null;
            } else {
                $domain = strstr($_POST['addrss'], '.');
                $s1 = strlen($domain);
                $prepare_str = substr($domain, 1, $s1);
                $new_str = strstr($prepare_str, '.');

                $length_correct = strlen($new_str);
                $full_str = strlen($domain);

                $cut_str = ($full_str - $length_correct);
                $input_before = substr($domain, 1, $cut_str - 1);
                $input_part = substr($domain, 2, $cut_str - 2);

                $first_letter = strtoupper(substr($input_before,0, 1));
                $input_complete = $first_letter.$input_part;

                $dataRss = new DataStoreXML();
                $dataRss->addNewRSS($input_complete, filter_var($this->db->escape($input), FILTER_VALIDATE_URL), date('Y-m-d H:i:s'), "no");
            }
        }
    }
}
