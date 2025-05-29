<?php

session_start();
require '../libs/model.php';
require '../libs/mailer.php';
require '../config/path.php';
$db = new Model();
$mail = new Mailer();
$conn = $db->connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['outgoing_upload'])) {
        $cno = filter_var(trim($_POST['cno']), FILTER_SANITIZE_SPECIAL_CHARS);
        $so = filter_var(trim($_POST['so']), FILTER_SANITIZE_SPECIAL_CHARS);
        $ro = filter_var(trim($_POST['ro']), FILTER_SANITIZE_SPECIAL_CHARS);
        $pl = filter_var(trim($_POST['pl']), FILTER_SANITIZE_SPECIAL_CHARS);
        $rm = filter_var(trim($_POST['rm']), FILTER_SANITIZE_SPECIAL_CHARS);
        $file = filter_var(trim($_POST['file']), FILTER_SANITIZE_SPECIAL_CHARS);
        $recipients = $_POST['recipients'];

        $stmt = $conn->prepare("SELECT * FROM outgoing_file WHERE control_no = :control_no");
        $stmt->execute(['control_no' => $cno]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stat = false;
        $emailStat = false;
        if (count($result) <= 0) {

            $processedEmails = array();
            //  
            foreach ($recipients as $recipient) {
                $newrecep = explode('-', $recipient);

                if (in_array($newrecep[1], $processedEmails)) {
                    continue; // Skip to the next recipient if the email address has already been processed
                }

                $param = [
                    'control_no' => $cno,
                    'sending_office' => $so,
                    'particulars' => $pl,
                    'receving_office' => $ro,
                    'remarks' => $rm,
                    'do_id' => $file,
                    'shared_by' => $_SESSION['dmsmo_users'],
                    'users_id' =>  $newrecep[0],
                    'status' => 'outgoing'
                ];

                $processedEmails[] = $newrecep[1];

                $result = $db->query("INSERT INTO outgoing_file (control_no, sending_office, particulars, receving_office,remarks,do_id ,shared_by,users_id,status) VALUES (:control_no, :sending_office, :particulars, :receving_office, :remarks, :do_id , :shared_by, :users_id, :status)", $param);
                if ($result) {
                    $stat = true;
                } else {
                    $stat = false;
                }
            }

            $stmt = $conn->prepare("SELECT * FROM file_documents WHERE do_id = :do_id");
            $stmt->execute(['do_id' => $file]);
            $fetch_file = $stmt->fetch();
          
            if ($stmt->rowCount() > 0) {
                $link = URL . 'download?id=' . $fetch_file->do_id;
                $filename = $fetch_file->filename;
                $subject = "DMSMO | DOCUMENTS";
                $html = $mail->emailTemplate($cno, $pl, $rm, $filename, $link);
                $msgWithNoHtml = '';

                $re = $mail->sendEmailMulti(
                    $processedEmails,
                    $subject,
                    $html,
                    $msgWithNoHtml
                );
                if ($re) {
                    $emailStat = true;
                } else {
                    $emailStat = false;
                }

                if ($stat == true && $emailStat == true) {
                    echo 'ok';
                } else if ($emailStat == false) {
                    echo 'emailer';
                } else {
                    echo "error";
                }
            } else {
                echo "err";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['incoming_upload'])) {
        $cno = filter_var(trim($_POST['icno']), FILTER_SANITIZE_SPECIAL_CHARS);
        $pl = filter_var(trim($_POST['ipl']), FILTER_SANITIZE_SPECIAL_CHARS);
        $dr = filter_var(trim($_POST['idr']), FILTER_SANITIZE_SPECIAL_CHARS);
        $rm = filter_var(trim($_POST['irm']), FILTER_SANITIZE_SPECIAL_CHARS);
        $file = filter_var(trim($_POST['ifile']), FILTER_SANITIZE_SPECIAL_CHARS);
        $recipients = $_POST['irecipients'];

        $stmt = $conn->prepare("SELECT * FROM incoming_file WHERE control_no = :control_no");
        $stmt->execute(['control_no' => $cno]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'control_no' => $cno,
                'particulars' => $pl,
                'directions' => $dr,
                'remarks' => $rm,
                'do_id' => $file,
                'shared_by' => $_SESSION['dmsmo_users'],
                'users_id' =>  $recipients,
                'status' => 'incoming'
            ];

            $result = $db->query("INSERT INTO incoming_file (control_no, particulars, directions,remarks,do_id ,shared_by,users_id,status) VALUES (:control_no, :particulars, :directions,:remarks, :do_id , :shared_by, :users_id, :status)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }
}
