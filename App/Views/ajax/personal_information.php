<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/App/init.php';
use App\Model\User;
use App\Core\Functions;
if (isset($_POST['action'])) {
    $user = (new User);
    $db = (new User)->connect();
    $action = $_POST['action'];
    switch ($action)
    {
        case 'check_password' :
            extract($_POST);
             $result = $user->checkPassword($_SESSION['id'],$password);

             if($result){
                echo json_encode(true);
              }else{
                echo json_encode(false);
              }
        break;

         case 'check_password2' :
            extract($_POST);
             $result = $user->checkPassword($_SESSION['id'],$password);

             if(!$result){
                echo json_encode(true);
              }else{
                echo json_encode(false);
              }
        break;

        case 'check_username' :
            $username = $_POST['username'];
            $result = $db->query("SELECT COUNT(username) as is_exists FROM tbl_users WHERE username = '$username'")->fetch(PDO::FETCH_ASSOC);
            if ($result['is_exists']) {
                echo json_encode(false);
            }else{
                echo json_encode(true);
            }
        break;

        case 'change_personal_information' :
            extract($_POST);
            $id = $_SESSION['id'];
            $stmt = $db->prepare("
              UPDATE
                    `tbl_user_info`
                SET
                    `firstname`  = ?,`middlename` = ?,`lastname` = ?,`gender` = ?,`birthdate` = ?
                WHERE
                    `user_id` = ?
            ");
            $result = $stmt->execute([
                $firstname,
                $middlename,
                $lastname,
                $gender,
                $birthday,
                $id,
            ]);

            if ($result == true) {
                echo json_encode([
                        'success'=>true,
                        'message'=>'Personal information update',
                        'firstname'  => $firstname,
                        'middlename' => $middlename,
                        'lastname'   => $lastname,
                ]);
            }
        break;

        case '_password_change':
            extract($_POST);
            $id = $_SESSION['id'];
            $stmt = $db->prepare("
              UPDATE
                    `tbl_users`
                SET
                    `password`  = ?
                WHERE
                    `id` = ?
            ");
            $result = $stmt->execute([
                 Functions::set_password_hash($change_new_password),
                 $id,
            ]);

            if ($result == true) {
                echo json_encode([
                        'success'=>true,
                        'message'=>'Password update',
                ]);
            }
        break;

        case '_username_change':
           extract($_POST);
          $id = $_SESSION['id'];
          $stmt = $db->prepare("
              UPDATE
                    `tbl_users`
                SET
                    `username`  = ?
                WHERE
                    `id` = ?
            ");
            $result = $stmt->execute([
                 $username,
                 $id,
            ]);

            if ($result == true) {
                echo json_encode([
                        'success'=>true,
                        'message'=>'Username update',
                ]);
            }
        break;

        case '_change_profile':
        extract($_FILES['profile_picture']);
        $id = $_SESSION['id'];
        $path = 'assets/img/uploads/';
          $stmt = $db->prepare("
                  UPDATE
                    `tbl_user_info`
                SET
                    `profile`  = ?
                WHERE
                    `id` = ?
        ");
          $result = $stmt->execute(
            [
                $name,
                $id,
            ]
        );
        if ($result === true &&  move_uploaded_file($tmp_name,APP['URL_ROOT'].$path.$name)) {
                echo json_encode(['success'=>true,'message'=>'Profile update','img'=>$name]);
        }
        break;

    }
}
