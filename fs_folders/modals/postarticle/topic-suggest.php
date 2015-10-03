<?php

     $category = (!empty($_GET['search']))? $_GET['search'] : 'beauty';
     $category = strtolower($category);

//    echo  ' category = ' . $category . '<br><br>';

    $response = TRUE;
    echo "--------------------- $category <br>";

    if($category == 'beauty') {
        $topics = array('conference1', 'conf1', 'love1', 'music1');
    } elseif($category == 'beauty') {
        $topics = array('conference2', 'conf2', 'love2', 'music2');
    } elseif($category == 'entertainment') {
        $topics = array('conference3', 'conf3', 'love3', 'music3');
    } elseif($category == 'fashion') {
        $topics = array('conference4', 'conf4', 'love4', 'music4');
    } elseif($category == 'lifestyle') {
        $topics = array('conference5', 'conf5', 'love5', 'music5');
    } else {
        $topics = array('');
    }
?>


    <table border="0" cellpadding="0" cellspacing="0" style="margin-left: -16px;width: 280px !important;" >
        <tbody>
            <?php foreach($topics as $key => $val): ?>
                </tr><tr> <td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-occasion' , occasion , '<?php echo $val; ?>, ' , '1' )"><?php echo $val; ?></td>
            <?php endforeach; ?>
        </tbody>
    </table>
