<?php   @session_start();
	class Post extends Database
	{


        private $article_table = 'fs_postedarticles';


        /**
         * This is the table attribute to be inserted
         * @var string
         */

		private $table = 'fs_post_attribute';

        /**
         * Default variable for date time
         * @var bool|string
         */

        private $date_time = '';

        /**
         * Used for universal id
         * @var int
         */

        public $mno = 0;

        /**
         * table id is the id used in general function saved in activity, fs_post_attribute and its from postedlooks, fs_postedarticles and
         * fs_postedmedia
         * @var int
         */

        private $table_id = 0;

        /**
         * table name is used in general function saved in activity, fs_post_attribute and its from postedlooks, fs_postedarticles and
         * fs_postedmedia
         * @var string
         */

        private $table_name = '';

        /**
         * construct
         */

        function __construct()
		{
            if($this->connect())
            {
				// echo "connected ";
            }
            else
            {
				// ho "not connected";
            }
            // echo "This is is ";
            $this->date_time = date("Y-m-d H:i:s");
		}

        /**
         * create new post and new attribute of the the post
         * @param $data
         */

        public function create($data)
        {
            $this->table_name = $data['table_name'];
            $this->table_id = $data['table_id'];
            $exist = FALSE;

            /**
             * unset session action
             * purpose is to make the saving not affected or failed because action is not in the table fs_post_attribute
             */

            unset($data['action']);

            /**
             *  get the latest id uploaded of the user by the table provided
             * ex: fs_postedarticles and etc..
             */

            $this->table_id = $this->get_id($this->table_name);

            /**
             * get data attribute by table name and table id
             */

            $dataDb = $this->selectV1($this->table, "*", "table_id = $this->table_id and table_name = '$this->table_name'");

            /**
             * validate if the data is already in the database
             */

            if (!empty($dataDb)) 
            {  

                $description = (!empty($dataDb[0]['description'])) ? $dataDb[0]['description'] : '' ;
                $title = (!empty($dataDb[0]['title'])) ? $dataDb[0]['title'] : '' ;

                if ($data['description'] == $description  and $data['title'] == $title)
                {
                    $data['table_id'] = $this->table_id;
                    $exist = TRUE;
                    // echo "user not posting for the first time";
                }
                else
                {
                    // echo "User post for the first time";
                }
            }

            /**
            * add or update data
            */



            if($exist == FALSE)
            { 
                $this->add($data);
            }
            else
            { 
                $this->update_now($data);
            }
            /**/
		}

        /**
         * edit is just to update the attribute of the post
         * require table_id and table_name and other attribute
         * @param $data
         */

        public function edit($data)
		{
			/**
        	* unset session action 
        	* purpose is to make the saving not affected or failed because action is not in the table
        	*/

        	unset($data['action']);

        	/**
        	* update data
        	*/

		    $this->update_now($data);
		}

        /**
         * adding new post and post attribute
         * @param $data
         */

		public function add($data)
		{
            /**
             * insert to a new post
             */

            $data['table_id'] = $this->add_new_post($data);

            /**
             * iniitialized the table id and table name for dynamic uses
             */

            $this->table_id = $data['table_id'];
            $this->table_name = $data['table_name'];

            /**
             * insert activity 
             */

            if($this->add_new_activity($this->activity_data()))
            {
                // echo "activity data inserted<br>";
            }
            else
            {
                // echo "activity data failed<br>";
            }

            /**
             * insert to a new attribute for post
             */

			if($this->insert($this->table, $data))
            {
                echo json_encode(array('message'=>'Successfully inserted', 'success'=>1));
            }
            else
            {
                echo json_encode(array('message'=>'Failed to inserted', 'success'=>0));
            } 
		}

        /**
         * update the post attribute
         * @param $data
         */
        public function update_now($data)
		{
            /**
             * initialized the table id and table name for dynamic uses
             */

            $this->table_id = $data['table_id'];
            $this->table_name = $data['table_name'];

            /**
             * update data
             */

			if($this->update($this->table, $data, "table_id = $this->table_id and table_name = '$this->table_name'"))
            {
                echo json_encode(array('message'=>'Successfully updated', 'success'=>1));
            }
            else
            {
                echo json_encode(array('message'=>'Failed to update', 'success'=>0));
            }
		}

        /**
         * get post id with this is the latest post of the user user.
         * requirement: mno and table name
         * @param $table_name
         * @return mixed
         */

        public function get_id($table_name)
        {
            if($table_name == 'fs_postedarticles')
            {
                $user = $this->selectV1($table_name, "*", "mno = $this->mno order by artno desc limit 1");
                $id = (!empty($user[0]['artno']))? $user[0]['artno'] : '';
            }
            else if ($table_name == "fs_postedmedia")
            {
                $user = $this->selectV1($table_name, "*", "mno = $this->mno order by media_id desc limit 1");
                $id = (!empty($user[0]['media_id']))? $user[0]['media_id'] : '';
            }
            else
            {
                $user = $this->selectV1($table_name, "*", "mno = $this->mno order by plno desc limit 1");
                $id = (!empty($user[0]['plno']))? $user[0]['plno'] : '';
            }
            return $id;
        }

        /**
         * this is to add post ex: postalooks, fs_postedarticles and fs_postedmedia
         * @return bool
         */

        public function add_new_post($data)
        { 
            $type = (!empty($_SESSION['source_item'])) ? null : 'image'; 

            if ($data['table_name'] == 'fs_postedarticles')
            {
                $array = array(
                    'mno' => $this->mno,  
                    'title'=>$data['title'],  
                    'description'=>$data['description'],  
                    'keyword'=>$data['keyword'],
                    'category'=>$data['category'],
                    'topic'=>$data['topic'],
                    'source_url'=>$_SESSION['source_url'],
                    'source_item'=>$_SESSION['source_item'],
                    'type'=>$type,
                    'extention'=>'',
                    'tfavorite'=>0,
                    'tdrip'=>0,
                    'tshare'=>0,
                    'tcomment'=>0,
                    'trating'=>0,
                    'tpercentage'=>0,
                    'tview' =>0, 
                    'date' => $this->date_time, 
                );  
                // $idName = "artno";
            }
            elseif ($data['table_name'] == "fs_postedmedia")
            {
                $array = array(
                    'mno' => $this->mno,
                    'media_dateuploaded' => $this->date_time
                );
                // $idName = "media_id";
            }
            else
            {
                $array = array(
                    'mno' => $this->mno,
                    'pludate' => $this->date_time
                );

                // $idName = "plno";
            } 

            /** unset session from video */ 

            unset($_SESSION['source_item']); 
            unset($_SESSION['source_url']); 

            // echo "id $idName <br>"; 

            if($this->insert($data['table_name'], $array))
            { 
                /**
                 * return the posted data inserted specially the id
                 */ 
                $posted = $this->getResult();
                return $posted[0];
            }
            else
            {
                // echo "new post not inserted<br>";
                return 0;
            } 
        }

        /**
         * adding new activity
         * @param $data
         * @return bool
         */

        public function add_new_activity($data)
        {
            return $this->insert('activity', $data);
        }
 


        /**
         * sample activity for post
         * @return array
         */

        public function sample_post()
        {
            $data  = array(
                'title'=>'this is the title 2',
                'description'=>'this is the desc',
                'category'=>'this is the category',
                'keyword'=>'this is the keyword',
                'slug'=>'this is the slug',
                'meta_description'=>'this is desc',
                'table_id'=>1,
                'table_name'=>'fs_postedarticles',
                'file_path'=>'upload/googlec/folder',
                'file_name'=>'file-name-here.jpg',
                'action'=>'new',
                'alt'=>'This is the image title',
                'topic'=>'this is the topic'
            );
            return $data;
        }

        /**
         * sample data for activity
         * @return array
         */

        public function sample_activity()
        {
            $data = array(
                'mno'=>133,
                'action'=>'Posted',
                '_table'=>'fs_postedarticles',
                '_table_id'=>1,
                '_date'=>$this->date_time,
                'active'=>1
            );
            return $data;
        }

        /**
         * data for activity
         * @return array
         */

        public function activity_data()
        {
            $data = array(
                'mno'=>$this->mno,
                'action'=>'Posted',
                '_table'=>$this->table_name,
                '_table_id'=>$this->table_id,
                '_date'=>$this->date_time,
                'active'=>1
            );
            return $data;
        }

        /**
         * This is to get the post with dynamic where function
         * @param $where
         * @return array|bool
         */

        public function get_post($where)
        {
            $this->select($this->table, '*', '', $where);  
            return $this->getResult(); 
            // eturn $this->selectV1($this->table, '*', $where);
        } 

        /**
         * This is to get the post with dynamic where function
         * @param $where
         * @return array|bool
         */

        public function get_file()
        { 
            
        }



        /**
         * delete by table id (fk) and table name
         * @return bool
         */

        public function delete_post($table_id, $table_name)
        {
            return $this->delete($this->table, "table_id = $table_id and table_name = '$table_name'" , null);
        }
    }
?>