<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/App/init.php';
use App\Model\User;
if (isset($_POST['action'])) {
    $user = (new User);
    $db = (new User)->connect();
    $action = $_POST['action'];
    switch ($action) {
        case 'add_admission_result':
            extract($_POST['info']);
            extract($_POST['exam_rating']);
            $db->beginTransaction();
            try {
                $sql =
                "
                INSERT INTO `examiner_info`(
                    `firstname`,
                    `middlename`,
                    `lastname`,
                    `sex`,
                    `age`,
                    `birthdate`
                )
                VALUES(?,?,?,?,?,?)
                ";
                $stmt1 = $db->prepare($sql);
                $stmt1->execute([
                    $firstname,
                    $middlename,
                    $lastname,
                    $sex,
                    $age,
                    $birthdate,
                ]);
                $info_id = $db->lastInsertId();
                $sql2 =

                "
                INSERT INTO `entrace_rating`(
                `verbal_comprehension`,
                `verbal_reasoning`,
                `figurative_reasoning`,
                `quantitative_reasoning`,
                `verbal_total`,
                `non_verbal_total`,
                `over_all_total`
                 )
            VALUES(?, ?, ?, ?, ?, ?, ?)
                ";
                $stmt2 = $db->prepare($sql2);
                $stmt2->execute([
                    $verbal_comprehension,
                    $verbal_reasoning,
                    $figurative_reasoning,
                    $quantitative_reasoning,
                    $verbal_total,
                    $non_verbal_total,
                    $over_all_total,
                ]);
                $entrace_rating_id = $db->lastInsertId();
                $sql4 =
                "
                INSERT INTO `admission_result`(
                    `examiner_info_id`,
                    `entrace_rating_id`,
                    `preferred_course_id_1`,
                    `preferred_course_id_2`,
                    `guidance_counselor`,
                    `exam_at`
                )
                VALUES(?,?,?,?,?,?)
                ";
                $stmt4 = $db->prepare($sql4);
                $stmt4->execute([
                    $info_id,
                    $entrace_rating_id,
                    $first_preferred_course,
                    $second_preferred_course,
                    $guidance_counselor,
                    time(),
                ]);
                $result_id = $db->lastInsertId();
                if($db->commit() === true){
                    echo json_encode(['success'=>true,'result_id'=>$result_id]);
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                $db->rollBack();
            }
            break;

    }
}
