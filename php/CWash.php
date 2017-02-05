<?php
require_once "DB.php";

class CWash
{
    function getData() {
        $db = DB::dbConnect();

        $sql = "SELECT *
                  FROM `cars`";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        return $result;
    }


//
//    function getAllContent() {
//        return $this->resultContent($this->getAllCoffeeData(), $this->getAllIngredients());
//    }
//
//    function resultContent($coffeeData, $coffeeIngredients) {
//        $content = null;
//        foreach($coffeeData as $coffeeName => $coffeeContent){
//            $content .="<div class=\"item\">
//                            <div class=\"bIcon\">
//                                <img class=\"bImg\" src=".$coffeeContent["img"]." />
//                                <p class=\"price\">".$coffeeContent["price"]." &#8381;</p>
//                                <p class=\"buy bp\" id=".$coffeeContent["id_coffee"].">Хочу</p>
//                            </div>
//                            <div class=\"bAbout\">
//                                <p class=\"about\">Название:<span>".$coffeeName."</span></p>
//                                <p class=\"about\">Производитель:<span><br>".$coffeeContent["location"]."</span></p>
//                                <p class=\"about\">Состав:<span><br>";
//                                    foreach($coffeeIngredients[$coffeeName] as $ingredient)
//                                    {
//                                        $content .= "<span>".$ingredient."  </span>";
//                                    }
//                                    $content .= "</span></p>
//                                <p class=\"about\">Изготовлено:<span><br>".$coffeeContent["producerName"]."</span></p>
//                            </div>
//					    </div>";
//        }
//        return $content;
//    }
}


