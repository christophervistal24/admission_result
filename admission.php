<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.7.9
 */

/**
 * Database `admission`
 */

/* `admission`.`admission_result` */
$admission_result = array(
  array('id' => '1','examiner_info_id' => '1','entrace_rating_id' => '1','preferred_course_id_1' => '9','preferred_course_id_2' => '1','guidance_counselor' => 'JOAN A. MARTIZANO ZARTIGA,MA,RGC','exam_at' => '1525873094','is_delete' => 'NO'),
  array('id' => '10','examiner_info_id' => '10','entrace_rating_id' => '10','preferred_course_id_1' => '1','preferred_course_id_2' => '1','guidance_counselor' => 'JOAN A. MARTIZANO ZARTIGA,MA,RGC','exam_at' => '1525888633','is_delete' => 'NO')
);

/* `admission`.`course` */
$course = array(
  array('id' => '1','course' => 'Bachelor of Arts in Economics','dept_id' => '1'),
  array('id' => '2','course' => 'Bachelor of Arts in English','dept_id' => '1'),
  array('id' => '3','course' => 'Bachelor of Arts in Filipino','dept_id' => '1'),
  array('id' => '4','course' => 'Bachelor of Arts in Political Science','dept_id' => '1'),
  array('id' => '5','course' => 'Bachelor of Arts in Public Administration','dept_id' => '1'),
  array('id' => '6','course' => 'Bachelor of Arts in Social Science','dept_id' => '1'),
  array('id' => '7','course' => 'Bachelor of Science in Biology	','dept_id' => '1'),
  array('id' => '8','course' => 'Bachelor of Science in Environmental Science','dept_id' => '1'),
  array('id' => '9','course' => 'Bachelor of Science in Midwifery','dept_id' => '1'),
  array('id' => '10','course' => 'Associate in Hotel & Restaurant Management	','dept_id' => '2'),
  array('id' => '11','course' => 'Bachelor of Science in Business Administration major in Human Resource Development Management	Candidate Status','dept_id' => '2'),
  array('id' => '12','course' => 'Bachelor of Science in Business Administration Major in Financial Management','dept_id' => '2'),
  array('id' => '13','course' => 'Bachelor of Science in Business Administration major in Marketing Management','dept_id' => '2'),
  array('id' => '14','course' => 'Bachelor of Science in Hotel and Restaurant Management','dept_id' => '2'),
  array('id' => '15','course' => 'Bachelor of Science in Civil Engineering	','dept_id' => '3'),
  array('id' => '16','course' => 'Bachelor of Science in Computer Science','dept_id' => '3'),
  array('id' => '17','course' => 'Bachelor of Early Childhood Education','dept_id' => '4'),
  array('id' => '18','course' => 'Bachelor of Physical Education','dept_id' => '4'),
  array('id' => '19','course' => 'Bachelor of Secondary Education major in English','dept_id' => '4'),
  array('id' => '20','course' => 'Bachelor of Secondary Education major in Filipino','dept_id' => '4'),
  array('id' => '21','course' => 'Bachelor of Secondary Education major in Sciences','dept_id' => '4'),
  array('id' => '22','course' => 'Diploma in Teaching','dept_id' => '4')
);

/* `admission`.`departments` */
$departments = array(
  array('id' => '1','department_name' => 'College of Arts and Sciences'),
  array('id' => '2','department_name' => 'College of Business Management'),
  array('id' => '3','department_name' => 'College of Engineering, Computer Studies and Technology'),
  array('id' => '4','department_name' => 'College of Teacher Education')
);

/* `admission`.`entrace_rating` */
$entrace_rating = array(
  array('id' => '1','verbal_comprehension' => '1','verbal_reasoning' => '2','figurative_reasoning' => '3','quantitative_reasoning' => '4','verbal_total' => '3','non_verbal_total' => '7','over_all_total' => '10'),
  array('id' => '10','verbal_comprehension' => '25','verbal_reasoning' => '1','figurative_reasoning' => '1','quantitative_reasoning' => '1','verbal_total' => '26','non_verbal_total' => '2','over_all_total' => '28')
);

/* `admission`.`examiner_info` */
$examiner_info = array(
  array('id' => '1','firstname' => 'Christopher','middlename' => 'm','lastname' => 'Vistal','sex' => 'Male','age' => '13','birthdate' => '2018-05-01'),
  array('id' => '10','firstname' => 'Test','middlename' => 'm','lastname' => 'Dummy','sex' => 'Female','age' => '1','birthdate' => '1997-01-01')
);

/* `admission`.`preferred_courses` */
$preferred_courses = array(
  array('id' => '5','first_course' => '1','second_course' => '2'),
  array('id' => '7','first_course' => '16','second_course' => '16'),
  array('id' => '8','first_course' => '16','second_course' => '16'),
  array('id' => '9','first_course' => '1','second_course' => '2'),
  array('id' => '10','first_course' => '1','second_course' => '2'),
  array('id' => '11','first_course' => '1','second_course' => '2'),
  array('id' => '12','first_course' => '16','second_course' => '16'),
  array('id' => '13','first_course' => '16','second_course' => '16'),
  array('id' => '14','first_course' => '16','second_course' => '16'),
  array('id' => '15','first_course' => '16','second_course' => '16'),
  array('id' => '16','first_course' => '16','second_course' => '16'),
  array('id' => '17','first_course' => '8','second_course' => '6'),
  array('id' => '18','first_course' => '1','second_course' => '1'),
  array('id' => '19','first_course' => '1','second_course' => '1'),
  array('id' => '20','first_course' => '1','second_course' => '1'),
  array('id' => '21','first_course' => '1','second_course' => '1'),
  array('id' => '22','first_course' => '1','second_course' => '1'),
  array('id' => '23','first_course' => '1','second_course' => '1'),
  array('id' => '24','first_course' => '1','second_course' => '1'),
  array('id' => '25','first_course' => '1','second_course' => '1')
);

/* `admission`.`tbl_users` */
$tbl_users = array(
  array('id' => '1','username' => 'admin','password' => 'admin','created_at' => '0','updated_at' => '0')
);

/* `admission`.`tbl_user_info` */
$tbl_user_info = array(
  array('id' => '1','user_id' => '1','firstname' => 'christopher','middlename' => 'P','lastname' => 'vistal','gender' => 'Male','birthdate' => '1997-01-06','profile' => 'noimage.jpg
')
);
