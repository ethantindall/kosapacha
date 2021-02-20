<?php

function checkExistingUsername($username) {
    $db =  kosapachaConnect();
    $sql = "SELECT employee_username FROM employees WHERE employee_username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $match = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($match)){
        return 0;
    } else {
        return 1;
    }
}

function getUser($username){
    $db = kosapachaConnect();
    $sql = 'SELECT * FROM employees
            LEFT JOIN credentials ON employees.employee_id = credentials.credential_employee
            WHERE employee_username = :username;';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}

function createUser($fname, $mname, $lname, $username) {
    $db = kosapachaConnect();
    $sql = "INSERT INTO employees (employee_fname, employee_mname, employee_lname, employee_max_hours, employee_username)
                    VALUES (:fname, :mname, :lname, 40, :username)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindValue(':mname', $mname, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
}

function storePassword($username, $password) {
    $data = getUser($username);
    $id = $data['employee_id'];

    $db = kosapachaConnect();
    $sql = "INSERT INTO credentials (credential_employee, credential_password)
                    VALUES (:id, :password)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $stmt->execute();

}
?>