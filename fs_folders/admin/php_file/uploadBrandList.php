<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/8/2015
 * Time: 5:59 PM
 */
?>
<html>
<head>

    <style>

        .bl-container {
            border:1px solid red;
            height:auto;
            width:90%;
            margin: 0px auto;
            padding:20px;
            background-color:grey;
        }

        .bl-container textarea {
            width:100%;
            resize:none;
            height:200px;
        }

        .submit {
            background-color:blue;
            color:white;
            cursor:pointer
        }

        .cancel {
            background-color:red;
            color:white;
            cursor:pointer
        }

    </style>

</head>

<body>


<div class="bl-container"  >

    <form action="fs_folders/admin/php_file/uploadBrandListSave.php" method="POST" >
        <label>
            Please paste brand below and follow the format with space after comma or no is fine.
        </label>

        <br><br>
        <table>
            <tr>
                <td>
                    <select name="brand_type" onchange="change_brand_type('brand_type')" id="brand_type" >
                        <option>Select type </option>
                        <option>Brand</option>
                        <option>Topic</option>
                    </select>
                </td>
                <td>
                    <select name="brand_category_name" id="brand_category_name" >
                        <option>Select category name </option>
                        <option>Bohemian</option>
                        <option>Casual</option>
                        <option>Chic</option>
                        <option>Grunge</option>
                        <option>Menswear</option>
                        <option>Preppy</option>
                        <option>Streetwear</option>
                    </select>
                </td>
                <td>
                    <select name="topic_category_name" id="topic_category_name" style="display:none" >
                        <option>Select topic</option>
                        <option>Beauty</option>
                        <option>Entertainment</option>
                        <option>Fashion</option>
                        <option>Lifestyle</option>
                    </select>
                </td>
                <td>
                    <select name="brand_category_gender" id="brand_category_gender" >
                        <option>Select gender </option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </td>
                <td>
                    <select name="brand_show_page"  >
                        <option>Select page</option>
                        <option>Anywhere</option>
                        <option>Welcome</option>
                    </select>
                </td>
        </table>






        <!--
            <select name="brand_category_name" >
                <option>Select category name </option>
                <option>Fashion</option>
                <option>Beauty</option>
                <option>Lifestyle</option>
                <option>Entertainment</option>
            </select>
        -->





        <br><br>

        <textarea name="data" >brand1, brand2, brand3, brand4, brand5, brand6, brand7, brand8</textarea>

        <br><br>

        <input class="submit" type="submit" value="Save Brands" />

    </form>
    <input class="cancel" type="submit" value="Close"  onclick= "viewNow('clear','upload-brand-list-view')"    />

</div>

</body>

</html>
