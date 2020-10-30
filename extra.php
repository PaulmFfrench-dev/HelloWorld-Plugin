<!-- require(__DIR__. '/lib.php');
require_once("$CFG->libdir/formslib.php");
require_once("db/access.php");

$url1 = new moodle_url("http://localhost:8000/my/");
$url2 = $PAGE->url;
 -->

 <!-- <form method="post" enctype="multipart/form-data">
 <?php if (has_capability('local/helloworld:postmessages', context_system::instance())) { ?>
            <div class="form-group"> <textarea class="form-control" name="PostDescription"  rows="4" cols="100" placeholder="Type a message" value="' . s($PostDescription) . '"></textarea> </div>         
            <button type='submit' name='Submitpost'>Submit </button>
         <?php } ?>
    </form> -->
    <!-- Input of records -->
    <!-- <?php
    // if (isset($_POST["Submitpost"]) && !empty($_POST["PostDescription"])) {
    //     $User_name = $DB->get_record('user', [ 'id' => $USER->id ]);
    //     $record = new stdClass(); 
    //     $record->timecreated = time();
    //     $record->message = $_POST["PostDescription"];
    //     $record->userid = $User_name->id;
    //     require_capability('local/helloworld:viewmessages', context_system::instance());
    //         $lastinsertid = $DB->insert_record('local_helloworld_msgs', $record, false);
    // } else if(isset($_POST["Submitpost"]) && empty($_POST["PostDescription"])) {
    //     echo "Please enter some text";
    // }
    ?> -->

<!-- Display of records -->
    <!-- <div class="row">
    <?php 
        global $DB; 
        $sql = "SELECT * FROM m_user JOIN m_local_helloworld_msgs ON m_local_helloworld_msgs.userid = m_user.id";
        $usercomment = $DB->get_records_sql($sql);
        foreach ($usercomment as $User_comment) {
        $timesincepost = $User_comment->timecreated - time();
        ?>
        <div class="col-sm-4" style="padding-bottom: 10px;">
            <div class="card">
                <div class="card-header"> <?php echo $converted_name = fullname($User_comment); ?> </div>
                <div class="card-body"> <p class="card-text"><?php echo format_string($User_comment->message) ?></p> </div>
                <div class="card-footer text-muted">
                    <?php  echo format_time($timesincepost); ?>
                    <div class="float-right">
                        <?php if (has_capability('local/helloworld:deleteanymessage', context_system::instance())) { ?>
                            <form action="local/helloworld/index.php" method="post">
                                <input type="checkbox" name="Deletepost" />
                                <input type="submit" name="formSubmit" value="Delete" />
                                <input class="hidden" type="text" name="postid" value="<?php echo $User_comment->id; ?>">
                            </form>
                        <?php } ?>
                    </div>
                </div>   
            </div>               
        </div>
        <?php } ?>
        <?php 
        if(isset($_POST['Deletepost'])) {
            $usercommentid = $_POST["postid"]; 
            $DB->delete_records('local_helloworld_msgs', [ 'id' => $usercommentid ]);
        }
        ?>  
    </div> -->
    
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

    