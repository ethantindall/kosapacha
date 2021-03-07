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



function adminGetUsers() {
    $allUsers = array();
    $db = kosapachaConnect();
    $sql = 'SELECT * FROM employees LEFT JOIN credentials
    ON employees.employee_id = credentials.credential_employee';   
    foreach ($db->query($sql) as $row) {
        $allUsers[] = $row;
    }
    return $allUsers;
}

function adminGetOneUser($userId) {
    $users = array();
    $db = kosapachaConnect();
    $sql = 'SELECT * FROM employees LEFT JOIN credentials
    ON employees.employee_id = credentials.credential_employee
    WHERE employee_id = ' .$userId;  
    foreach ($db->query($sql) as $row) {
        $users[] = $row;
    }
    return $users;
}

function usersTable(){
    $table = "";
    $allUsers = adminGetUsers();
    if(empty($allUsers)){
        return 'No Employees Found';
    } else {
        foreach ($allUsers as $user) {
            $table .= '<tr>
                          <td>'. $user['employee_fname'] . ' ' . $user['employee_lname'].'</td>  
                          <td>'. $user['employee_access'] .'</td>  
                          <td>'. $user['employee_status'] .'</td>  
                          <td><a href="/employee/index.php/?action=editUserPage&user='. $user['employee_id'] .'">Edit</a></td>
                       </tr>';
        }
    }
    return $table;
}
function updateUser($userId, $fname, $mname, $lname, $username, $status, $access, $notes) {
    $db = kosapachaConnect();
    $sql = 'UPDATE employees SET
                employee_fname = :fname,
                employee_mname = :mname,
                employee_lname = :lname,
                employee_username = :username,
                employee_status = :estatus,
                employee_access = :access,
                employee_notes = :notes
            WHERE employee_id = :id';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindValue(':mname', $mname, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':estatus', $status, PDO::PARAM_STR);
    $stmt->bindValue(':access', $access, PDO::PARAM_STR);
    $stmt->bindValue(':notes', $notes, PDO::PARAM_STR);

    $stmt->execute();
}

?>
