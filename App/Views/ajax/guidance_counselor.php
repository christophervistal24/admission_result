<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/App/init.php';
use App\Model\User;
if (isset($_POST['action'])) {
    $user = (new User);
    $db = (new User)->connect();
    $action = $_POST['action'];
    switch ($action) {
        case 'add_new_g_counselor' :
                extract($_POST);
                extract($_FILES['signature_image']);
                $path = 'assets/img/uploads/';
                  $stmt = $db->prepare("
                        INSERT INTO `guidance_conselors`
                        (`fullname`,`position`,`signature`,`created_at`)
                        VALUES(?,?,?,?)
                ");
                  $result = $stmt->execute(
                    [
                        $fullname_with_degree,
                        $position,
                        $name,
                        time(),
                    ]
                );
                if ($result === true &&  move_uploaded_file($tmp_name,APP['URL_ROOT'].$path.$name)) {
                        echo json_encode(['success'=>true,'message'=>'Successfully add new Guidance Counselor']);
                }
        break;

        case 'getDetails' :
            $id = $_POST['guidance_id'];
            echo json_encode(['informations'=>$user->getGuidanceConselorByName($id)]);
        break;

        case 'edit_g_counselor':
             extract($_POST);
             extract($_FILES['signature_image']);
                $path = 'assets/img/uploads/';
                 $stmt = $db->prepare("
                        UPDATE
                            `guidance_conselors`
                        SET
                            `fullname` = ?,`position` = ?,`signature` = ?,`updated_at` = ?
                        WHERE
                            `id` = ?
                ");
                  $result = $stmt->execute(
                    [
                        $fullname_with_degree,
                        $position,
                        $name,
                        time(),
                        $id,
                    ]
                );
                if ($result === true &&  move_uploaded_file($tmp_name,APP['URL_ROOT'].$path.$name)) {
                        echo json_encode(['success'=>true,'message'=>'Information Update','image'=>$name]);
                }
        break;
    }
}
