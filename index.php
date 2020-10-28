<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.
//
/**
 * This is a one-line short description of the file.
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_mymodule
 * @category   backup
 * @copyright  2008 Kim Bloggs
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__. '/../../config.php');
require(__DIR__. '/lib.php');
require_once("$CFG->libdir/formslib.php");
//require_once("db/access.php");

//set redirect
$PAGE->set_url(new moodle_url('/local/helloworld/index.php'));
$url1 = new moodle_url("http://localhost:8000/my/");
$url2 = $PAGE->url;

$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_helloworld'));
$PAGE->set_heading(get_string('pluginname', 'local_helloworld'));
$PAGE->set_pagelayout('standard');

require_login();
// if (isguestuser()) {
//     print_error('noguest');
// }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $OUTPUT->header(); ?>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <?php 
        global $DB;
        $context = context_system::instance();
        if (!has_capability('local/helloworld:postmessages', context_system::instance())) {
        ?>
        <div class="form-group">
            <textarea class="form-control" name="PostDescription"  rows="4" cols="100" placeholder="Type a message" value="' . s($PostDescription) . '"></textarea>
        </div>         
        <button type='submit' name='Submitpost'>Submit </button>   
        <?php }else{echo "hello"; } ?>  
    </form>
    <?php
    if (isset($_POST["Submitpost"]) && !empty($_POST["PostDescription"])) {
        $message = $_POST["PostDescription"];
        $timenow = new DateTime('now'); 
        $timecreated = time($timenow);

        $User_name = $DB->get_record('user', [ 'id' => $USER->id ]);
        $testname = $User_name->id;
        //$converted_name = fullname($User_name);

        global $DB;
        $record = new stdClass(); 
        $record->timecreated = $timecreated;
        $record->message = $message;
       // $record->userid = $testname;
        //$record->username = $converted_name;
        $lastinsertid = $DB->insert_record('local_helloworld_msgs', $record, false);
    } else if(isset($_POST["Submitpost"]) && empty($_POST["PostDescription"])) {
        echo "Please enter some text";
    }
    ?>
    <div class="row">
        <?php 
            global $DB; 
            $record_count = $DB->count_records_sql("SELECT COUNT(id) FROM m_local_helloworld_msgs");
            for ($i=0; $i <= $record_count; $i++){ 
                $usercomment = $DB->get_records('local_helloworld_msgs', [ 'id' => $i ]);
                foreach ($usercomment as $User_comment) {
                    $time    =  $User_comment->timecreated;
                    $message =  $User_comment->message;
           // $name_user =  $User_comment->username;
            ?>
            <div class="col-sm-4" style="padding-bottom: 10px;">
                <div class="card">
                    <div class="card-header"><?php 
                    //$User_name = $DB->get_record('user', [ 'id' => $USER->id ]); 
                    //$testname = $User_name->id; echo $testname;
                    global $DB;
                    //$userfields = get_all_user_name_fields(true, 'u');

                    // $sql = "SELECT m_user.id, m_user.username
                    //           FROM m_user
                    //      RIGHT JOIN m_local_helloworld_msgs
                    //      ON m_user.id = m_local_helloworld_msgs.userid";

                    $sql = "SELECT * FROM m_user, m_local_helloworld_msgs WHERE m_local_helloworld_msgs.userid = m_user.id";
                    $array = $DB->get_records_sql($sql);
                    //print_r($recordstest);
                    //echo $array[1];
                    // $object = (object) $array;
                    //print_r($object);
                    $converted_name = fullname($array[1]);
                    echo $converted_name;
                    
                    ?> 
                    <hr>
                    <?php 
                    $User_name = $DB->get_record('user', [ 'id' => $USER->id ]);
                    $converted_name = fullname($User_name);
                    print_r($User_name);
                    // echo $converted_name;
                    ?>
                     </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo format_string($message) ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <?php
                            $timeposted = $time;
                            $currenttime = new DateTime('now'); 
                            $timesincepost = time($currenttime) - $time;
                            echo format_time($timesincepost)
                        ?>
                    </div>   
                </div>               
            </div>
        <?php } } ?>  
    </div>






    <!-- <div>
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
    
<?php echo $OUTPUT->footer(); ?>

