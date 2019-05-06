<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Helpers\Arr;
use App\Helpers\Redirect;
use App\Helpers\Response;
use App\Models\AdmissionResult;
use App\Models\EntranceRating;
use App\Models\ExaminerInfo;

class Admission extends Controller
{

    public function __construct()
    {
        $this->user_info = load('Models\UserInfo');
        $this->admission = load('Models\AdmissionResult');
        $this->guidance  = load('Models\GuidanceConselor');
        $this->course    = load('Models\Course');
        $this->request   = load('Helpers\Request');
    }

    private function data()
    {
        return [
            'course'                    =>  $this->course->getCourse(),
            'guidance_conselors'        => [ (array) $this->guidance->get()[0] ], 
        ];
    }

    public function index()
    {
        
    }

    // TODO get rid the guidance counselors herer
    // make an view composer    
    public function create()
    {
        $this->render('admin.admission.create',[
            'title'                     => ' Add new admission',
            'course'                    => $this->data()['course'],
            'guidance_conselors'        => $this->guidance->get(),
        ]);
    }

    public function store()
    {
        
        // Checking if the request is post and the action is add new admission result 
        if ( $this->request->post() && $this->request->action === 'add_admission_result' ) {

            $examinee = ExaminerInfo::create([
                'firstname'  => $this->request->firstname,
                'middlename' => $this->request->middlename,
                'lastname'   => $this->request->lastname,
                'sex'        => $this->request->sex,
                'age'        => $this->request->age,
                'birthdate'  => $this->request->birthdate
            ]);

            $entraceRating = EntranceRating::create([
                'verbal_comprehension'   => $this->request->verbal_comprehension,
                'verbal_reasoning'       => $this->request->verbal_reasoning,
                'figurative_reasoning'   => $this->request->figurative_reasoning,
                'quantitative_reasoning' => $this->request->quantitative_reasoning,
                'verbal_total'           => $this->request->verbal_total,
                'non_verbal_total'       => $this->request->non_verbal_total,
                'over_all_total'         => $this->request->over_all_total
            ]);
            
            $admission = AdmissionResult::create([
                'examiner_info_id'      => $examinee->getLastInsertedId(),
                'entrace_rating_id'     => $entraceRating->getLastInsertedId(),
                'preferred_course_id_1' => $this->request->first_preferred_course,
                'preferred_course_id_2' => $this->request->second_preferred_course,
                'guidance_counselor_id' => $this->request->guidance_counselor,
                'exam_at'               => time()
            ]);

            $newAdmissionResultID = $admission->getLastInsertedId();

            return Response::json([ 'success' => true, 'result_id' => $newAdmissionResultID ]);

        }

        // If the request is not post and not add new admission result
        // Display a 404 here
        
    }

    public function show()
    {
        $rankList = $this->admission->rankings(); 
        $rank = Arr::find($this->request->id,array_column($rankList, 'id'))[0];

        $this->render('admin.admission.show',[
            'title'                     => 'Admission Result',
            'deleted_admission_results' => $this->data()['deleted_admission_results'],
            'examiner_results'          => $this->admission->resultById($this->request->id),
            'rank'                      => ($rank + 1),
        ]);
    }

    public function edit()
    {

        // This is from the URL
        $admissionId = $this->request->id;

        if ( !$admissionId ) {
            // Display 404 page here.    
        }
        
        $this->render('admin.admission.edit' , [
            'title'                     => 'Edit Result',
            'course'                    => $this->data()['course'],
            'deleted_admission_results' => $this->data()['deleted_admission_results'],
            'guidance_conselors'        => $this->guidance->get(),
            'examiner_results'          => $this->admission->resultById($admissionId),
        ]);

    }

    public function update()
    {

        $examinee       = load('Models\ExaminerInfo');
        $entranceRating = load('Models\EntranceRating');
        $admissionResult = load('Models\AdmissionResult');

        // Update Examinee Information
        $examinee = $examinee->find($this->request->examiner_info_id);
        $examinee->lastname   = $this->request->lastname;
        $examinee->firstname  = $this->request->firstname;
        $examinee->middlename = $this->request->middlename;
        $examinee->sex        = $this->request->sex;
        $examinee->age        = $this->request->age;
        $examinee->birthdate  = $this->request->birthdate;
        $examinee->save();

        // Update Entrance Rating
        $entranceRating = $entranceRating->find($this->request->entrance_rating_id);
        $entranceRating->verbal_comprehension   = $this->request->verbal_comprehension;
        $entranceRating->verbal_reasoning       = $this->request->verbal_reasoning;
        $entranceRating->figurative_reasoning   = $this->request->figurative_reasoning;
        $entranceRating->quantitative_reasoning = $this->request->quantitative_reasoning;
        $entranceRating->verbal_total           = $this->request->verbal_total;
        $entranceRating->non_verbal_total       = $this->request->non_verbal_total;
        $entranceRating->over_all_total         = $this->request->over_all_total;
        $entranceRating->save();

        // Update Admission Result
        $this->admission = $this->admission->find($this->request->admission_result_id);
        $this->admission->examiner_info_id      = $this->request->examiner_info_id;
        $this->admission->entrance_rating_id    = $this->request->entrance_rating_id;
        $this->admission->preferred_course_id_1 = $this->request->first_preferred_course;
        $this->admission->preferred_course_id_2 = $this->request->second_preferred_course;
        $this->admission->guidance_counselor_id = $this->request->guidance_counselor;
        $this->admission->exam_at               = time();
        $this->admission->save();

        return Response::json([ 
            'success'   => true,
            'result_id' => $this->request->admission_result_id
        ]);

    }

    public function delete()
    {
        $id = $this->request->id;

        $admission = $this->admission->find($id);
        $admission->is_delete = 'YES';
        $admission->save();
        
        return Redirect::to('admin/dashboard');
    }

    public function print()
    {
        $result_details = $this->admission->fullDetailsById($this->request->id);
        $this->render('admin.admission.print',$result_details);
    }

}
