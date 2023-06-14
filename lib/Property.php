<?php

/**
 * Copyright (C) DreamTeam
 *
 */

namespace DreamTeam;

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
                $query = 'INSERT INTO tbl_property (adresa, opis, cena, slika) 
                                                    VALUES (?, ?, ?, ?)';
                $paramType = 'ssis';
                $paramValue = array(
                    $_POST["adresa"],
                    $_POST["opis"],
                    $_POST["cena"],
                    $_POST["slika"],
                );
                $memberId = $this->ds->insert($query, $paramType, $paramValue);
                if (!empty($memberId)) {
                    $response = array(
                        "status" => "success",
                        "message" => "Uspešno ste uneli nekretninu."
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
}
?>