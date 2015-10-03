<?php

use app\Brand;

class User {

    private $mno = 0;
    private $db = '';
    public  $post_look_agree = 0;
    private $table = 'fs_members';

    /**
     * @param $mno
     */
    function __construct($mno, $db)
    {
        $this->mno = $mno;
        $this->db  = $db;
    }

    /**
     * @param $newEmail
     * @return int
     * 1 = successfully updated
     * 0 = failed to update
     * 2 = email is not exist
     */
    public function updateEmail($newEmail)
    {

        // check if email exist
        $this->db->select('fs_member_accounts', '*', null, "email = '$newEmail'");

        // if email not exist then update the specific email by mno fs_members_account
        // and update the fs_members email
        if(!$this->db->getTotalRes()) {

            //Update the email in the account
            if($this->db->update('fs_member_accounts', array('email' => $newEmail), "mno = " . $this->mno )){

                $this->db->update('fs_members', array('identity_email' => $newEmail), "mno = " . $this->mno );

                return 1;

            } else {

                return 0;
            }

        } else {

            return 2;
        }
    }

    /**
     * @param $newPassword
     * @return int
     * Change password
     */
    public function updatePassword($newPassword)
    {

        // save password to fs_members
        if($this->db->update('fs_members', array('identity_login' => $newPassword), "mno = " . $this->mno )) {

            // encrypt new password
            $newPassword = $this->encrypt_password($newPassword);

            // save password to fs_member_accounts
            if($this->db->update('fs_member_accounts', array('pass' => $newPassword), "mno = " . $this->mno )) {

                //success all the updates
                return 1;
            } else {

                // failed to update fs_members fs_member_accounts.pass
                return 2;
            }

        } else {

            // failed to update fs_members fs_members.identity_login
            return 0;
        }
    }

    /**
     * @param $newGender
     * @return bool
     * Update specific gender of the users fs_members.gender
     */
    public function updateGender($newGender)
    {
        if ($this->db->update('fs_members', array('gender' => $newGender), "mno = " . $this->mno)) {

            //gender updated
            return TRUE;

        } else {

            return FALSE;
        }
    }


    public function updatePreferredStyle($newPreferredStyle)
    {
    }


    /**
     * @param $newPreferredTopic
     * @param $test
     * @param $daw
     * @param $naker
     */
    public function updatePreferredTopic($newPreferredTopic, $test, $daw, $naker)
    {
    }


    /**
     * @param array $newInfoArray
     * @param $where
     * @return mixed
     */
    public function updateInfo($newInfoArray=array(), $where) {
        $bool = $this->db->update(
            $this->table,
            $newInfoArray,
            $where
        );

        return $bool;
    }

    /**
     * @return bool
     * Set account as deactivated
     */
    public function deActivateAccount()
    {
        if ($this->db->update('fs_members', array('status' => 10), "mno = " . $this->mno)) {

            //gender updated
            return TRUE;

        } else {

            return FALSE;
        }
    }

    /**
     * @param $password
     * @param $email
     * @return bool
     * To validate iether the password and email matched
     */
    public function validatePasswordAndEmail($password, $email)
    {

        echo "validatePasswordAndEmail($password, $email)";
        //encrypt password
        $password = $this->encrypt_password($password);

        //check if db pass and input pass matched
        $this->db->select('fs_member_accounts', 'mno', null, "email = '$email' and pass = '$password'" );
        return ($this->db->getTotalRes()==0) ? FALSE : TRUE;

    }

    /**
     * @param $pass
     * @param $x
     * @return string
     * encrypt password
     */
    public function encrypt_password($pass , $x=1000)
    {
        for ($i=0; $i < $x ; $i++) {
            $pass = md5($pass);
        }
        return $pass;
    }

    /**
     * @return mixed
     * return info of the user
     */
    public function getInfo()
    {
        $this->db->select('fs_members', '*', null, "mno = " . $this->mno);
        return $this->db->getResult();
    }

    /**
     * @return mixed
     * return the account info of the user
     */
    public function getAccount()
    {
        $this->db->select('fs_member_accounts', '*', null, "mno = " . $this->mno);
        return $this->db->getResult();
    }

    /**
     * @return bool
     * check if email is being confirmed or not yet.
     * status = 0 -> email is not yet verified
     * status = 1 -> email is verified
     */
    public  function emailConfirmationStatus()
    {
        $this->db->select('fs_members', 'status', NULL, 'mno = ' . $this->mno);

        //echo " status = " . print_r($this->db->getResult());
        if(!empty($this->db->getResult()[0]['status'])){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * @param $blogger_type
     * @return mixed
     * This is to update the fs_members.plus_blogger
     */
    public function updateBloggerType($blogger_type)
    {

        return $this->db->update('fs_members', array('plus_blogger'=>$blogger_type), 'mno = ' . $this->mno);

    }

    /**
     * @return mixed
     */
    public function getMyInfo(){
        $this->db->select('fs_members', '*', NULL, 'mno = ' . $this->mno);
        $data = $this->db->getResult();
        $this->post_look_agree = $data[0]['post_look_agree'];
        return $data ;
    }

    public function brand() {

        $brand = new Brand($this->db, $this->mno);

        return $brand->WhereIn($brand->category('','','','brand'));

    }

    public function topic() {
        $brand = new Brand($this->db, $this->mno);
        return $brand->WhereIn($brand->category('','','','topic'));
    }


    public function selectedBrand() {

    }

    public function selectedTopic() {

    }


}









