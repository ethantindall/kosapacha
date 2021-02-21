<?php 

function saveTime($id, $date, $mon, $tues, $wed, $thurs, $fri, $sat, $sun) {
    $db = kosapachaConnect();
    $sql = "INSERT INTO timesheets (timesheet_employee, timesheet_week, mon_time, tues_time, wed_time, thurs_time, fri_time, sat_time, sun_time)
    VALUES
     (:id, :date, :mon, :tues, :wed, :thurs, :fri, :sat, :sun)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':mon', $mon);
    $stmt->bindValue(':tues', $tues);
    $stmt->bindValue(':wed', $wed);
    $stmt->bindValue(':thurs', $thurs);
    $stmt->bindValue(':fri', $fri);
    $stmt->bindValue(':sat', $sat);
    $stmt->bindValue(':sun', $sun);
    $stmt->execute();

    
}

function checkExistingTimesheet($userId, $weekOf) {
    $db = kosapachaConnect();
    $sql = 'SELECT * FROM timesheets
            WHERE timesheet_employee = :id AND timesheet_week = :week';
   
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':week', $weekOf, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    if(empty($userData)){
        return 0;
    } else {
        return $userData;
    }
    
}
function updatePassword($userId, $password) {

    $db = kosapachaConnect();
    $sql = 'UPDATE credentials SET
            credential_password = :password
            WHERE credential_employee = :id;';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $stmt->execute();
}
?>
?>