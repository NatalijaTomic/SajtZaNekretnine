<?php

/**
 * Copyright (C) DreamTeam
 *
 */

namespace DreamTeam;
use Exception;

class Agency
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }
        public function getAgencies()
        {
            $query = 'SELECT * FROM tbl_agency';
            $propertyRecord = $this->ds->select($query);
            return $propertyRecord;
        }
        public function getAgency($agency_id)
        {
            $query = 'SELECT * FROM tbl_agency where id = ?';
            $paramType = 'i';
            $paramValue = array(
            $agency_id
        );
        $agencyRecord = $this->ds->select($query, $paramType, $paramValue);
        return $agencyRecord;
    }
    public function agencyInsert()
        {
                if (strlen($_POST["agency-name"])>0){
                    $response = array(
                        "status" => "error",
                        "message" => "Ime agencije nije uneto."
                    );
                } else if (strlen($_POST["agency-adresa"])>0){
                    $response = array(
                        "status" => "error",
                        "message" => "Adresa nije uneta."
                    );
                }
                $image = $_FILES['agency-slika']['name'];  //the original name of the image

                $file_tmp =$_FILES['agency-slika']['tmp_name']; //The temporary filename of the file in which the uploaded image was stored on the server.
                try{
                    move_uploaded_file($file_tmp,"images/".$image); //uploads the image to the defined folder
                }
                catch (Exception $ex){
                    $image = "";
                }

                $query = 'INSERT INTO tbl_agency (agency, adresa, opis, slika) 
                                                    VALUES (?, ?, ?, ?)';
                $paramType = 'ssss';
                $paramValue = array(
                    $_POST["agency-name"],
                    $_POST["agency-adresa"],
                    $_POST["agency-opis"],
                    $image,
                );
                try{
                $agencyId = $this->ds->insert($query, $paramType, $paramValue);
                if (!empty($agencyId)) {
                    $response = array(
                        "status" => "success",
                        "message" => "Uspešno ste uneli agenciju.",
                        "id" => $agencyId
                    );
                }
                else
                $response = array(
                    "status" => "error",
                    "message" => "Agencija nije uneta."
                );
                }catch (Exception $e){
                    $response = array(
                        "status" => "error",
                        "message" => $e->getMessage()
                    );
                }
                return $response;
            }
    }
?>