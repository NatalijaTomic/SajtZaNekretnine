<?php

/**
 * Copyright (C) DreamTeam
 *
 */

namespace DreamTeam;
use Exception;

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

    public function getMembers()
    {
        $query = 'SELECT m.*, s.id as statusId, s.status as status FROM tbl_member m INNER JOIN tbl_status s ON m.status_id = s.id where usertype <> 0';
        $paramType = '';
        $paramValue = array(
        );
        $memberRecords = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecords;
    }

    public function getAgency()
    {
        $query = 'SELECT * FROM tbl_agency';
        $agencyRecord = $this->ds->select($query);
        return $agencyRecord;
    }

    public function updateMember($userId)
    {
        $query = 'SELECT * FROM tbl_member where id = ?';
        $paramType = 'i';
        $paramValue = array(
            $userId
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $status = $resultArray[0]["status_id"];
            $query = 'UPDATE tbl_member SET status_id = ? where id in ( ? )';
            $paramType = 'ii';
            $paramValue = array(
                $status == 1 ? 3 : 1,
                $userId              
            );
            $this->ds->execute($query, $paramType, $paramValue);
        }
    }

    public function updateMemberProfile($userId)
    {
            $query = 'UPDATE tbl_member SET name = ?, lastname = ?, usertype = ?, agency_id = ?, agent_licence = ? where id in ( ? )';
            $paramType = 'ssiisi';
            $paramValue = array(
                $_POST["user-firstname"],
                $_POST["user-lastname"],
                $_POST["user-type"],
                $_POST["agency_id"],
                $_POST["user-agencylicence"],     
                $userId       
            );
            $this->ds->execute($query, $paramType, $paramValue);
    }
    public function updateMemberFullProfile($username)
    {
        $isEmailExists =  $_SESSION["email"] != $_POST["email"] && $this->isEmailExists($_POST["email"]);
        if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Ovaj imejl je već u upotrebi."
            );
        }
            $query = 'UPDATE tbl_member SET name = ?, lastname = ?, email= ?, phone= ?, 
            birthdate= ?, city= ?, agency_id = ?, agent_licence = ? 
            where username = ?';
            $paramType = 'ssssssiss';
            $paramValue = array(
                $_POST["name"],
                $_POST["lastname"],
                $_POST["email"],
                $_POST["phone"],
                date("Y-m-d",strtotime ($_POST["birthdate"])),
                $_POST["city"],
                $_POST["agency_id"],
                $_POST["agent_licence"],     
                $username       
            );
            try{
                $this->ds->execute($query, $paramType, $paramValue);
                $response = array(
                    "status" => "success",
                    "message" => "Uspešno ste se izmenili podatke!"
                );
            }catch (Exception $e){
                $response = array(
                    "status" => "error",
                    "message" => $e->getMessage()
                );
            }

        return $response;
    }

    public function updateMemberPassword($username)
    {
        if($username == $_SESSION["username"])
        {
            $passwordMatches = $this->isPasswordMatches($_POST['password'], $_POST['passwordcheck']);
            if (!$passwordMatches) {
                $response = array(
                    "status" => "error",
                    "message" => "Lozinke se ne poklapaju."
                );
            } else if (strlen($_POST['password']) < 8) {
                $response = array(
                    "status" => "error",
                    "message" => "Lozinka je kraća od 8 karaktera."
                );
            } else {
                if (!empty($_POST["password"])) {

                    // PHP's password_hash is the best choice to use to store passwords
                    // do not attempt to do your encryption, it is not safe
                    $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
                }
                $query = 'UPDATE tbl_member SET  password= ?
                where username = ?';
                $paramType = 'ss';
                $paramValue = array(    
                    $hashedPassword,           
                    $username       
                );
                try{
                    $this->ds->execute($query, $paramType, $paramValue);
                    $response = array(
                        "status" => "success",
                        "message" => "Uspešno ste izmenili šifru!"
                    );
                }catch (Exception $e){
                    $response = array(
                        "status" => "error",
                        "message" => "Greška: ". $e->getMessage()
                    );
                }
            }
        }
        else{
            $response = array(
                "status" => "error",
                "message" => "Greška: Ne možete promeniti šifru drugog usera ;) "
            );
        }
        return $response;
    }

    public function removeMember($userId)
    {
        $query = 'DELETE FROM tbl_member where id = ?';
        $paramType = 'i';
        $paramValue = array(
            $userId
        );
        $this->ds->execute($query, $paramType, $paramValue);
    }
    public function updateFavProp($username)
    {
        $query = 'UPDATE tbl_member SET fav_prop_id = ? where username = ?';
        $paramType = 'is';
        $paramValue = array(
            $_POST["id"],
            $username
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
                //echo "ima pasvord";
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
            //echo "nema pasvord";
        }
        if ($loginPassword == 1) {
            // login sucess so store the member's username in
            // the session
            session_start();
            $_SESSION["userid"] = $memberRecord[0]["id"];
            $_SESSION["username"] = $memberRecord[0]["username"];
            $_SESSION["name"] = $memberRecord[0]["name"];
            $_SESSION["email"] = $memberRecord[0]["email"];
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
            $paramType = 'ssssssssiisi';
            $paramValue = array(
                $_POST["name"],
                $_POST["lastname"],
                $_POST["username"],
                $hashedPassword,
                $_POST["email"],
                $_POST["phone"],
                date ("Y-m-d",strtotime ($_POST["birthdate"])),
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
                return 'Admin';
            case 1:
                return 'Kupac';
            case 2:
                return 'Agent za nekretnine';
            case 3:
                return 'Agencija';
            default:
                return 'Kupac';
        }
    }

    public function userTypeToClass($usertype)
    {
        switch ($usertype) {
            case 0:
                return 'danger';
            case 1:
                return 'success';
            case 2:
                return 'info';
            case 3:
                return 'warning';
            default:
                return 'success';
        }
    }

    public function userStatusToCheckbox($userstatus, $userId)
    {
        switch ($userstatus) {
            case "request":
                return '<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked'.$userId.'" value="'.$userId.'" >
                <label class="form-check-label" for="flexSwitchCheckChecked">Neaktivan</label>
              </div>';
            case "active":
                return '<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked'.$userId.'"  value="'.$userId.'" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Aktivan</label>
              </div>';
        }
    }
    public function favPropToCheckbox($propertyId, $userId)
    {
        switch ($propertyId) {
            case "request":
                return '<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked'.$userId.'" value="'.$userId.'" >
                <label class="form-check-label" for="flexSwitchCheckChecked">Neaktivan</label>
              </div>';
            case "active":
                return '<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked'.$userId.'"  value="'.$userId.'" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Aktivan</label>
              </div>';
        }
    }
}
?>
