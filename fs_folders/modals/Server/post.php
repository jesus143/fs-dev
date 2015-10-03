<?php
	include '../../../fs_folders/php_functions/Database/Database.php';
	include '../../../fs_folders/php_functions/Database/post.php'; 

	$db   = new Database();  
	$post = new Post();
    $post->mno = $_COOKIE['mno'];


    /**
    * unset none use data 
    */


    // unset($data['file_name']);
    // unset($data['file_url']);
  

    // echo "mno = $post->mno";

    /**
     * sample data en able this and allow direct access
     * src: http://localhost/fs/new_fs/alphatest/fs_folders/modals/Server/post.php
     */

      //$data = $post->sample_post();

	/**
	* convert post data json to array
	*/
 
    $data = json_decode($_POST['data'], TRUE);


    // print_r( $data );
	/**
	* result of the process iether update or create new
	*/


    if($data['action'] == 'new')
    {
         $post->create($data);
    }
    else
    {
        $post->edit($data);
    }


    /**
     *
     */


    /**
     *  get and testing the get post method
     */

     /* 
        $data = $post->get_post("slug = 'This-is-the-test'" ); 
    */
 
    /**
     * delete post if success or not 
     * $post */

    /*
        if($post->delete_post(40, 'fs_postedarticles'))
        {
            echo "successfully deleted<br>";
        }
        else
        {
            echo "failed deleted <br>";
        }
    */

?>