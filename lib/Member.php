<?php

/**
 * Copyright (C) DreamTeam
 *
 */

namespace DreamTeam;

class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    public function getMember($username)
    {
        $query = 'SELECT * FROM tbl_member m INNER JOIN tbl_status s ON m.status_id = s.id where username = ? AND status = "active"';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    public function getAgency()
    {
        $query = 'SELECT * FROM tbl_agency';
        $agencyRecord = $this->ds->select($query);
        return $agencyRecord;
    }

    public function updateMember($userIds)
    {
        $query = 'UPDATE tbl_member SET  status_id = 1 where id in ( ? )';
        $paramType = 'i';
        $paramValue = array(
            $userIds
        );
        $this->ds->execute($query, $paramType, $paramValue);
    }

    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["username"]);
        $loginPassword = 0;
        if (!empty($memberRecord)) {
            if (!empty($_POST["password"])) {
                $password = $_POST["password"];
                echo "ima pasvord";
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
            echo "nema pasvord";
        }
        if ($loginPassword == 1) {
            // login sucess so store the member's username in
            // the session
            session_start();
            $_SESSION["username"] = $memberRecord[0]["username"];
            $_SESSION["name"] = $memberRecord[0]["name"];
            $_SESSION["agency_id"] = $memberRecord[0]["agency_id"];
            $_SESSION["userType"] = $this->userTypeToText($memberRecord[0]["usertype"]);
            session_write_close();
            $url = "index.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Netačno korisničko ime ili lozinka.";
            return $loginStatus;
        }
    }

    public function registerMember2()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordcheck = $_POST['passwordcheck'];

        // Validate the input data
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Neispravan format imejl adrese.");
        }
        if (strlen($password) < 8) {
            die("Lozinka mora da sadrži najmanje 8 karaktera.");
        }

        // Insert the user's information into the database
        $sql = "INSERT INTO tbl_member (name, email, password)
            VALUES ('$name', '$email', '$password')";

        if ($this->ds->insert($sql, "", array())) {
            // Redirect the user to the success page
            header("Location: success.php");
        } else {
            echo "Error: " . $sql . "<br>";
        }
    }

    /**
     * to signup / register a user
     *
     * @return string[] registration status message
     */
    public function registerMember()
    {
        $isUsernameExists = $this->isUsernameExists($_POST["username"]);
        $isEmailExists = $this->isEmailExists($_POST["email"]);
        $passwordMatches = $this->isPasswordMatches($_POST['password'], $_POST['passwordcheck']);
        $usertypeOk = $this->isUsertypeCorrect($_POST['usertype']);
        if ($isUsernameExists) {
            $response = array(
                "status" => "error",
                "message" => "Korisničko ime je već u upotrebi."
            );
        } else if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Ovaj imejl je već u upotrebi."
            );
        } else if (!$passwordMatches) {
            $response = array(
                "status" => "error",
                "message" => "Lozinke se ne poklapaju."
            );
        } else if (strlen($_POST['password']) < 8) {
            $response = array(
                "status" => "error",
                "message" => "Lozinka je kraća od 8 karaktera."
            );
        } else if ($usertypeOk != null && !$usertypeOk) {
            $response = array(
                "status" => "error",
                "message" => "Pogrešan tip korisnika."
            );
        } else {
            if (!empty($_POST["password"])) {

                // PHP's password_hash is the best choice to use to store passwords
                // do not attempt to do your encryption, it is not safe
                $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }
            $query = 'INSERT INTO tbl_member (name, lastname, username, password, email, phone, 
                                                birthdate, city, usertype, agency_id, agent_licence, status_id) 
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $paramType = 'ssssssdsiisi';
            $paramValue = array(
                $_POST["name"],
                $_POST["lastname"],
                $_POST["username"],
                $hashedPassword,
                $_POST["email"],
                $_POST["phone"],
                $_POST["birthdate"],
                $_POST["city"],
                $_POST["usertype"],
                $_POST["agency_id"],
                $_POST["agent_licence"],
                3
            );
            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            if (!empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "Uspešno ste se registrovali."
                );
            }
        }
        return $response;
    }

    /**
     * to check if the username already exists
     *
     * @param string $username
     * @return boolean
     */
    public function isUsernameExists($username)
    {
        $query = 'SELECT * FROM tbl_member where username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to check if the email already exists
     *
     * @param string $email
     * @return boolean
     */
    public function isEmailExists($email)
    {
        $query = 'SELECT * FROM tbl_member where email = ?';
        $paramType = 's';
        $paramValue = array(
            $email
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }


    /**
     * to check if passwords match
     *
     * @param string $password
     * @param string $passwordcheck
     * @return boolean
     */
    public function isPasswordMatches($password, $passwordcheck)
    {
        if ($password = $passwordcheck && $password != "") {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to check if the usertype is 0, 1 or 2
     *
     * @param string $usertype
     * @return boolean
     */
    public function isUsertypeCorrect($usertype)
    {
        if ($usertype = 0 || $usertype = 1 || $usertype = 2 || $usertype = 3) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function userTypeToText($usertype)
    {
        switch ($usertype) {
            case 0:
                return 'admin';
            case 1:
                return 'customer';
            case 2:
                return 'sole agent';
            case 3:
                return 'agency';
            default:
                return 'customer';
        }
    }
}
?>
