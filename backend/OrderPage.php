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

    private function getAllOrders()
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

        $tableContent = null;

        foreach ($orders as $id => $order) {

            $totalOrderPrice = 0;
            $carPriceRate = $this->getCarPriceRateByType($order['car']);
            $main_service = $this->getMainServiceDataById($order['main_service']);
            $totalOrderPrice += $main_service['base_price'] * $carPriceRate;
            $extra_services = $this->getExtraServicesDataByIds($order['extra_services']);
            $cleaner_services = $this->getCleanerServicesDataByIds($order['cleaner']);


            $tableContent .= '
                    <div class="singleOrder">
                        <div class="userData">
                            <form method="post" action="../backend/EditOrder.php">
                                <input name="order_id" value="'.$order['id'].'" type="hidden"/>
                                <div class="userName"><input class="uName uf" name="userName" type="text" value="'.$order['username'].'" disabled required /></div>
                                <div class="userPhone"><input class="uPhone uf" name="userPhone" type="text" value="'.$order['phone'].'" disabled required /></div>
                                <div class="userDate"><input class="uDate uf" name="userDate" type="text" value="'.$order['date'].'" disabled required /></div>
                                <div class="btns">
                                    <input class="editbtn" type="button" value="Редактировать" />
                                    <input type="submit" value="OK" />
                                </div>    
                            </form>
                            <form method="post" action="../backend/DeleteOrder.php">
                                <input name="order_id" value="'.$order['id'].'" type="hidden"/>
                                <input class="delOrder" type="submit" value="X" />    
                            </form>                      
                        </div>';

            $tableContent .= '<div class="userServises">';

            if($main_service != null) {
                $tableContent .= '
                            <div class="headline rn">Основная услуга</div>

                            <div class="item">
                                <p class="otext">' . $main_service['description'] . '</p>
                            </div>
                        ';
            }

            if($extra_services != null) {
                $tableContent .= '<div class="headline rn">Дополнительные улсуги</div>';

                foreach ($extra_services as $extra_service) {
                    $extra_service = $extra_service[0];
                    $totalOrderPrice += $extra_service['base_price'] * $carPriceRate;

                    $tableContent .= '<div class="item">
                                <p class="otext">' . $extra_service['description'] . '</p>
                            </div>';
                }
            }

            if($cleaner_services != null){
                $tableContent .= '<div class="headline rn">Химчистка</div>';

                foreach ($cleaner_services as $cleaner_service){
                    $cleaner_service = $cleaner_service[0];
                    $totalOrderPrice += $cleaner_service['base_price'] * $carPriceRate;

                    $tableContent .= '<div class="item">
                                <p class="otext">'.$cleaner_service['description'].'</p>
                            </div>';
                }
            }

            $tableContent .= '</div>';

            $tableContent .= '<div>
                                <p class="sum">Сумма заказа: '.$totalOrderPrice.'</p>
                            </div>';

            $tableContent .= '</div>';
        }

        return $tableContent;
    }
}
