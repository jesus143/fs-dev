<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/10/2015
 * Time: 12:11 PM
 */

namespace app;

class Brand {

    private $db = 0;
    private $mno = 0;
    private $table = 'fs_brands';
    private $table1 = 'fs_brand_member_selected';


    function __construct($db, $mno) {
        $this->db = $db;
        $this->mno = $mno;
    }


    /**
     * @param null $bno
     * @param null $bcno
     * @param null $visible
     * @return mixed
     */
    public function brand($bno=NULL, $bcno=NULL, $visible=NULL, $page=NULL, $bname=NULL, $order='bno desc', $limit=100) {

        $and = '';
        $where = '';

        if(!empty($bno)) {
            $where .= " bno = $bno ";
            $and    = " and ";
        }

        if(!empty($bcno)) {

            if(is_array($bcno)) {
                $ids = '';
                for($i=0; $i<count($bcno); $i++){
                    $ids .= '' . $bcno[$i]['bcno'];
                    if($i < count($bcno)-1){
                        $ids .= ',';
                    }
                }

                // echo "bcno no ids =  $ids<br>";

                $where .= " $and bcno in($ids)";
                $and    = " and ";
            } else {
                $where .= " $and bcno = $bcno";
                $and    = " and ";
            }
        }

        if(!empty($visible)) {
            $where  .= " $and visible = $visible";
            $and    = " and ";
        }

        if(!empty($page)) {
            $where  .= " $and page = '$page'";
            $and    = " and ";
        }

        if(!empty($bname)) {
            $where  .= " $and bname = '$bname'";
            $and    = " and ";
        }

        //echo "where  $where ";
        $this->db->select('fs_brands', '*', '',  $where, $order, $limit);
        return $this->db->getResult();
    }

    public function category($bcno=NULL, $bc_name=NULL, $gender=NULL, $type=NULL, $order='bcno desc', $limit=100) {
        $and = '';
        $where = '';
       // echo "category($bcno=NULL, $bc_name=NULL, $gender=NULL, $type=NULL, $order='bcno desc', $limit=100) <br>";

        if(!empty($bcno)) {
            $where .= " bcno = $bcno ";
            $and    = " and ";
        }

        if(!empty($bc_name)) {
            $where .= " $and bc_name = '$bc_name' ";
            $and    = " and ";
        }

        if(!empty($gender)) {

            echo "category.gender = $gender<br>";
            $where .= " $and gender = '$gender' ";
            $and    = " and ";
        }

        if(!empty($type)) {
            $where .= " $and type = '$type' ";
            $and    = " and ";
        }

        //echo "where  $where <br><br>";
        $this->db->select('fs_brand_category', '*', '',  $where, $order, $limit);
        return $this->db->getResult();
    }

    public function Save($brand=NULL) {

        $bool = false;
        // echo $brand;
        $brand1 = explode('-',$brand);

       // print_r($brand1);

        foreach($brand1 as $bno) {
            if(!empty($bno)){
                print($bno . "\n");

                /**
                 * check if exist
                 * if not then insert to fs_records.fs_brand_category_selected
                 * else ignore
                 */
                 if(!select_v3('fs_brand_member_selected', '*', "mno = $this->mno and bno = $bno")){
                    if($this->db->insert('fs_brand_member_selected', array('mno'=>$this->mno, 'bno'=> $bno))){
                        echo "inserted<br>";

                        $bool = true;

                    } else {
                        echo "failed to insert<br>";
                    }
                 } else {
                    echo "exist<br>";
                 }
            }
        }
        return  $bool;
    }

    public function WhereIn($bcno){
        $where = '';
        $and = '';
        if(!empty($bcno)) {

            if(is_array($bcno)) {
                $ids = '';
                for($i=0; $i<count($bcno); $i++){
                    $ids .= '' . $bcno[$i]['bcno'];
                    if($i < count($bcno)-1){
                        $ids .= ',';
                    }
                }
                // echo "bcno no ids =  $ids<br>";
                $where .= " $and bcno in($ids)";
            } else {
                $where .= " $and bcno = $bcno";
                $and    = " and ";
            }
        }

        return $where;
    }


}