<?php
require_once('DB.php');

class MyWorld
{
    public function top5countryByPopulations()
    {
        $db=Db::getConnection();

        $result = $db->query('SELECT city.Population,country.Name FROM city,country WHERE city.CountryCode=country.Code ORDER BY city.Population DESC LIMIT 5');
        while($row=$result->fetch())
        {
            echo $row['Name'];
            echo "-";
            echo $row['Population']."<br>";
        }
    }
    public function EnglishEurop()
    {
        $db=Db::getConnection();
        $result = $db->query('SELECT country.Name, country.Continent, country.Population, countrylanguage.Language, countrylanguage.Percentage FROM country,countrylanguage WHERE country.Code=countrylanguage.CountryCode AND countrylanguage.Language="English" AND country.Continent="Europe"');
        $sum = array();
        $i=0;
        while($row=$result->fetch())
        {
            echo $row['Name'];
            echo "-";
            echo $row['Population']*$row['Percentage']."<br>";
            $sum[$i] = $row['Population']*$row['Percentage'];
            $i++;
        }
        echo "Result: ".array_sum($sum)." peoples talk english in Europe!<br>";
    }
    public function asd()
    {
        $db=Db::getConnection();
        $result = $db->query('SELECT country.Name, countrylanguage.IsOfficial, countrylanguage.Language FROM country,countrylanguage WHERE country.Code=countrylanguage.CountryCode AND countrylanguage.IsOfficial ORDER BY country.Name');

        //while($row=$result->fetch())
        //{
            //if($row['isOfficial']='T')
            //{

            //}
        //}
    }
}
$world = new MyWorld;
echo "Task 1"."<br>";
echo "______________________________"."<br>";
$world->top5countryByPopulations();
echo "______________________________"."<br>";
echo "Task 2"."<br>";
echo "______________________________"."<br>";
$world->EnglishEurop();
echo "______________________________"."<br>";
echo "Task 3"."<br>";
echo "______________________________"."<br>";
$world->asd();
?>
