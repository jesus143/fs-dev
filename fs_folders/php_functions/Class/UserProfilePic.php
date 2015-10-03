<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/24/2015
 * Time: 3:42 PM
 */

namespace App;


class UserProfilePic  {
    private $mno = 0;
    private $db = '';
    private $table = 'fs_member_profile_pic';


    function __construct($mno, $db) {
        $this->mno = $mno;
        $this->db  = $db;
    }


    public function profileComplete(){
        $response = select_v3($this->table, '*', " mno = $this->mno order by mppno desc limit 1");
        return (!empty($response[0]['mppno'])) ? $response[0]['mppno'] : 0;
    }

}