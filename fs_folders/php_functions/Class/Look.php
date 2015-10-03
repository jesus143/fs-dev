<?php

class Look{

    private $mno = 0;
    private $plno = 0;
    private $where = '';
    private $select = 'plno';
    private $order  = '';
    private $limit = 24;
    private $table = 'postedlooks';

    function __construct($mno, $db) {
        $this->mno = $mno;
        $this->db  = $db;
    }

    /**
     * @param $gender
     * @param $plusBlogger
     * @param $style
     * @param $orderBy
     * @param $get
     * @param int $limit
     * @return array
     * Rate look sorting starts here
     */
    public function ratingSort(
        $gender,
        $plusBlogger,
        $style,
        $orderBy,
        $get,
        $limit
    ) {

        /** Set data */

        if($gender != 'Men Plus Women') {
            $this->where .= $this->setGender($gender);
        }

        if($plusBlogger != 'All Blogger') {
            $this->where .= $this->setPlusBlogger($plusBlogger);
        }

        if($style != 'All Style') {
            $this->where .= $this->setStyle($style);
        }
        $this->order .= $this->setLatest($orderBy);

        $this->limit  = $limit;

        echo "<br>";
        echo "where =  " . $this->where . '<br>';
        echo "order =  " . $this->order . '<br>';
        print_r($this->limit );
        echo "<br>limit at the top <br>";




        /** Retrieved data */
        $looks        = $this->getLookStatus();
        $ratings      = $this->getRatings($get);

        /** Return data and calculate status */
        return $this->finalizeResponse($looks,$ratings, $get);





    }

    /**
     * @return mixed
     * Retrieve looks that are fit with the sorting like where gender = 'male' and style = 'Stretwear' and plus_blogger = 'Yes'
     * order by bla....
     */
    private function getLookStatus(){
        $this->db->select('postedlooks', $this->select, null, $this->where, $this->order, $this->limit['base']);
        return $this->db->getResult();
    }

    /**
     * @param $looks
     * @param $ratings
     * @param $get
     * @return array
     * Finalize both response of the other table like fs_favorite_modals, fs_rate_modals, ..... and postedlooks.
     * So here we fetch if the favorited or rated or unrated
     */
    private  function finalizeResponse($looks, $ratings, $get) {

        $response = array();
        $c  = 0;
        $c1 = 0;
        $rated = false;

     echo "looks ";
       print_r($looks);

       echo "rating";
        print_r($ratings);

       echo "get $get
        <br>";

        if($get == 'Rated' || $get == 'Favorited') {
            for($i=0; $i < count($looks); $i++ ) {
                $plno = $looks[$i]['plno'];
                foreach ($ratings as $key => $val) {
                    //check if plno is in rated or not rated
                    if (in_array($plno, $val)) {
                        //add filter of limit ex: start = 0, end = 5
                        // echo "$c1 >= " . $this->limit['start'] . ' and ' . $c1 . ' < ' . $this->limit['end'] . ' \n';
                        $c1++;
                        if($c1 >= $this->limit['start'] and $c1 <= $this->limit['end']) {
                            echo "if ";
                            $response[$c]['plno'] = $plno;
                            $response[$c]['stat'] = $get;
                            $c++;
                            break;
                        }
                    }
                }
            }
            return $response;
        }
        else if ($get == 'Unrated') {
            for($i=0; $i < count($looks); $i++ ) {
                $plno = $looks[$i]['plno'];
                foreach ($ratings as $key => $val) {
                    if (in_array($plno, $val)) {
                        $rated = true;
                    }
                }
                if($rated == false) {
                    $c1++;
                    if($c1 >= $this->limit['start'] and $c1 <= $this->limit['end']) {
                        $response[$c]['plno'] = $plno;
                        $response[$c]['stat'] = $get;
                        $c++;
                    }
                } else {
                    $rated = false;
                }
            }
            return $response;
        } else {
        }
    }

    /**
     * @param $gender
     * @return string
     * This is to set the gender as function
     * male or female
     */
    private function setGender($gender)
    {
        $where = "postedlooks.gender = '$gender'";
        return $where;
    }

    /**
     * @param $plusBlogger
     * @return string
     * This is to set if the pluss blogger is Yes or No
     */
    private function setPlusBlogger ($plusBlogger)
    {
        $where = ' and ';
        $where .= "postedlooks.plus_blogger = '$plusBlogger'";
        return $where;
    }

    /**
     * @param $style
     * @return string
     * This is to set style like style = 'Streetwear'
     */
    private function setStyle($style)
    {
        $where = ' and ';
        $where .= "postedlooks.style = '$style' ";
        return $where;
    }

    /**
     * @param $orderBy
     * @return string
     * Array value which is row => is the row of the table posted looks and order by is the desc or asc
     */
    private function setLatest($orderBy)
    {
        $order = "postedlooks.".$orderBy['row'] . ' ' . $orderBy['orderBy'];
        return $order;
    }

    /**
     * @param $rating
     * @return int
     * Unrated and Rated is together the data is retrieved from 1 table and the Favorited is retrieved from another table.
     */
    private function getRatings($rating)
    {
        // print_r($response);

        if($rating == 'Unrated' || $rating == 'Rated') {
            $this->db->select('fs_rate_modals', 'table_id', null, "mno = $this->mno and table_name = 'postedlooks'");
            return $this->db->getResult();
        } else if($rating == 'Favorited') {
            $this->db->select('fs_favorite_modals', 'table_id', null, "mno = $this->mno and table_name = 'postedlooks'");
            return $this->db->getResult();
        } else {
        }
        return 0;
    }


    /**
     * @param $style
     * @param $limitFrom
     * @param $limitTo
     * @return mixed
     */
    public function getLookByStyle($style,$limitFrom,$limitTo) {
        $this->db->select('postedlooks', 'table_id', null, "mno = $this->mno and style = '$style'");
        return $this->db->getResult();
    }


    public function latestShared() {
        $response = select_v3($this->table, '*', "plno > 0 order by plno desc limit 1");
        return (!empty($response[0]['plno'])) ? $response[0]['plno'] : 0;
    }


    public function latestRate() {
        $response = select_v3($this->table, '*', "plno > 0 order by pltvotes desc limit 1");
        return (!empty($response[0]['plno'])) ? $response[0]['plno'] : 0;
    }


    public function Top($category) {
        $response = select_v3($this->table, '*', "plno > 0  and style = '$category' order by plno desc limit 1");
        return (!empty($response[0]['plno'])) ? $response[0]['plno'] : 0;
    }

    public function sourceCategoryDropDown($plno){
        if($plno > 0) {
            $src = "fs_folders/images/uploads/posted looks/home/$plno.jpg";
            if(!file_exists($src)){
                //echo "not exist $plno ";
                $src = "fs_folders/images/uploads/posted looks/home/default.jpg";
            } else {
                //echo "exist $plno ";
            }
        } else {
            //echo "no look for category $plno ";
            $src = "fs_folders/images/uploads/posted looks/home/default.jpg";
        }
        return $src;
    }

    public function overAllRating($mno) {
        //count all the pltvotes in article page
        // where mno = $mno
        // return the total sum of the article query
        $this->db->select($this->table, 'sum(pltvotes) as tlikes');
        $data = $this->db->getResult();
        return $data[0]['tlikes'];
    }

    public function position($plno, $style,  $mno) {
        $position = 0;
//        $response = select_v3($this->table, '*', "mno = $mno and style = '$style' order by plno desc");
        $response = select_v3($this->table, '*', "mno = $mno order by plno desc");
        for($i=0; $i<count($response); $i++) {
            if($response[$i]['plno'] == $plno) {
                $position = $i+1;
            }
        }
        return $position;
    }

    public function totalUploaded($style, $mno) {
//      $response = select_v3($this->table, 'count(*) as total', "mno = $mno and style = '$style'  order by plno desc");
        $response = select_v3($this->table, 'count(*) as total', "mno = $mno order by plno desc");
        // print_r($response);
        return $response[0]['total'];
    }
}