<?php

require_once('db_connect.php');

//class for search

class search {
    //search for property

public static function check($location, $closest){

// input misspelled word
$input = $location;


$city  = array('Abbotsford',
'Amos',
'Baie Verte',
'Baie-Comeau',
'Baie-Saint-Paul',
'Belleterre',
'Blind River',
'Bracebridge',
'Brampton',
'Bécancour',
'Caledon',
'Calgary',
'Cape Breton Regional Municipality',
'Chandler',
'Chibougamau',
'Clarence-Rockland',
'Cochrane',
'Cookshire-Eaton',
'County of Brant',
'Dolbeau-Mistassini',
'Dégelis',
'Edmonton',
'Elliot Lake',
'Erin',
'Essex',
'Fermont',
'Gaspé',
'Gatineau',
'Georgina',
'Gillam',
'Gracefield',
'Gravenhurst',
'Greater Napanee',
'Greater Sudbury',
'Haldimand County',
'Halifax Regional Municipality',
'Halton Hills',
'Hamilton',
'Happy Valley-Goose Bay',
'Huntsville',
'Innisfil',
'Iroquois Falls',
'Kamloops',
'Kawartha Lakes',
'Kearney',
'Kingston',
'La Malbaie',
'La Tuque',
'Lakeshore',
'Laurentian Hills',
'Leaf Rapids',
'London',
'Lynn Lake',
'Lévis',
'Milton',
'Minto',
'Mirabel',
'Mississauga',
'Mississippi Mills',
'Mono',
'Mont-Laurier',
'Montreal',
'New Tecumseth',
'Norfolk County',
'North Bay',
'Northeastern Manitoulin and the Islands',
'Ottawa',
'Percé',
'Plympton–Wyoming',
'Pohénégamook',
'Port-Cartier',
'Prince Edward County',
'Prince George',
'Queens',
'Quinte West',
'Québec City',
'Rivière-Rouge',
'Rouyn-Noranda',
'Saguenay',
'Saint John',
'Saint-Félicien',
'Saint-Raymond',
'Senneterre',
'Sept-Îles',
'Shawinigan',
'Sherbrooke',
'Snow Lake',
'South Bruce Peninsula',
'St. Johns',
'Surrey',
'The Blue Mountains',
'Thunder Bay',
'Timmins',
'Toronto',
'Trois-Rivières',
'Témiscaming',
'Val-dOr',
'Vaughan',
'Whitehorse',
'Winnipeg',
);

// no shortest distance found, yet
$shortest = -1;

// loop through words to find the closest closest to the input
foreach ($city as $word) {

    // calculate the distance between the input word,
    // and the current word
    $lev = levenshtein($input, $word);

    // check for an exact match
    if ($lev == 0) {

        // closest word is this one (exact match)
        $closest = $word;
        $shortest = 0;

        // break out of the loop; we've found an exact match
        break;
    }
    
    //if the distance is less find shorest, if longer find next shortest

    if ($lev <= $shortest || $shortest < 0) {
        // set the closest match, and shortest distance
        $closest  = $word;
        $shortest = $lev;
    }
}

if ($shortest == 0) {
$closest;
} else {
  echo "Did you mean: $closest";
}


    
}
    
    public static function SearchProperty($location)
    {
       
    
        //get the connection
        $dbcon=Db_connect::getDB();
        
      
       
        
        //sql statement
        //search for the everything on the propert
            $sql="SELECT * FROM 
               Properties P
               WHERE city LIKE '%" . $location . "%'; 
             
               ";
        
        $result = $dbcon->query($sql);
        return $result; 
        
    }
    
    
    
  
}