<?php
/**
 * @package    theme_klass
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @authors    LMSACE Dev Team , lmsace.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . "/course/renderer.php");

class theme_klass_core_course_renderer extends core_course_renderer {

    public function new_courses() {
        /* New Courses */
        global $CFG,$OUTPUT;
        $new_course = get_string('newcourses','theme_klass');

        $header = '<div id="frontpage-course-list">
        <h2>'.$new_course.'</h2>
        <div class="courses frontpage-course-list-all">
        <div class="row-fluid">';

        $footer = '</div>
        </div>
        </div>';
        $co_cnt = 1;
        $content = '';

        if ($ccc = get_courses('all', 'c.id DESC,c.sortorder ASC', 'c.id,c.shortname,c.visible')) {
            foreach ($ccc as $cc) {
                if ($co_cnt > 8) {
                    break;
                }
                if ( $cc->visible == "0" || $cc->id == "1") {
                    continue;
                }
                $course_id = $cc->id;
                $course = get_course($course_id);

                $noimg_url = $OUTPUT->pix_url('no-image', 'theme');
                $course_url = new moodle_url('/course/view.php',array('id' => $course_id ));

                if ($course instanceof stdClass) {
                    require_once($CFG->libdir. '/coursecatlib.php');
                    $course = new course_in_list($course);
                }

                $img_url = '';
                $context = context_course::instance($course->id);

                foreach ($course->get_course_overviewfiles() as $file) {
                    $isimage = $file->is_valid_image();
                    $img_url = file_encode_url("$CFG->wwwroot/pluginfile.php",
                    '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                    $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
                    if (!$isimage) {
                        $img_url = $noimg_url;
                    }
                }

                if (empty($img_url)) {
                    $img_url = $noimg_url;
                }

                 $icon = "fa-angle-double-right";
                  if(right_to_left()) {
                    $icon = "fa-angle-double-left";
                  }

                $content .= '<div class="span3">
                <div class="fp-coursebox">
                <div class="fp-coursethumb">
                <a href="'.$course_url.'">
                <img src="'.$img_url.'" width="243" height="165" alt="'.$course->fullname.'">
                </a>
                </div>
                <div class="fp-courseinfo">
                <h5><a href="'.$course_url.'">'.$course->fullname.'</a></h5>
                <div class="readmore"><a href="'.$course_url.'">'.get_string("readmore","theme_klass").'<i class="fa '.$icon.'"></i></a></div>
                </div>
                </div>
                </div>';


                if ( ( $co_cnt % 4) == "0") {
                    $content .= '<div class="clearfix hidexs"></div>';
                }

                $co_cnt++;
            }
        }

        $course_html = $header.$content.$footer;
        $frontpage = isset($CFG->frontpage)?$CFG->frontpage:'';
        $frontpageloggedin = isset($CFG->frontpageloggedin)?$CFG->frontpageloggedin:'';

        $f1_pos = strpos($frontpage,'6');
        $f2_pos = strpos($frontpageloggedin,'6');
        $btn_html = '';
        if($co_cnt<=1 && !$this->page->user_is_editing() && has_capability('moodle/course:create', context_system::instance())) {
            $btn_html = $this->add_new_course_button();
        }

        if (!isloggedin() or isguestuser()) {
            if ( $f1_pos === false) {
                if ($co_cnt>1) {
                    echo $course_html;
                }
            }
        } else {
            if ( $f2_pos === false) {
                echo $course_html."<br/>".$btn_html;
            }
        }

    }



    public function frontpage_available_courses() {
        /* available courses */
        global $CFG,$OUTPUT;

        require_once($CFG->libdir. '/coursecatlib.php');

        $chelper = new coursecat_helper();
        $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED)->
        set_courses_display_options(array(
        'recursive' => true,
        'limit' => $CFG->frontpagecourselimit,
        'viewmoreurl' => new moodle_url('/course/index.php'),
        'viewmoretext' => new lang_string('fulllistofcourses')));

        $chelper->set_attributes(array('class' => 'frontpage-course-list-all'));
        $courses = coursecat::get(0)->get_courses($chelper->get_courses_display_options());
        $totalcount = coursecat::get(0)->get_courses_count($chelper->get_courses_display_options());

        $course_ids = array_keys($courses);
        $new_course = get_string('availablecourses');

        $header = '<div id="frontpage-course-list">
        <h2>'.$new_course.'</h2>
        <div class="courses frontpage-course-list-all">
        <div class="row-fluid">';

        $footer = '</div>
        </div>
        </div>';
        $co_cnt = 1;
        $content = '';

        if ($ccc = get_courses('all', 'c.sortorder ASC', 'c.id,c.shortname,c.visible')) {
            foreach ($course_ids as $course_id) {
                $course = get_course($course_id);

                $noimg_url = $OUTPUT->pix_url('no-image', 'theme');
                $course_url = new moodle_url('/course/view.php',array('id' => $course_id ));

                if ($course instanceof stdClass) {
                    require_once($CFG->libdir. '/coursecatlib.php');
                    $course = new course_in_list($course);
                }

                $img_url = '';
                $context = context_course::instance($course->id);

                foreach ($course->get_course_overviewfiles() as $file) {
                    $isimage = $file->is_valid_image();
                    $img_url = file_encode_url("$CFG->wwwroot/pluginfile.php",
                    '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                    $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
                    if (!$isimage) {
                        $img_url = $noimg_url;
                    }
                }

                if (empty($img_url)) {
                    $img_url = $noimg_url;
                }

                $icon = "fa-angle-double-right";
                if(right_to_left()) {
                    $icon = "fa-angle-double-left";
                }

                $content .= '<div class="span3">
                <div class="fp-coursebox">
                <div class="fp-coursethumb">
                <a href="'.$course_url.'">
                <img src="'.$img_url.'" width="243" height="165" alt="'.$course->fullname.'">
                </a>
                </div>
                <div class="fp-courseinfo">
                <h5><a href="'.$course_url.'">'.$course->fullname.'</a></h5>
                <div class="readmore"><a href="'.$course_url.'">'.get_string("readmore","theme_klass").'&nbsp; <i class="fa '.$icon.'"></i></a></div>
                </div>
                </div>
                </div>';


                if (($co_cnt % 4) == "0") {
                    $content .= '<div class="clearfix hidexs"></div>';
                }

                $co_cnt++;

            }
        }

        $course_html = $header.$content.$footer;
        echo $course_html;

        if (!$totalcount && !$this->page->user_is_editing() && has_capability('moodle/course:create', context_system::instance())) {
            // Print link to create a new course, for the 1st available category.
            echo $this->add_new_course_button();
        }

    }

}
