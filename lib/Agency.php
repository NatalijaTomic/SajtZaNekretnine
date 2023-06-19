<?php

/**
 * Copyright (C) DreamTeam
 *
 */

namespace DreamTeam;

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
                $query = 'INSERT INTO tbl_agency (agency, adresa, opis, slika) 
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
    }
?>