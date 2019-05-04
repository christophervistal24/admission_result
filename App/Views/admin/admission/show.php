<div class="container emp-profile p-3" style="background :white;">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="<?= APP['DOC_ROOT'] . '/assets/img/photos/sdssu.png' ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5 class="text-capitalize">
                <?= $examiner_results->Fullname ?>
                </h5>
                <h6>
                Examinee
                </h6>
                <p class="proile-rating">RANKING : <span><?= $rank ?>/10</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="logs-tab" data-toggle="tab" href="#logs" role="tab" aria-controls="logs" aria-selected="false">Exam Results</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <a class="text-white btn btn-primary btn-sm rounded-0" href="/system/admission/edit?id=<?= $examiner_results->admission_result_id ?>" >Edit Admission Result</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>WORK LINK</p>
                <a href="#" class="text-primary">Links 1</a><br/>
                <a href="#" class="text-primary">Links 2</a><br/>
                <a href="#" class="text-primary">Links 3</a>
                <p>SKILLS</p>
                <a class="text-primary" href="#">Skills 1</a><br/>
                <a class="text-primary" href="#">Skills 2</a><br/>
                <a class="text-primary" href="#">Skills 3</a><br/>
                <a class="text-primary" href="#">Skills 4</a><br/>
                <a class="text-primary" href="#">Skills 5</a><br/>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Firstname</label>
                        </div>
                        <div class="col-md-6">
                            <p class="text-capitalize"><?= $examiner_results->firstname ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Middlename</label>
                        </div>
                        <div class="col-md-6">
                            <p class="text-capitalize"><?= $examiner_results->middlename ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Lastname</label>
                        </div>
                        <div class="col-md-6">
                            <p class="text-capitalize"><?= $examiner_results->lastname ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Sex</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->sex ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Birthdate</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->birthdate ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Age</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->age?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Preferred Course</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->first_course?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Second Preferred Course</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->second_course?></p>
                        </div>
                    </div>
                </div>
                <div  class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Verbal Comprehension</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->verbal_comprehension ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Verbal Reasoning</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->verbal_reasoning ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Figurative Reasoning</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->figurative_reasoning ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Quantitative Reasoning</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->quantitative_reasoning ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Verbal Total</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->verbal_total ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Non Verbal Total</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->non_verbal_total ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Over All Total</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= $examiner_results->over_all_total ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Exam on</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= date('M d, Y h:i A',$examiner_results->exam_at) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
