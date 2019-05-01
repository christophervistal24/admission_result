<div class="container-fluid">
  <h5 class="h5 mb-4 text-gray-800 text-capitalize">&nbsp;</h5>
  <h2 class="content-heading">
  <div class="row text-center">
    <div class="col-lg-4 mt-3 ">
      <img width="125px" src="<?= APP['DOC_ROOT'] ?>assets/img/photos/sdssu.png">
    </div>
    <div class="col-lg-4">
      <h6>SURIGAO DEL SUR STATE UNIVERSITY</h6>
      <h6>Guidance Center</h6>
      <h6>Tel. No. (086)214-2735</h6>
      <h6>Tandag City, Surigaodel Sur</h6>
      <h6><a href="https://sdssu.edu.ph">www.sdssu.edu.ph</a></h6>
    </div>
    <div class="col-lg-4">
      <h6>Reference Code</h6>
      <h6><b>FM-GC-005E</b></h6>
      <h6>Revision Number</h6>
      <h6>000</h6>
      <h6>Date : Effective</h6>
      <h6><b><?= date('m/d/Y'); ?></b></h6>
    </div>
  </div>
  </h2>
  <div class="block">
    <div class=" text-center">
      <h4><b>UNIVERSITY ADMISSION TEST RESULT</b><br>1st Semester AY <?= date('Y')  . ' - ' . date('Y',strtotime("+ 1 year")); ?></h4>
    </div>
    <hr>
    <div class="block-content">
      <div class="row justify-content-center py-20">
        <div class="col-xl-12">
          <form autocomplete="off" method="POST" id="addAdmissionResult">
            <div class="row">
              <div class="col-lg-4 mb-4">
                <div class="form-material">
                  <input required type="text" class="text-capitalize form-control rounded-0 shadow-none" name="lastname" placeholder="Enter a lastname..">
                </div>
                <div class="text-center">
                  <label class="font-weight-bold">Lastname</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-material">
                  <input required type="text" class="text-capitalize form-control rounded-0 shadow-none" name="firstname" placeholder="Enter a firstname..">
                </div>
                <div class="text-center">
                  <label class="font-weight-bold">Firstname</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-material">
                  <input required type="text" class="rounded-0 shadow-none text-uppercase font-weight-bold text-center form-control" name="middlename" placeholder="M">
                </div>
                <div class="text-center">
                  <label class="font-weight-bold">M.I</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-material">
                  <select  name="sex" class="form-control rounded-0 shadow-none">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                  </select>
                </div>
                <div class="text-center">
                  <label class="font-weight-bold">Sex</label>
                </div>
              </div>
              <div class="col-lg-4 ml-lg-auto">
                <div class="form-material">
                  <input required  placeholder="Fill Birthdate" type="number" readonly name="age" class="text-center form-control font-weight-bold rounded-0 shadow-none" style="background:white;" id="examineeAge">
                </div>
                <div class="text-center">
                  <label class="font-weight-bold">Age</label>
                </div>
              </div>
              <div class="col-lg-4 ml-lg-auto mb-4">
                <div class="form-material">
                  <input required type="date" name="birthdate" class="form-control rounded-0 shadow-none" id="birthDate">
                </div>
                <div class="text-center">
                  <label class="font-weight-bold">Birthdate</label>
                </div>
              </div>
              <div class="col-lg-4 mt-lg-auto mb-4">
                <div class="text-center">
                  <label class="font-weight-bold">Preferred Courses : </label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-material">
                  <select required type="text" class="form-control rounded-0 shadow-none" name="first_preferred_course" id="" placeholder="1st">
                    <?php foreach ($course as $keys => $courses): ?>
                    <option value="<?= $courses['id'] ?>">
                      <?= empty($courses['course_abbr']) ? $courses['course'] : $courses['course_abbr'] ?>
                      <span>
                        <?= '(' . $courses['department_short_name'].')'; ?>
                      </span>
                    </option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-material">
                  <select required type="text" class="form-control rounded-0 shadow-none" name="second_preferred_course" id="" placeholder="2nd">
                    <?php foreach ($course as $keys => $courses): ?>
                    <option value="<?= $courses['id'] ?>">
                      <?= empty($courses['course_abbr']) ? $courses['course'] : $courses['course_abbr'] ?>
                      <span>
                        <?= '(' . $courses['department_short_name'].')'; ?>
                      </span>
                    </option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <p class="font-weight-bold text-left text-uppercase">entrace exam rating</p>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>TOTAL</th>
                      <th class="text-center">Raw Score 
                          <hr>
                          <input type="number" readonly="" name="over_all_total" class="form-control  text-center border-0 shadow-none font-weight-bold" id="over_all_total" placeholder="OVER ALL TOTAL">
                      </th>
                      <th class="text-center">Descriptive Equivalent <hr>
                        <input type="text" readonly id="over_all_total_equivalent" class="text-center form-control border-0 shadow-none font-weight-bold">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <th class="text-left" rowspan="3" scope="row">VERBAL
                        <hr>
                        <div class="text-right">
                          <span>Verbal Comprehension</span>
                        </div>
                        <hr>
                        <div class="text-right">
                          <span>Verbal Reasoning</span>
                        </div>
                      </th>
                      <td>
                        <input id="total_of_verbal" name="verbal_total" placeholder="TOTAL OF VERBAL" type="number"  readonly class="font-weight-bold total text-center form-control border-0 shadow-none">
                      </td>
                      <td class="text-center d-none d-sm-table-cell">
                        <input class="form-control text-center font-weight-bold shadow-none border-0" readonly type="text" id="verbal_total-equivalent">
                      </td>
                    </tr>
                    <tr>
                      <th class="text-center" scope="row">
                        <input type="number" required name="verbal_comprehension" id="verbal-comprehension"  class="verbal-score text-center form-control border-0" placeholder="Enter score here..">
                      </th>
                      <td class="text-center d-none d-sm-table-cell">
                        <input type="text" readonly class="text-center form-control shadow-none border-0 font-weight-bold" id="verbal_comprehension_equivalent">
                      </td>
                    </tr>
                    <tr>
                      <th class="text-center" scope="row">
                        <input type="number" required id="verbal-reasoning" name="verbal_reasoning" class="verbal-score text-center form-control border-0" placeholder="Enter score here..">
                      </th>
                      <td class="text-center d-none d-sm-table-cell">
                        <input class="form-control text-center font-weight-bold shadow-none border-0" readonly type="text" id="verbal_reasoning_equivalent">
                      </td>
                    </tr>
                    <tr>
                      <th class="text-left" rowspan="3" scope="row">NON VERBAL
                        <hr>
                        <div class="text-right">
                          <span>Figurative Reasoning</span>
                        </div>
                        <hr>
                        <div class="text-right">
                          <span>Quantitative Reasoning</span>
                        </div>
                      </th>
                      <td class="text-center"><input  name="non_verbal_total" id="total_of_non_verbal" placeholder="NON VERBAL TOTAL" readonly type="number"  class="total text-center form-control border-0 shadow-none font-weight-bold"></td>
                      <td class="text-center d-none d-sm-table-cell">
                        <input type="text" readonly class="text-center form-control border-0 shadow-none font-weight-bold" id="non_verbal-equivalent">
                      </td>
                    </tr>
                    <tr>
                      <th class="text-center" scope="row">
                        <input type="number"  name="figurative_reasoning" id="figurative-reasoning" required class="non-verbal-score text-center form-control border-0" placeholder="Enter score here..">
                      </th>
                      <td class="text-center d-none d-sm-table-cell">
                        <input type="text" readonly class="text-center form-control border-0 shadow-none font-weight-bold" id="figurative-equivalent">
                      </td>
                    </tr>
                    <tr>
                      <th class="text-center" scope="row">
                        <input type="number" required name="quantitative_reasoning"  id="quantitative-reasoning" class="non-verbal-score text-center form-control border-0" placeholder="Enter score here..">
                      </th>
                      <td class="text-center d-none d-sm-table-cell">
                        <input class="form-control text-center border-0 shadow-none font-weight-bold"  readonly type="text" id="quantitative-equivalent">
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-lg-4 float-right ">
                  <div class="text-left form-material">
                    <div class="row">
                      <div class="col-lg-4 m-lg-auto">
                        <img  id="signature_image" class="mb-2 img-fluid" src="<?= APP['DOC_ROOT'] ?>assets/img/uploads/<?= $guidance_conselors[0]->signature ?>" alt="">
                      </div>
                    </div>
                    <select type="text" required name="guidance_counselor" id="guidance_counselor_name"  class="text-center text-uppercase form-control rounded-0 shadow-none">
                      <?php foreach ($guidance_conselors as $informations): ?>
                        <option value="<?= $informations->id; ?>">
                            <?= $informations->fullname; ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="text-center">
                    <!-- DEFAULT THIS WILL CHANGE IF THE ONCHANGE EVENT TRIGGER -->
                    <label id="position"><?= $guidance_conselors[0]->position; ?></label>
                  </div>
                  <br>
                  <input type="hidden" value="add_admission_result" name="action">
                  <input type="submit" value="Add & Print" class="mr-5 btn btn-primary border-0 rounded-0 float-right">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


