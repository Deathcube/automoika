<?php
require_once "connect.php";

class Coffee
{
    function getAllCoffeeData() {
        $db = $this->connectToDB();

        $sql = "SELECT `coffee`.`id_coffee`,`coffee`.`coffeeName`, `coffee`.`price`,`coffee`.`img`, `producer`.`producerName`, `producer`.`location`
                  FROM `coffee`,`producer`
                    WHERE `coffee`.`id_producer` = `producer`.`id_producer`
                           ORDER BY `coffee`.`coffeeName`";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        $array = null;
        foreach($result as $coffee)
        {
            $array[$coffee["coffeeName"]]["price"] = $coffee["price"];
            $array[$coffee["coffeeName"]]["producerName"] = $coffee["producerName"];
            $array[$coffee["coffeeName"]]["location"] = $coffee["location"];
            $array[$coffee["coffeeName"]]["img"] = $coffee["img"];
            $array[$coffee["coffeeName"]]["id_coffee"] = $coffee["id_coffee"];
        }
        return $array;
    }
    function getAllIngredients() {
        $db = $this->connectToDB();

        $sql = "SELECT `coffee`.`coffeeName`, `ingredients`.`ingredientName`
                  FROM `coffee`
                    INNER JOIN `ingredientInCoffee`
                      ON `coffee`.`id_coffee` = `ingredientInCoffee`.`id_coffee`
                    INNER JOIN `ingredients`
                      ON `ingredientInCoffee`.`id_ingredient` = `ingredients`.`idIngredient`
                    ORDER BY `coffee`.`coffeeName`";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        $coffee = null;
        foreach($result as $ingredients)
        {
            $coffee[$ingredients["coffeeName"]] .= $ingredients["ingredientName"].".";
        }
        $array = null;
        foreach($coffee as $namecoffee => $onecoffee)
        {
            $array[$namecoffee] = explode(".",$onecoffee);
            array_pop($array[$namecoffee]);
        }
        return $array; // массив кофе которые имеют массив ингредиентов
    }

    function getAllContent() {
        return $this->resultContent($this->getAllCoffeeData(), $this->getAllIngredients());
    }

    function resultContent($coffeeData, $coffeeIngredients) {
        $content = null;
        foreach($coffeeData as $coffeeName => $coffeeContent){
            $content .="<div class=\"item\">
                            <div class=\"bIcon\">
                                <img class=\"bImg\" src=".$coffeeContent["img"]." />
                                <p class=\"price\">".$coffeeContent["price"]." &#8381;</p>
                                <p class=\"buy bp\" id=".$coffeeContent["id_coffee"].">Хочу</p>
                            </div>
                            <div class=\"bAbout\">
                                <p class=\"about\">Название:<span>".$coffeeName."</span></p>
                                <p class=\"about\">Производитель:<span><br>".$coffeeContent["location"]."</span></p>
                                <p class=\"about\">Состав:<span><br>";
                                    foreach($coffeeIngredients[$coffeeName] as $ingredient)
                                    {
                                        $content .= "<span>".$ingredient."  </span>";
                                    }
                                    $content .= "</span></p>
                                <p class=\"about\">Изготовлено:<span><br>".$coffeeContent["producerName"]."</span></p>
                            </div>
					    </div>";
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

