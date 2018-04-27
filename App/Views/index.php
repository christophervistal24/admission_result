<div class="container-fluid jumbotron">
    <p class="text-center display-4">Write your PHP code</p>
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="POST">
                <div class="form-group text-center">
                    <textarea name="code" id="write_code" rows="20" class="form-control"  style="height :70vh;">
                    <?php
                    if(isset($_POST['code'])){
                    $code = trim($_POST['code']);
                    echo $code;
                    }
                    ?>
                    </textarea>
                </div>
                <input type="submit" value="Execute" class="float-right btn btn-primary">
            </form>
        </div>
        <div class="col-lg-6 bg-light" style="height :70vh;">
            <?php
            class Execute
            {
                public function run_code($str)
                {
                        return eval($str.";");
                }

            }
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                extract($_POST);
                $execute = new Execute;
                function customError($errno,$errstr){
                     echo "<br><b>Error: </b> $errstr";
                }
                set_error_handler("customError");
                echo $execute->run_code(trim($code));
            }
            ?>
        </div>
    </div>
</div>