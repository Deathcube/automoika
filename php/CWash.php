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
        $i = 0;
        foreach ($mainServiceData as $mainService) {
            $i++;
            $content .= '<div class="row">
                    <div class="namesell sc">'.$mainService['description'].'</div>
                    <div class="sell sc tA">'.$mainService['base_price'] * $carsData[0]['price_rate'].'</div>
                    <div class="sell sc tB">'.$mainService['base_price'] * $carsData[1]['price_rate'].'</div>
                    <div class="sell sc tC">'.$mainService['base_price'] * $carsData[2]['price_rate'].'</div>
                    <div class="sell sc tD">'.$mainService['base_price'] * $carsData[3]['price_rate'].'</div>
                    <div class="cbox"><input class="cb main_service" name="main_service" id="main_service'.$i.'" type="checkbox" /></div>
                </div><br>';
        }

        return $content;
    }

    function resultExtraServicesContent($extraServicesData, $carsData) {
        $content = null;
        $i = 0;
        foreach ($extraServicesData as $extraService) {
            $i++;
            $content .= '<div class="row">
                    <div class="namesell sc">' . $extraService['description'] . '</div>
                    <div class="sell sc tA">' . $extraService['base_price'] * $carsData[0]['price_rate'] . '</div>
                    <div class="sell sc tB">' . $extraService['base_price'] * $carsData[1]['price_rate'] . '</div>
                    <div class="sell sc tC">' . $extraService['base_price'] * $carsData[2]['price_rate'] . '</div>
                    <div class="sell sc tD">' . $extraService['base_price'] * $carsData[3]['price_rate'] . '</div>
                    <div class="cbox"><input class="cb extra_service" name="extra_service" id="extra_service' . $i . '" type="checkbox" /></div>
                </div><br>';
        }

        return $content;
    }

    function resultCleanerServicesContent($cleanerData, $carsData) {
        $content = null;
        $i = 0;
        foreach ($cleanerData as $cleanerService) {
            $i++;
            $content .= '<div class="row">
                    <div class="namesell sc">' . $cleanerService['description'] . '</div>
                    <div class="sell sc tA">' . $cleanerService['base_price'] * $carsData[0]['price_rate'] . '</div>
                    <div class="sell sc tB">' . $cleanerService['base_price'] * $carsData[1]['price_rate'] . '</div>
                    <div class="sell sc tC">' . $cleanerService['base_price'] * $carsData[2]['price_rate'] . '</div>
                    <div class="sell sc tD">' . $cleanerService['base_price'] * $carsData[3]['price_rate'] . '</div>
                    <div class="cbox"><input class="cb cleaner_service"  name="cleaner_service" id="cleaner_service' . $i . '" type="checkbox" /></div>
                </div><br>';
        }

        return $content;
    }
}


