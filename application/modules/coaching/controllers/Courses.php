<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Courses extends MX_Controller {

	var $toolbar_buttons = [];

	public function __construct() {
		// Load Config and Model files required throughout Users sub-module
		$config = ['config_coaching', 'config_course'];
		$models = ['courses_model', 'lessons_model', 'tests_model'];
		$this->common_model->autoload_resources($config, $models);

		// Toolbar buttons
	    $coaching_id = $this->uri->segment (4);
	    if ($this->coaching_model->is_coaching_setup () == false) {
	    	$this->message->set ('Your account information is incomplete. You should complete your account information before using this module', 'warning', true);
	    	redirect ('coaching/settings/setup_coaching_account');
	    }

        $this->toolbar_buttons['add_new'] = ['<i class="iconsminds-add"></i> New Course' => 'coaching/courses/create/'.$coaching_id];
        $this->toolbar_buttons['actions'] = [
            '<i class="simple-icon-list"></i> All Courses'=>'coaching/courses/index/'.$coaching_id,
        ];
	}

	public function index ($coaching_id=0, $cat_id=0) {
		
		$data['page_title'] = 'Courses';
		$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard/'.$coaching_id);
		$data['coaching_id'] = $coaching_id;
		$data['cat_id'] 	 = $cat_id;

		$data['toolbar_buttons'] = $this->toolbar_buttons;
		$data['courses'] = $this->courses_model->courses ($coaching_id, $cat_id);

		$data['script'] = $this->load->view('courses/scripts/index', $data, true);
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('courses/index', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	}


	
	public function create ($coaching_id=0, $cat_id=-1, $course_id=0) {


		$data['coaching_id'] = $coaching_id;
		$data['cat_id'] = $cat_id;
		$data['course_id'] = $course_id;

		$data['toolbar_buttons'] = $this->toolbar_buttons;
		$data['course'] = $this->courses_model->get_course_by_id ($course_id);
		$data['default'] = $this->settings_model->get_default_settings ($coaching_id, 'currency');

		if ($course_id > 0) {
			$data['page_title'] = 'Edit Course';
			$data['right_sidebar'] = $this->load->view ('courses/inc/manage_course', $data, true);
		} else {
			$data['page_title'] = 'Create Course';
		}

		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('courses/create', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	}


	public function manage ($coaching_id=0, $course_id=0) {

		$data['course'] = $course = $this->courses_model->get_course_by_id ($course_id);
		if (! $course) {
			$this->message->set ('Course not found', 'danger', true);
			redirect ('coaching/courses/index/'.$coaching_id);
		}
		$data['num_lessons'] = $this->courses_model->count_course_lessons ($coaching_id, $course_id);
		$data['num_tests'] = $this->courses_model->count_course_tests ($coaching_id, $course_id); 
		$data['teachers'] = $this->courses_model->get_teachers_assigned ($coaching_id, $course_id);
		$data['num_teachers'] = count ($data['teachers']);

		$data['cat_id'] = $this->courses_model->get_course_cat_id ($coaching_id, $course_id);
		$data['coaching_id'] = $coaching_id;
		$data['course_id'] = $course_id;
		$data['bc'] = array('Courses' => 'coaching/courses/index/'.$coaching_id);
		$data['page_title'] = 'Manage Course';
		$data['sub_title'] = $course['title'];

		$data['right_sidebar'] = $this->load->view ('courses/inc/manage_course', $data, true);
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('courses/manage', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	}

	public function preview ($coaching_id=0, $course_id=0, $lesson_id=0, $page_id=0) {
		$data['page_title'] = 'Preview';
		$data['coaching_id'] = $coaching_id;
		$data['course_id'] = $course_id;
		$data['lesson_id'] = $lesson_id;
		$data['page_id'] = $page_id;

		$data['course'] = $this->courses_model->get_course_by_id ($course_id);
		$data['contents'] = $this->courses_model->get_course_content ($coaching_id, $course_id);	

		if ($lesson_id > 0) {
			$data['lesson'] = $this->lessons_model->get_lesson ($coaching_id, $course_id, $lesson_id);
		} else {
			$data['lesson'] = false;
		}

		if ($page_id > 0) {
			$data['page'] = $this->lessons_model->get_page ($coaching_id, $course_id, $lesson_id, $page_id);
			$data['attachments'] = $this->lessons_model->get_attachments ($coaching_id, $course_id, $lesson_id, $page_id);
		} else {
			$data['page'] = false;
			$data['attachments'] = false;
		}

		/* --==// Back //==-- */
		$data['bc'] = ['Manage'=>'coaching/courses/manage/'.$coaching_id.'/'.$course_id];
		$data['script'] = $this->load->view ('courses/scripts/preview', $data, true);
		$data['right_sidebar'] = $this->load->view ('courses/inc/course_preview', $data, true);
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view("courses/preview", $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	}


	public function organize ($coaching_id=0, $course_id=0, $batch_id=0) {

		$data['page_title'] 	= 'Organize Content';
		$data['coaching_id'] 	= $coaching_id;
		$data['course_id'] 		= $course_id;
		$data['batch_id'] 		= $batch_id;	

		$status = 1;

		$data['contents'] = $this->courses_model->get_course_content ($coaching_id, $course_id);
		
		$data['course'] = $this->courses_model->get_course_by_id ($course_id);

		/* --==// Back //==-- */
		$data['bc'] = ['Manage'=>'coaching/courses/manage/'.$coaching_id.'/'.$course_id];

		$data['style'] = '<link rel="stylesheet" href="'.base_url(THEME_PATH . 'assets/css/vendor/sortable.css').'" />'; 
		$data['script'] = $this->load->view ('courses/scripts/sortable', $data, true);
		$data['right_sidebar'] = $this->load->view ('courses/inc/manage_course', $data, true);
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('courses/organize', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	}

	public function settings ($coaching_id=0, $course_id=0) {
		$data['script'] = $this->load->view ('courses/scripts/teachers', $data, true);
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('courses/teachers', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	}
}