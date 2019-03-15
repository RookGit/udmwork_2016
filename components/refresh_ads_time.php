<?php
session_start();
if ($_SESSION['id'] != null) {


    $error = false;
    switch ($_POST['type_ads']) {
        case "jobs":
            $mess = "вакансий";
            break;

        case "resume":
            $mess = "резюме";
            break;

        case "services":
            $mess = "услуг";
            break;

        default:
            $error = true;
            echo "error";
            exit;
            break;
    }

    if (!$error) {
        $db = Db::getConnection();
        $query = $db->prepare("SELECT balance FROM users WHERE id=:id ");
        $params = ['id' => $_SESSION['id']];
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetch();

        if ($result['balance'] >= 25) {

            $query_3 = $db->prepare("UPDATE users SET balance = balance - 25 WHERE id = :id;");
            $params_3 = [
                'id' => $_SESSION['id']
            ];
            $query_3 -> execute($params_3);

            $query_3 = $db->prepare("UPDATE {$_POST['type_ads']} SET time = :time WHERE author = :author;");
            $params_3 = [
                'time' => time(),
                'author' => $_SESSION['id']
            ];
            $query_3 -> execute($params_3);

            echo "success";
        } else
            echo "error_balance";
    }


} else
    echo "error";


