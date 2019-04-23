<!-- Material Forms Validation -->
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
                <form action="" method="POST" id="addAdmissionResult">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-material">
                                <input required type="text" class="text-capitalize form-control" name="info[lastname]" placeholder="Enter a lastname..">
                            </div>
                            <div class="text-center">
                                <label for="">Lastname</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <input required type="text" class="text-capitalize form-control" name="info[firstname]" placeholder="Enter a firstname..">
                            </div>
                            <div class="text-center">
                                <label for="">Firstname</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <input required type="text" class="text-uppercase font-weight-bold text-center form-control" id="val-username2" name="info[middlename]" placeholder="M">
                            </div>
                            <div class="text-center">
                                <label for="">M.I</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-material">
                                <select  name="info[sex]"id="" class="form-control">
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <label for="">Sex</label>
                            </div>
                        </div>
                        <div class="col-lg-2 ml-lg-auto">
                            <div class="form-material">
                                <input required  placeholder="Fill Birthdate" type="number" readonly name="info[age]" class="text-center form-control font-weight-bold" id="examineeAge">
                            </div>
                            <div class="text-center">
                                <label for="">Age</label>
                            </div>
                        </div>
                        <div class="col-lg-4 ml-lg-auto">
                            <div class="form-material">
                                <input required type="date" name="info[birthdate]" class="form-control" id="birthDate">
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
                                <select required type="text" class="form-control" name="info[first_preferred_course]" id="" placeholder="1st">
                                    <?php foreach ($course as $keys => $courses): ?>
                                    <option value="<?= $courses['id'] ?>"><?= $courses['course']?>
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
                                <select required type="text" class="form-control" name="info[second_preferred_course]" id="" placeholder="2nd">
                                    <?php foreach ($course as $keys => $courses): ?>
                                    <option value="<?= $courses['id'] ?>"><?= $courses['course']; ?>
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
                                        <th class="text-center d-none d-sm-table-cell" rowspan="2">Raw Score <hr><input type="number" readonly="" name="exam_rating[over_all_total]" class="form-control border-0 text-center" id="over_all_total" placeholder="OVER ALL TOTAL"></th>

                                        <th class="text-center">Descriptive Equivalent <hr>
                                            <input type="text" readonly id="over_all_total_equivalent" class="text-center form-control">
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
                                        <td><input  id="total_of_verbal" name="exam_rating[verbal_total]" placeholder="TOTAL OF VERBAL" type="number"  readonly class="total text-center form-control border-0"></td>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <input class="form-control text-center" readonly type="text" id="verbal_total-equivalent">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number" required name="exam_rating[verbal_comprehension]" id="verbal-comprehension"  class="verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <input type="text" readonly class="text-center form-control" id="verbal_comprehension_equivalent">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number" required id="verbal-reasoning" name="exam_rating[verbal_reasoning]" class="verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <input class="form-control text-center" readonly type="text" id="verbal_reasoning_equivalent">
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
                                        <td class="text-center"><input  name="exam_rating[non_verbal_total]" id="total_of_non_verbal" placeholder="NON VERBAL TOTAL" readonly type="number"  class="total text-center form-control border-0"></td>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <input type="text" readonly class="text-center form-control" id="non_verbal-equivalent">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number"  name="exam_rating[figurative_reasoning]" id="figurative-reasoning" required class="non-verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <input type="text" readonly class="text-center form-control" id="figurative-equivalent">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input type="number" required name="exam_rating[quantitative_reasoning]"  id="quantitative-reasoning" class="non-verbal-score text-center form-control border-0" placeholder="Enter score here..">
                                        </th>
                                        <td class="text-center d-none d-sm-table-cell">
                                            <input class="form-control text-center"  readonly type="text" id="quantitative-equivalent">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-lg-4 float-right ">
                                <div class="text-left form-material">
                                        <div class="row">
                                            <div class="col-lg-4 m-lg-auto">
                                                <img  id="signature_image" class="mt-5 img-fluid" src="<?= APP['DOC_ROOT'] ?>assets/img/uploads/untitled.png" alt="">
                                            </div>
                                        </div>
                                        <select type="text" required name="info[guidance_counselor]" id="guidance_counselor_name"  class=" text-center form-control">
                                        <?php foreach ($guidance_conselors as $informations): ?>
                                            <option value="<?= $informations['id']; ?>"><?= $informations['fullname']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <label for="" id="position"><?= $guidance_conselors[0]['position']; ?></label>
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