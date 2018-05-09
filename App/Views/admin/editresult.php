<h2 class="content-heading">
<div class="row text-center">
    <div class="col-lg-4 ">
        <img height="100" class="mt-lg-4" src="<?= APP['DOC_ROOT'] ?>assets/img/photos/sdssu.png">
    </div>
    <div class="col-lg-4">
        SURIGAO DEL SUR STATE UNIVERSITY
        <p class="block-title " style="margin:0px;">Guidance Center</p>
        <p class="block-title " style="margin:0px;">Tel. No. (086)214-2735</p>
        <p class="block-title " style="margin:0px;">Tandag City, Surigaodel Sur</p>
        <a class="block-title " style="margin:0px;" href="https://sdssu.edu.ph">www.sdssu.edu.ph</a>
    </div>
    <div class="col-lg-4">
        <p class="block-title" style="margin:0px">Reference Code</p>
        <p class="block-title" style="margin:0px"><b>FM-GC-005E</b></p>
        <p class="block-title" style="margin:0px">Revision Number</p>
        <p class="block-title" style="margin:0px">000</p>
        <p class="block-title" style="margin:0px">Date : Effective</p>
        <p class="block-title" style="margin:0px"><b><?= date('m/d/Y'); ?></b></p>
    </div>
</div>
</h2>
<div class="block">
    <div class="block-header block-header-default text-center">
        <h3 class="block-title"><b>UNIVERSITY ADMISSION TEST RESULT</b><br>1st Semester AY <?= $school_year; ?></h3>
    </div>
    <div class="block-content">
        <div class="row justify-content-center py-20">
            <div class="col-xl-12">
                <form action="" method="POST" id="editAdmissionResult">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-material">
                                <?php if (isset($_GET['id'])): ?>
                                <input type="hidden" name="ids[examiner_info_id]" value="<?= $examiner_results['examiner_info_id'] ?>">
                                <input type="hidden" name="ids[entrance_rating_id]" value="<?= $examiner_results['entrance_rating_id'] ?>">
                                <input type="hidden" name="ids[admission_result_id]" value="<?= $examiner_results['admission_result_id'] ?>">
                                <?php endif ?>
                                <input required id="examiner_lastname" type="text" value="<?= $examiner_results['lastname'] ?>" class="text-capitalize form-control" name="info[lastname]" placeholder="Enter a lastname..">
                            </div>
                            <div class="text-center">
                                <label for="">Lastname</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <input required type="text" id="examiner_firstname" value="<?= $examiner_results['firstname'] ?>" class="text-capitalize form-control" name="info[firstname]" placeholder="Enter a firstname..">
                            </div>
                            <div class="text-center">
                                <label for="">Firstname</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <input required type="text" id="examiner_middlename" value="<?= $examiner_results['middlename'] ?>" class="text-uppercase font-weight-bold text-center form-control" id="val-username2" name="info[middlename]" placeholder="M">
                            </div>
                            <div class="text-center">
                                <label for="">M.I</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <select  name="info[sex]" id="examiner_sex" class="form-control">
                                    <option value="female" <?= ($examiner_results['sex'] =='Female') ? 'selected' : null ; ?>>Female</option>
                                    <option value="male"   <?= ($examiner_results['sex'] =='Male') ? 'selected' : null ; ?>>Male</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <label for="">Sex</label>
                            </div>
                        </div>
                        <div class="col-lg-2 ml-lg-auto">
                            <div class="form-material">
                                <input id="examiner_age" value="<?= $examiner_results['age'] ?>" required type="number" name="info[age]" class="form-control" id="">
                            </div>
                            <div class="text-center">
                                <label for="">Age</label>
                            </div>
                        </div>
                        <div class="col-lg-4 ml-lg-auto">
                            <div class="form-material">
                                <input id="examiner_birthdate" value="<?= $examiner_results['birthdate'] ?>" required type="date" name="info[birthdate]" class="form-control" id="">
                            </div>
                            <div class="text-center">
                                <label for="">Birthdate</label>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-auto">
                            <div class="text-left">
                                <label for="">Preferred Courses : </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <select required type="text" id="examiner_first_course" class="form-control" name="info[first_preferred_course]" id="" placeholder="1st">
                                    <?php foreach ($course as $keys => $courses): ?>
                                    <option <?= ($examiner_results['first_course'] == $courses['course']) ? 'selected' : null ; ?> value="<?= $courses['id'] ?>"><?= $courses['course']?>
                                        <span>
                                            <?= '(' . $courses['department_name'].')'; ?>
                                        </span>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <select required type="text" id="examiner_second_course" class="form-control" name="info[second_preferred_course]" id="" placeholder="2nd">
                                    <?php foreach ($course as $keys => $courses): ?>
                                    <option <?= ($examiner_results['second_course'] == $courses['course']) ? 'selected' : null ; ?> value="<?= $courses['id'] ?>"><?= $courses['course']?>
                                        <span>
                                            <?= '(' . $courses['department_name'].')'; ?>
                                        </span>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p class="font-weight-bold text-left text-uppercase">entrace exam rating</p>
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th>TOTAL</th>
                                        <th class="text-center d-none d-sm-table-cell" rowspan="2">Raw Score <hr><input type="number" readonly="" id="over_all_total" value="<?= $examiner_results['verbal_total'] + $examiner_results['non_verbal_total']  ?>" name="exam_rating[over_all_total]" class="form-control border-0 text-center" id="over_all_total" placeholder="OVER ALL TOTAL"></th>
                                        <th class="text-center">Descriptive Equivalent <hr>Above Average</th>
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
                                        <td><input  id="total_of_verbal" value="<?= $examiner_results['verbal_total']  ?>" name="exam_rating[verbal_total]" placeholder="TOTAL OF VERBAL" type="number"  readonly class="total text-center form-control border-0"></td>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <span class="badge badge-success">VIP</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number" value="<?= $examiner_results['verbal_comprehension']  ?>" required name="exam_rating[verbal_comprehension]" id="verbal-comprehension"  class="verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <span class="badge badge-primary">Personal</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number" required id="verbal-reasoning" name="exam_rating[verbal_reasoning]" value="<?= $examiner_results['verbal_reasoning']  ?>" class="verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <span class="badge badge-primary">Personal</span>
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
                                        <td class="text-center"><input value="<?= $examiner_results['non_verbal_total']  ?>" name="exam_rating[non_verbal_total]" id="total_of_non_verbal" placeholder="NON VERBAL TOTAL" readonly type="number"  class="total text-center form-control border-0"></td>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <span class="badge badge-info">Business</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number" value="<?= $examiner_results['figurative_reasoning']  ?>" name="exam_rating[figurative_reasoning]" id="figurative-reasoning" required class="non-verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <span class="badge badge-info">Business</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number" required value="<?= $examiner_results['quantitative_reasoning']  ?>" name="exam_rating[quantitative_reasoning]"  id="quantitative-reasoning" class="non-verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <span class="badge badge-primary">Personal</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-lg-4 float-right ">
                                <div class="text-left form-material">
                                    <input type="text" required name="info[guidance_counselor]" id="guidance_counselor"  value="<?= $examiner_results['guidance_counselor']  ?>" class=" text-center form-control">
                                </div>
                                <div class="text-center">
                                    <label for="">Guidance Counselor III</label>
                                </div>
                                <br>
                                <input type="hidden" value="edit_admission_result" name="action">
                                <input type="submit" value="Update & Print" class="mr-5 btn btn-primary border-0 rounded-0 float-right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>