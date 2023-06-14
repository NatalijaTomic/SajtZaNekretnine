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
    }
?>