<?php
namespace App\Controller;

use App\Controller\Guidance;
use App\Core\Controller;
use App\Helpers\Redirect;
use App\Models\Course;
use App\Helpers\Form\Validator;

class Guidance extends Controller
{
  use Validator;

    public function __construct()
    {
        $this->admission = load('Models\AdmissionResult');
        $this->guidance = load('Models\GuidanceConselor');
        $this->request = load('Helpers\Request');
    }

    public function index()
    {
          $data['title']                     = 'List of Guidance Counselor';
          $data['admission_result']          = (array) $this->admission->results();
          $data['deleted_admission_results'] = (array) $this->admission->deletedResults();
          $data['guidance_counselors'] = $this->guidance->get();
        $this->render('admin.guidance.index', $data);
    }

    public function create()
    {
         $data['title'] = 'Add new Guidance Counselor';
         $data['deleted_admission_results'] = $this->admission->deletedResults();
         
        $this->render('admin.guidance.create',$data);
    }

    public function store()
    {
        $this->validate($this->request->all(), [
            'fullname_with_degree' => 'required',
            'position'             => 'required',
        ]);

        if ($this->fail()) {
            return Redirect::back();
        }

      $newGuidance = $this->guidance->create([
          'fullname'   => $this->request->fullname_with_degree,
          'position'   => $this->request->position,
          'signature'  => $this->request->signature_image['name'],
          'created_at' => time(),
      ]);

      // If the record successfully add
      if ( $newGuidance->getLastInsertedId() ) {
          // Prepare a location for the image or signature
          $destination = APP['URL_ROOT'] . 'assets/img/uploads/'
                                          . $this->request->signature_image['name'];
          // Upload
          move_uploaded_file($this->request->signature_image['tmp_name'], $destination);

          return Redirect::to('guidance/create')
                         ->with('status', 'Successfully add new guidance counselor.');
      }

    }

    public function guidanceInfo()
    {
        echo json_encode(['data' => $this->guidance->find($this->request->id)]);
    }

    public function edit()
    {
        $data['title'] = 'Edit Guidance counselor';
        $data['deleted_admission_results']   = $this->admission->deletedResults();
        $fetch_data['counselor_information'] = (array) $this->guidance->find($this->request->id);
        $this->render('admin.guidance.edit',$data + $fetch_data);
    }

    public function update()
    {
        $this->validate($this->request->all(), [
              'fullname_with_degree' => 'required',
              'position'             => 'required',
          ]);

          if ($this->fail()) {
              return Redirect::back();
          }

        $guidanceCounselor = $this->guidance->find($this->request->id);
        // Checking if the user upload new signature.
        $signature = (empty($this->request->signature_image['name']) ? $guidanceCounselor->signature :
                                                            $this->request->signature_image['name']);
        
        $guidanceCounselor->fullname = $this->request->fullname_with_degree;
        $guidanceCounselor->position = $this->request->position;
        $guidanceCounselor->signature = $signature;
        $guidanceCounselor->save();
        $destination = APP['URL_ROOT'] . 'assets/img/uploads/' . $signature;

        // Upload
        move_uploaded_file($this->request->signature_image['tmp_name'], $destination);

        return Redirect::back()
                      ->with('status', 'Successfully update guidance counselor information.');
    }

}
