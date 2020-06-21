<?php


function my_create_continent($continentNameToAdd,&$worldMap)
{
    if(array_key_exists($continentNameToAdd,$worldMap))
    {
       return $worldMap;
    }
    else
    {
        $worldMap[$continentNameToAdd ]=array() ;
    }
    
}
function my_create_country($countryNameToAdd, $continentName, &$worldMap)
{
    if(array_key_exists($countryNameToAdd,$worldMap[$continentName]))
    {
       return $worldMap;
    }
    else
    {
        $worldMap[$continentName][$countryNameToAdd] = array() ;
    }
    

}

function my_create_city($cityNameToAdd,$postalCodeOfCityToAdd,$countryName, $continentName, &$worldMap)
{
    if(array_key_exists($cityNameToAdd,$worldMap[$continentName][$countryName]))
    {
       return $worldMap;
    }
    else
    {
    $worldMap[$continentName][$countryName][$cityNameToAdd]=$postalCodeOfCityToAdd;
    }
}

function get_country_of_continent( $continentName,  $worldMap)
{
    
    if(!array_key_exists($continentName,$worldMap))
    {
        echo "Failure to get continent.\n";
        return NULL;
    }
    else
    {
        return  array_keys($worldMap[$continentName]);
    }
}
function get_cities_of_country( $countryName,  $continentName, $worldMap)
{
    if(!array_key_exists($countryName,$worldMap[$continentName]))
    {
        echo "Failure to get country.\n";
        return NULL;
    }
    else
    {
        return  array_keys($worldMap[$continentName][$countryName]);
    }

}

function get_city_postal_code( $cityName,  $countryName,  $continentName, $worldMap)
{
    if(!array_key_exists($cityName,$worldMap[$continentName][$countryName]))
    {
        echo "Failure to get city\n";
        return NULL;
    }
    else
    {
        return  $worldMap[$continentName][$countryName][$cityName];
    }
}

?>