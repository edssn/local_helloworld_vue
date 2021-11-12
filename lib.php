<?php

defined('MOODLE_INTERNAL') || die;
/**
 * Add link to index.php into navigation drawer.
 *
 * @param global_navigation $root Node representing the global navigation tree.
 */
function local_helloworld_extend_navigation(global_navigation $navigation)
{
    global $PAGE, $COURSE;

    $title = get_string('pluginname', 'local_helloworld');

    if (isset($COURSE) && $COURSE->id <= 1) {
        return null;
    }

    // Sidebar Admin
//    $showinflatnavigation = false;
//    if (get_config('local_helloworld', 'showinflatnavigation')) {
//        $showinflatnavigation = true;
//    }
//    // Flat navigation
//    $node = navigation_node::create(
//        $title,
//        new moodle_url('/local/helloworld/index.php', array('courseid' => $COURSE->id)),
//        navigation_node::TYPE_CUSTOM,
//        null,
//        null,
//        new pix_icon('t/addcontact', '')
//    );
//    $node->showinflatnavigation = $showinflatnavigation;  // show in navigation block
//    $navigation->add_node($node);
//    $node->add_class('mail_root');


    // Navigation Block with sub options
//    $parent = navigation_node::create($title, null, navigation_node::TYPE_CONTAINER);
//
//    $main_node = $navigation->add_node($parent, 'mycourses');
//    $main_node->nodetype = 1;
//    $main_node->collapse = true;
//    $main_node->forceopen = true;
//    $main_node->isexpandable = true;
//    $main_node->showinflatnavigation = false;
//
//    $course_node = $main_node->add('Tab 1', new moodle_url('/local/helloworld/index.php', array('courseid' => $COURSE->id)));
//    $course_node->set_parent($main_node);
//    $course_node->showinflatnavigation = false;
//
//    $user_node = $main_node->add('Tab 2', new moodle_url('/local/helloworld/index.php', array('courseid' => $COURSE->id)));
//    $user_node->set_parent($main_node);
//    $user_node->showinflatnavigation = false;


    // Navigation Block without sub options
    $parent = navigation_node::create(
        $title,
        new moodle_url('/local/helloworld/index.php', array('courseid' => $COURSE->id)),
        navigation_node::TYPE_CUSTOM,
        null,
        null,
        new pix_icon('t/addcontact', '')
    );
    $main_node = $navigation->add_node($parent);
    $main_node->showinflatnavigation = false;
}

function local_helloworld_extend_settings_navigation($settingsnav, $context) {
    global $CFG, $PAGE;

    // Only add this settings item on non-site course pages.
//    if (!$PAGE->course or $PAGE->course->id == 1) {
//        return;
//    }

    // Context must be course.
    if ($context->contextlevel != CONTEXT_COURSE) {
        return;
    }
    // Must be in a valid course: Cannot be course id 0.
    if ($context->instanceid == 0) {
        return;
    }
    // Must be in a valid course: Course must be retrievable.
    if (!($course = get_course($context->instanceid))) {
        return;
    }
    // Must be enrolled or otherwise allowed to view the course.
    if (!(is_enrolled($context) || is_viewing($context))) {
        return;
    }
    // Must have a course admin menu in which to add link.
    if (!($coursenode = $settingsnav->find('courseadmin', navigation_node::TYPE_COURSE))) {
        return;
    }
    // Good to go.  Build the menu item.
    $pluginname = get_string('pluginname', 'local_helloworld');
    $url = new moodle_url('/local/helloworld/index.php', array('courseid' => $PAGE->course->id));
    $newnode = navigation_node::create(
        $pluginname,
        $url,
        navigation_node::NODETYPE_LEAF,
        'myplugin',
        'myplugin',
        new pix_icon('t/addcontact', $pluginname)
    );

//    // We want to put this link at the top: find the existing top (first) node.
//    $firstnode = $coursenode->get_children_key_list()[0];
//    // Add the menu item to the menu, before the first node.
//    $coursenode->add_node($newnode, $firstnode);
}

function local_helloworld_extend_navigation_course(navigation_node $parentnode, stdClass $course, context_course $context) {
    global $PAGE;

//    if (isset($course) && $course->id <= 1 ) {
//        return null;
//    }

    // Must be enrolled or otherwise allowed to view the course.
    if (!(is_enrolled($context) || is_viewing($context))) {
        return;
    }

    $title = get_string('pluginname', 'local_helloworld');
    $url = new moodle_url('/local/helloworld/index.php', array('courseid' => $PAGE->course->id));


    // Sidebar Course
    $coursenode = $PAGE->navigation->find($course->id, navigation_node::TYPE_COURSE);
    $thingnode = $coursenode->add(
        $title,
        $url,
        navigation_node::NODETYPE_LEAF,
        'myplugin',
        'myplugin',
        new pix_icon('t/addcontact', $title)
    );
    $thingnode->showinflatnavigation = false;

    if ($PAGE->url->compare($url, URL_MATCH_BASE)) {
        $thingnode->make_active();
    }


//    $node = navigation_node::create(
//        $title,
//        new moodle_url('/local/helloworld/index.php', array('courseid' => $course->id)),
//        navigation_node::TYPE_CUSTOM,
//        null,
//        null,
//        new pix_icon('t/addcontact', '')
//    );
//    $main_node = $parentnode->add_node($node);
//    $main_node->showinflatnavigation = false;
}

