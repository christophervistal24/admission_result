<div class="block-header block-header-default">
    <h3 class="text-capitalize">Profile of <?=$examiner_results['Fullname']?></h3>
</div>
<!-- Progress Wizard 2 -->
<div class="js-wizard-simple block">
    <!-- Wizard Progress Bar -->
    <div class="progress rounded-0" data-wizard="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%; height: 8px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <!-- END Wizard Progress Bar -->
    <!-- Step Tabs -->
    <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#wizard-progress2-step1" data-toggle="tab">1. Personal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#wizard-progress2-step2" data-toggle="tab">2. Admission Results</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#wizard-progress2-step3" data-toggle="tab">3. Preferred Course</a>
        </li>
    </ul>
    <!-- END Step Tabs -->
    <!-- Form -->
    <form action="" method="post">
        <!-- Steps Content -->
        <div class="block-content block-content-full tab-content" style="min-height: 274px;">
            <!-- Step 1 -->
            <div class="tab-pane active" id="wizard-progress2-step1" role="tabpanel">
                <div class="form-group">
                    <div class="form-material floating">
                        <input class="form-control" readonly value="<?= $examiner_results['sex'] ?>" type="text" id="wizard-progress2-firstname" name="wizard-progress2-firstname">
                        <label for="wizard-progress2-firstname">Sex</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <input class="form-control" type="number" readonly value="<?= $examiner_results['age'] ?>" id="wizard-progress2-lastname" name="wizard-progress2-lastname">
                        <label for="wizard-progress2-lastname">Age</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <input class="form-control" type="text" readonly value="<?= $examiner_results['sex'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                        <label for="wizard-progress2-email">Birthdate</label>
                    </div>
                </div>
            </div>
            <!-- END Step 1 -->
            <!-- Step 2 -->
            <div class="tab-pane" id="wizard-progress2-step2" role="tabpanel">
                <span class="block-title text-capitalize"><b>Verbal</b></span>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-material floating">
                                <input class="form-control" type="text" readonly value="<?= $examiner_results['verbal_comprehension'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                                <label for="wizard-progress2-email">Verbal Comprehension</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-material floating">
                                <input class="form-control" type="text" readonly value="<?= $examiner_results['verbal_reasoning'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                                <label for="wizard-progress2-email">Verbal Reasoning</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-material floating">
                                <input class="form-control" type="text" readonly value="<?= $examiner_results['verbal_total'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                                <label for="wizard-progress2-email">Verbal Total</label>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="block-title text-capitalize"><b>non verbal</b></span>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-material floating">
                                <input class="form-control" type="text" readonly value="<?= $examiner_results['figurative_reasoning'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                                <label for="wizard-progress2-email">Figurative Reasoning</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-material floating">
                                <input class="form-control" type="text" readonly value="<?= $examiner_results['quantitative_reasoning'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                                <label for="wizard-progress2-email">Quantitative Reasoning</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-material floating">
                                <input class="form-control" type="text" readonly value="<?= $examiner_results['non_verbal_total'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                                <label for="wizard-progress2-email">Non Verbal Total</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-material floating">
                        <input class="form-control" type="text" readonly value="<?= $examiner_results['over_all_total'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                        <label for="wizard-progress2-email">Over All Total</label>
                    </div>
                </div>
            </div>
            <!-- END Step 2 -->
            <!-- Step 3 -->
            <div class="tab-pane" id="wizard-progress2-step3" role="tabpanel">
                <div class="form-group">
                    <div class="form-material floating">
                        <input class="form-control" type="text" readonly value="<?= $examiner_results['first_course'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                        <label for="wizard-progress2-email">First Course</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <input class="form-control" type="text" readonly value="<?= $examiner_results['second_course'] ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                        <label for="wizard-progress2-email">Second Course</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-material floating">
                        <input class="form-control" type="text" readonly value="<?= date('d/m/Y h:i A',$examiner_results['exam_at']) ?>" id="wizard-progress2-email" name="wizard-progress2-email">
                        <label for="wizard-progress2-email">Exam at </label>
                    </div>
                </div>
            </div>
            <!-- END Step 3 -->
        </div>
        <!-- END Steps Content -->
        <!-- Steps Navigation -->
        <div class="block-content block-content-sm block-content-full bg-body-light">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                    <i class="fa fa-angle-left mr-5"></i> Previous
                    </button>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                    Next <i class="fa fa-angle-right ml-5"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- END Steps Navigation -->
    </form>
    <!-- END Form -->
</div>
<!-- END Progress Wizard 2 -->
</div>