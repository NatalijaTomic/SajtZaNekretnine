<?php

/**
 * Copyright (C) DreamTeam
 *
 */

namespace DreamTeam;
use Exception;

class Property
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }
        public function getProperties()
        {
            $query = 'SELECT * FROM tbl_property WHERE status_id = 1';
            $propertyRecord = $this->ds->select($query);
            return $propertyRecord;
        }
        public function getPropertiesAgency()
        {
            $query = 'SELECT * FROM tbl_property';
            $propertyRecord = $this->ds->select($query);
            return $propertyRecord;
        }
        public function getProperty($id)
        {
            $query = 'SELECT * FROM tbl_property where id = ?';
            $paramType = 'i';
            $paramValue = array(
            $id
        );
        $propertyRecord = $this->ds->select($query, $paramType, $paramValue);
        return $propertyRecord;
        }
    public function propertyInsert()
        {
            if (strlen($_POST["adresa"])>0){
                $response = array(
                    "status" => "error",
                    "message" => "Adresa nije uneta."
                );
            } else if (strlen($_POST["cena"])>0){
                $response = array(
                    "status" => "error",
                    "message" => "Cena nije uneta."
                );
            }
                $query = 'INSERT INTO tbl_property (adresa, opis, cena, slika, status_id, agency_id) 
                                                    VALUES (?, ?, ?, ?, ?, ?)';
                $paramType = 'ssisii';
                $paramValue = array(
                    $_POST["adresa"],
                    $_POST["opis"],
                    $_POST["cena"],
                    $_POST["slika"],
                    1,
                    $_POST["agency_id"],
                );
                try{
                $propertyId = $this->ds->insert($query, $paramType, $paramValue);
                if (!empty($propertyId)) {
                    $response = array(
                        "status" => "success",
                        "message" => "Uspešno ste uneli nekretninu.",
                        "id" => $propertyId
                    );
                }
                else
                $response = array(
                    "status" => "error",
                    "message" => "Nekretnina nije uneta."
                );
                }catch (Exception $e){
                    $response = array(
                        "status" => "error",
                        "message" => $e->getMessage()
                    );
                }
                return $response;
            }
    
    public function propertySearch()
    {
        $query = 'SELECT * FROM `tbl_property` WHERE 
        (? = "" OR adresa = ? OR adresa LIKE CONCAT("%", adresa ,"%")) 
        AND
        (cena BETWEEN ? - 15000 AND ? + 15000)
        AND 
        (? = "" OR opis = ? OR opis LIKE CONCAT("%", opis ,"%"))' ;
        $paramType = 'ssiiss';
        $paramValue = array(
            $_POST["adresa"],
            $_POST["adresa"],
            $_POST["cena"],
            $_POST["cena"],
            $_POST["opis"],
            $_POST["opis"],
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        return $resultArray;
    }
    
    public function getAgencyProperties()
    {
        $query = 'SELECT * FROM tbl_property where agency_id = ?';
        $paramType = 'i';
        $paramValue = array(
            $_SESSION["agency_id"],
        );
        $agencyPropertyRecord = $this->ds->select($query, $paramType, $paramValue);
        return $agencyPropertyRecord;
    }
    public function propertyUpdate($id)
        {
                $query = 'UPDATE tbl_property SET adresa = ?, opis = ?, cena = ? where id = ?';
                $paramType = 'ssii';
                $paramValue = array(
                    $_POST["adresa"],
                    $_POST["opis"],
                    $_POST["cena"],
                    $id
                );
                $this->ds->execute($query, $paramType, $paramValue);
            }
    public function propSold($id)
    {
        $query = 'UPDATE tbl_property SET status_id = 4 where id = ?';
        $paramType = 'i';
        $paramValue = array(
            $id,
        );
        $this->ds->execute($query, $paramType, $paramValue);
    }
}
?>