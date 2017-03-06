<?php
    require_once "DB.php";

class OrderPage
{
    private function getCarPriceRateByType($type) {

        if(!$type){
            return;
        }

        $db = DB::dbConnect();
        $array = array(
            "type" => $type
        );

        $sql = "SELECT `price_rate`
                  FROM `cars`
                    WHERE `type` = :type";

        $stmt = $db->prepare($sql);
        $stmt->execute($array);

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);

        return $result[0]['price_rate'];
    }

    public function getAllOrders()
    {
        $db = DB::dbConnect();
        $sql = "SELECT *
                  FROM `order`";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);

        return $result;
    }

    private function getMainServiceDataById($id = null){

        if($id == null){
            return;
        }

        $db = DB::dbConnect();


        $array = array(
            "id" => $id
        );

        $sql = "SELECT *
                  FROM `main_services`
                    WHERE `id` = :id";

        $stmt = $db->prepare($sql);
        $stmt->execute($array);

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);

        return $result[0];
    }

    private function getExtraServicesDataByIds($IDs){

        if($IDs == null){
            return;
        }

        $db = DB::dbConnect();

        $services_ids = array_filter(explode(';', $IDs));

        $result = null;
        foreach ($services_ids as $service_id){
            $array = array(
                "id" => $service_id
            );

            $sql = "SELECT *
                  FROM `extra_services`
                    WHERE `id` = :id";

            $stmt = $db->prepare($sql);
            $stmt->execute($array);

            $result[] = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    private function getCleanerServicesDataByIds($IDs){

        if($IDs == null){
            return;
        }

        $db = DB::dbConnect();

        $cleaner_ids = array_filter(explode(';', $IDs));

        $result = null;
        foreach ($cleaner_ids as $cleaner_id){
            $array = array(
                "id" => $cleaner_id
            );

            $sql = "SELECT *
                  FROM `cleaner`
                    WHERE `id` = :id";

            $stmt = $db->prepare($sql);
            $stmt->execute($array);

            $result[] = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function manageOrderDBData(){
        $orders = $this->getAllOrders();

        foreach ($orders as $id => $order) {
            // invisible input with order id
            $totalOrderPrice = 0;
            $carPriceRate = $this->getCarPriceRateByType($order['car']);
            $main_service = $this->getMainServiceDataById($order['main_service']);
            $totalOrderPrice += $main_service['base_price'] * $carPriceRate;
            $extra_services = $this->getExtraServicesDataByIds($order['extra_services']);
            $cleaner_services = $this->getCleanerServicesDataByIds($order['cleaner']);

            foreach ($extra_services as $extra_service){
                $extra_service = $extra_service[0];
                $totalOrderPrice += $extra_service['base_price'] * $carPriceRate;

            }

            foreach ($cleaner_services as $cleaner_service){
                $cleaner_service = $cleaner_service[0];
                $totalOrderPrice += $cleaner_service['base_price'] * $carPriceRate;

            }


        }
    }
}
