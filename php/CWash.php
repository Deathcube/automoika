<?php
require_once "DB.php";

class CWash
{
    function getMainServicesData() {
        $db = DB::dbConnect();

        $sql = "SELECT *
                  FROM `main_services`";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        return $result;
    }

    function getExtraServicesData() {
        $db = DB::dbConnect();

        $sql = "SELECT *
                  FROM `extra_services`";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        return $result;
    }

    function getCleanerServicesData() {
        $db = DB::dbConnect();

        $sql = "SELECT *
                  FROM `cleaner`";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        return $result;
    }

    function getCarsPriceRate() {
        $db = DB::dbConnect();

        $sql = "SELECT *
                  FROM `cars`";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        return $result;
    }



    function getMainServiceTableContent() {
        return $this->resultMainServicesContent($this->getMainServicesData(), $this->getCarsPriceRate());
    }

    function getExtraServiceTableContent() {
        return $this->resultExtraServicesContent($this->getExtraServicesData(), $this->getCarsPriceRate());
    }

    function getCleanerServiceTableContent() {
        return $this->resultCleanerServicesContent($this->getCleanerServicesData(), $this->getCarsPriceRate());
    }

    function resultMainServicesContent($mainServiceData, $carsData) {
        $content = null;
        foreach ($mainServiceData as $mainService) {

        }

        return $content;
    }

    function resultExtraServicesContent($extraServicesData, $carsData) {
        $content = null;
        foreach ($extraServicesData as $extraService) {

        }

        return $content;
    }

    function resultCleanerServicesContent($cleanerData, $carsData) {
        $content = null;
        foreach ($cleanerData as $cleanerService) {

        }

        return $content;
    }
}


