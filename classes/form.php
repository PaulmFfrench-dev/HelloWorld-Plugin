<?php 
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");
 
class inputform extends moodleform {
    //Add elements to form
    public function definition() {
        if (has_capability('local/helloworld:postmessages', context_system::instance())) {
        global $CFG;
        $mform = $this->_form; // Don't forget the underscore! 
            $mform->addElement('textarea', 'text', '', 'rows="5" cols="95"'); // Add elements to your form
            $mform->setType('text', PARAM_NOTAGS);                   //Set type of element
            $mform->setDefault('text', '');        //Default value
            $mform->addElement('submit', 'submitMessage', 'Submit');
        }
    }
}

// class deleteform extends moodleform {
//     //Add elements to form
//     public function definition() {
//         if (has_capability('local/helloworld:postmessages', context_system::instance())) {
//         global $CFG;
//         $mform = $this->_form; // Don't forget the underscore! 
//         //$mform->addElement('checkbox', 'Deletepost', '');
//         $mform->addElement('text', 'text', $User_comment->id);
//         $mform->setType('text', PARAM_NOTAGS);
//         $mform->addElement('html', '<div class="float-right">');
//             $mform->addElement('submit', 'DeleteMessage', 'Delete');
//         $mform->addElement('html', '</div>');
//         }
//     }
// }


?>