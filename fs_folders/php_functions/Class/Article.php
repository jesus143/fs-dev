<?php
namespace App;

class Article{
    private $db = 0;
    private $mno = 0;
    private $table = 'fs_postedarticles';
    function __construct($db, $mno) {
        $this->db = $db;
        $this->mno = $mno;
    }



    public function latestShared() {
       $response = select_v3($this->table, '*', "artno > 0 order by artno desc limit 1");
       return (!empty($response[0]['artno'])) ? $response[0]['artno'] : 0;
    }

    public function latestRead() {
        $response = select_v3($this->table, '*', "artno > 0 order by pltvotes desc limit 1");
        return (!empty($response[0]['artno'])) ? $response[0]['artno'] : 0;
    }

   public function overAllRating($mno) {
       //count all the pltvotes in article page
       // where mno = $mno
       // return the total sum of the article query
       $this->db->select($this->table, 'sum(pltvotes) as tlikes');
       $data = $this->db->getResult();
       return $data[0]['tlikes'];
   }

    public function recentUploaded($category, $limit=8){
        $response = select_v3($this->table, '*', "artno > 0 and category = '$category'  order by artno desc limit " . $limit);
        return $response;
    }

    public function sourceCategoryDropDown($artno){
        if($artno > 0) {
            $src = "fs_folders/images/uploads/posted articles/home/$artno.jpg";
            if(!file_exists($src)){
                //echo "not exist $plno ";
                $src = "fs_folders/images/uploads/posted articles/home/default.jpg";
            }
        } else {
            //echo "no look for category $plno ";
            $src = "fs_folders/images/uploads/posted articles/home/default.jpg";
        }
        return $src;
    }

    public function position($artno, $category,  $mno) {
        $position = 0;
        //$response = select_v3($this->table, '*', "mno = $mno and category = '$category'  order by artno desc");
        $response = select_v3($this->table, '*', "mno = $mno order by artno desc");
        for($i=0; $i<count($response); $i++) {
            if($response[$i]['artno'] == $artno) {
                $position = $i+1;
            }
        }
        return $position;
    }

    public function totalUploaded($category,  $mno) {
        //$response = select_v3($this->table, 'count(*) as total', "mno = $mno and category = '$category'  order by artno desc");
        $response = select_v3($this->table, 'count(*) as total', "mno = $mno order by artno desc");
        // print_r($response);
        return $response[0]['total'];
    }
}