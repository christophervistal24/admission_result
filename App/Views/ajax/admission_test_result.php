<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/App/init.php';
use App\Core\Database;
if (isset($_POST['action'])) {
    $db = (new Database())->connect();
    $action = $_POST['action'];
    switch ($action) {
        case 'add_admission_result':
            extract($_POST['info']);
            extract($_POST['exam_rating']);
            $db->beginTransaction();
            try {
                $sql =
                "
                INSERT INTO examiner_info
                (firstname,middlename,lastname,sex,age,birthdate)
                VALUES
                (?,?,?,?,?,?)
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
                INSERT INTO entrace_rating
                (verbal_comprehension,verbal_reasoning,figurative_reasoning,quantitative_reasoning,verbal_total,non_verbal_total,over_all_total)
                VALUES
                (?,?,?,?,?,?,?)
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
                $sql3 =
                "
                INSERT INTO preferred_courses
                (first_course,second_course)
                VALUES
                (?,?)
                ";
                $stmt3 = $db->prepare($sql3);
                $stmt3->execute([
                    $first_preferred_course,
                    $second_preferred_course,
                ]);
                $preferred_courses_id = $db->lastInsertId();
                $sql4 =
                "
                INSERT INTO admission_result
                (examiner_info_id,entrace_rating_id,preferred_courses_id,guidance_counselor,exam_at)
                VALUES
                (?,?,?,?,?)
                ";
                $stmt4 = $db->prepare($sql4);
                $stmt4->execute([
                    $info_id,
                    $entrace_rating_id,
                    $preferred_courses_id,
                    $guidance_counselor,
                    time(),
                ]);
                $db->commit();
            } catch (Exception $e) {
                echo $e->getMessage();
                $db->rollBack();
            }
            break;

        default:
            # code...
            break;
    }
}
