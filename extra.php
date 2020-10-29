<!-- require(__DIR__. '/lib.php');
require_once("$CFG->libdir/formslib.php");
require_once("db/access.php");

$url1 = new moodle_url("http://localhost:8000/my/");
$url2 = $PAGE->url;
 -->

<!-- <div>
        /*
        //$User_name = $DB->get_record('user', [ 'id' => $USER->id ]); 
                    //$testname = $User_name->id; echo $testname;
                    //global $DB;
                    //$userfields = get_all_user_name_fields(true, 'u');

                    // $sql = "SELECT m_user.id, m_user.username
                    //           FROM m_user
                    //      RIGHT JOIN m_local_helloworld_msgs
                    //      ON m_user.id = m_local_helloworld_msgs.userid";

                    // $sql = "SELECT * FROM m_user, m_local_helloworld_msgs WHERE m_local_helloworld_msgs.userid = m_user.id";
                    // $sql = "SELECT * FROM m_user RIGHT JOIN m_local_helloworld_msgs ON m_local_helloworld_msgs.userid = m_user.id";
                    // $array = $DB->get_records_sql($sql);
                    //print_r($array);
                    
                    //echo $array[1];

                    // $id = $DB->get_records_sql($sql);
                    // $object = $array[$id]; 
                    // $User_name = $DB->get_record('user', [ 'id' => $USER->id ]);
                    // $converted_name = fullname($User_name);
                    // print_r($User_name);


                    // $sql = "SELECT * FROM m_user RIGHT JOIN m_local_helloworld_msgs ON m_local_helloworld_msgs.userid = m_user.id";
                    // $array = $DB->get_records_sql($sql);
                    // print_r($array);

                    // echo $converted_name;
        */
        <?php
            if(isset($_POST["Submit"]) && !empty($_POST["Name"])) {
                $Username = $_POST["Name"];
        ?>
        
            <h1><?php echo get_string('Hello', 'local_helloworld') .' '. format_string($Username) . '!'; ?></h1>
            <ul>
                <li><a href="<?php echo $url1; ?>"> <?php echo get_string('FrontSitePage', 'local_helloworld') ?> </a></li>
                <li><a href="<?php echo $url2; ?>"> <?php echo get_string('HelloWorldSite', 'local_helloworld') ?></a></li>
            </ul>
            <hr>
            <div>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <textarea class="form-control" id="Post" name="PostDescription"  rows="4" cols="40"><?php //echo "Type your message!" ?></textarea>
                <hr>
                <button type='button' name='Submitpost'>Submit </button>
                <hr>
            </form>
            </div>
        
        <?php }else ?>

        <?php if(empty($Username) || isset($_POST["Submit"]) && empty($Username)){
                $Username = "";
        ?>
            <h1><?php echo get_string('Hello', 'local_helloworld') . $Username . '!'; ?></h1>
            <p><?php echo get_string('YourName', 'local_helloworld') ?></p>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <?php 
                    echo html_writer::tag('input', '', [
                        'type' => 'text',
                        'name' => 'Name',
                        'placeholder' => get_string('typeyourname', 'local_helloworld'),
                    ]);
                    ?>
                    <button type="submit" name="Submit" > Submit </button>
                </div>
            </form>
        <?php } ?>
    </div> -->

    