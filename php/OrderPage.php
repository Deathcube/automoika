<?php
    require_once "connect.php";
    session_start();

class OrderedCoffee
{
    function getAllClientCoffee()
    {
        $db = $this->connectToDB();
        $id_client = $_SESSION["id_user"];
        $sql = "SELECT `buying`.`id_coffee`
                      FROM `buying`
                        WHERE `buying`.`id_client` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id_client));

        $result = $stmt->FETCHALL(PDO::FETCH_NUM);
        $array = null;
        foreach($result as $key => $str)
        {
            $array[$key] = $str[0];
        }
        return $array;
    }

    function getAllCoffeeData()
    {
        $id_client = $_SESSION["id_user"];

        $db = $this->connectToDB();

        $sql = "SELECT `coffee`.`id_coffee`, `coffee`.`id_coffee`, `coffee`.`coffeeName`, `coffee`.`img`, `coffee`.`price`, `producer`.`producerName`, `producer`.`location`, `buying`.`id_order`
                      FROM `coffee`,`producer`, `buying`
                        WHERE `coffee`.`id_producer` = `producer`.`id_producer` AND
                        		`coffee`.`id_coffee` = `buying`.`id_coffee` AND
                                `buying`.`id_client` = ?
                               ORDER BY `coffee`.`coffeeName`";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id_client));

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        $array = null;
        $i = 0;
        foreach ($result as $coffee) {
            $array[$i][$coffee["coffeeName"]]["price"] = $coffee["price"];
            $array[$i][$coffee["coffeeName"]]["producerName"] = $coffee["producerName"];
            $array[$i][$coffee["coffeeName"]]["location"] = $coffee["location"];
            $array[$i][$coffee["coffeeName"]]["img"] = $coffee["img"];
            $array[$i][$coffee["coffeeName"]]["id_order"] = $coffee["id_order"];
            $array[$i][$coffee["coffeeName"]]["id_coffee"] = $coffee["id_coffee"];
            $i++;
        }
        return $array;
    }

    function getAllIngredients()
    {
        $db = $this->connectToDB();
        $allOrders = $this->getAllClientCoffee();
        $array = null;
        foreach($allOrders as $key => $id)
        {
                $sql = "SELECT `ingredients`.`ingredientName`
                            FROM `ingredients`
                                WHERE `ingredients`.`idIngredient` IN
                                    (SELECT `ingredientInCoffee`.`id_ingredient`
                                        FROM `ingredientInCoffee`
                                            WHERE `ingredientInCoffee`.`id_coffee` = ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id));
            $result = $stmt->FETCHALL(PDO::FETCH_NUM);
            foreach($result as $k => $val)
            {
                $array[$id][$k] = $val[0];
            }
        }
        return $array;// массив id кофе которые имеют массив ингредиентов
    }

    function getAllContent() {
        return $this->resultContent($this->getAllCoffeeData(), $this->getAllIngredients());
    }

    function resultContent($coffeeData, $coffeeIngredients) {
        $content = null;
        foreach($coffeeData as $i => $array){
            foreach($array as $coffeeName => $coffeeContent) {
                $content .= "<div class=\"item animated\" >
                                <div class=\"bIcon\" id=".$coffeeContent["id_order"].">
                                    <img class=\"bImg\" src=" . $coffeeContent["img"] . " />
                                    <p class=\"price\" id=" . $coffeeContent["price"] . " <span class=\"unic_price\">" . $coffeeContent["price"] . "</span> &#8381;</p>
                                    <p class=\"del bp\" id=" . $coffeeContent["id_coffee"] . ">Исключить</p>
                                </div>
                                <div class=\"bAbout\">
                                    <p class=\"about\">Название:<span>" . $coffeeName . "</span></p>
                                    <p class=\"about\">Производитель:</br><span>" . $coffeeContent["location"] . "</span></p>
                                    <p class=\"about\">Состав:<span><br>";
                                    foreach ($coffeeIngredients[$coffeeContent["id_coffee"]] as $ingredient) {
                                        $content .= $ingredient . "  ";
                                    }
                $content .= "</span></p>
                                    <p class=\"about\">Изготовлено:<span><br>" . $coffeeContent["producerName"] . "</span></p>
                                </div>
                            </div>";
            }
        }
        return $content;
    }

    function connectToDB()
    {
        $db = new DB();
        $db = $db->connectDB();
        $db->exec("set names utf8");
        return $db;
    }
}
?>