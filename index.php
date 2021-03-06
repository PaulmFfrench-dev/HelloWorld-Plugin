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

require_once(__DIR__. '/../../config.php');
require_once(__DIR__ . '/classes/form.php');

$inputform = optional_param('text', 0, PARAM_TEXT);
//$deleteform = optional_param('submit', 0, PARAM_INT);

$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/helloworld/index.php'));
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string('pluginname', 'local_helloworld'));
$PAGE->set_heading(get_string('pluginname', 'local_helloworld'));

require_login();
if (isguestuser()) {
    print_error('noguest');
}

echo $OUTPUT->header();
$mform = new inputform();
$mform->display();

//$deleteform = new deleteform();

if(!empty($inputform)) {
    $User_name = $DB->get_record('user', [ 'id' => $USER->id ]);
    $record = new stdClass(); 
    $record->timecreated = time();
    $record->message = $inputform;
    $record->userid = $User_name->id;
    require_capability('local/helloworld:viewmessages', context_system::instance());
    $lastinsertid = $DB->insert_record('local_helloworld_msgs', $record, false);
}
?>
<div class="row">
    <?php
    $sql = "SELECT * FROM m_user JOIN m_local_helloworld_msgs ON m_local_helloworld_msgs.userid = m_user.id";
    $usercomment = $DB->get_records_sql($sql);
    foreach ($usercomment as $User_comment) {
    $timesincepost = $User_comment->timecreated - time();
    ?>
    <div class="col-sm-4" style="padding-bottom: 10px;">
        <div class="card">
            <div class="card-header"> <?php echo $converted_name = fullname($User_comment); ?> </div>
            <div class="card-body"> <p class="card-text"><?php echo format_string($User_comment->message) ?></p> </div>
            <div class="card-footer text-muted"> <?php  echo format_time($timesincepost); ?>
                <div class="float-right">
                    <?php if (has_capability('local/helloworld:deleteanymessage', context_system::instance())) { ?>
                        <form action="index.php" method="post">
                            <input type="checkbox" name="Deletepost" />
                            <input type="submit" name="formSubmit" value="Delete" />
                            <input class="hidden" type="text" name="postid" value="<?php echo $User_comment->id; ?>">
                        </form>
                    <?php } ?>
                </div>
            </div>   
        </div>               
    </div>
    <?php } 
    if(isset($_POST['Deletepost'])) {
        $usercommentid = $_POST["postid"]; 
        $DB->delete_records('local_helloworld_msgs', [ 'id' => $usercommentid ]);
    } 
    ?>
</div>
    
<?php echo $OUTPUT->footer(); ?>

