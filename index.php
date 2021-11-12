<?php
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG, $PAGE, $OUTPUT, $DB;

$courseid = optional_param('courseid', 0, PARAM_INT);
if ($courseid > 0) {
    $path = '/local/helloworld/index.php/' . $courseid . '/';
    redirect(new \moodle_url($path));
}

// Support for Vue.js Router and its URL structure.
$paths = explode('/', $_SERVER['REQUEST_URI']);
$baseindex = array_search('index.php', $paths);
if (count($paths) > $baseindex + 1) {
    $courseid = validate_param($paths[$baseindex + 1], PARAM_INT);
}

$course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);

require_login($course, false);

$title = get_string('pluginname', 'local_helloworld');
$url = new moodle_url("/local/helloworld/index.php/$courseid");

$PAGE->set_context(context_course::instance($courseid));
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_url($url);
$PAGE->set_pagelayout('standard');

$PAGE->requires->js_call_amd('local_helloworld/app-lazy', 'init', [ 'courseid' => $course->id ]);

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_helloworld/index', []);
echo $OUTPUT->footer($course);
