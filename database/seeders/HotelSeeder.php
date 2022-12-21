<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path() . '/hotels.json');
        $hotels = json_decode($data, true)["Hotels"]["Hotel"];
        foreach ($hotels as $hotel) {
            Hotel::create([
                'ChainID' => ($hotel['ChainID'] != '') ? $hotel['ChainID'] : null,
                'ChainName' => ($hotel['ChainName'] != '') ? $hotel['ChainName'] : null,
                'CountryCode' => ($hotel['CountryCode'] != '') ? $hotel['CountryCode'] : null,
                'CountryFileName' => ($hotel['CountryFileName'] != '') ? $hotel['CountryFileName'] : null,
                'CountryName' => ($hotel['CountryName'] != '') ? $hotel['CountryName'] : null,
                'CurrencyCode' => ($hotel['CurrencyCode'] != '') ? $hotel['CurrencyCode'] : null,
                'Facilities' => ($hotel['Facilities'] != '') ? $hotel['Facilities'] : null,
                'HotelAddress' => ($hotel['HotelAddress'] != '') ? $hotel['HotelAddress'] : null,
                'HotelFileName' => ($hotel['HotelFileName'] != '') ? $hotel['HotelFileName'] : null,
                'HotelID' => ($hotel['HotelID'] != '') ? $hotel['HotelID'] : null,
                'HotelName' => ($hotel['HotelName'] != '') ? $hotel['HotelName'] : null,
                'HotelPostcode' => ($hotel['HotelPostcode'] != '') ? $hotel['HotelPostcode'] : null,
                'ImageID' => ($hotel['ImageID'] != '') ? $hotel['ImageID'] : null,
                'Images' => ($hotel['Images'] != '') ? $hotel['Images'] : null,
                'Latitude' =>($hotel['Latitude'] != '') ? $hotel['Latitude'] : null,
                'Longitude' => ($hotel['Longitude'] != '') ? $hotel['Longitude'] : null,
                'MinRate' => ($hotel['MinRate'] != '') ? $hotel['MinRate'] : null,
                'PlaceFileName' => ($hotel['PlaceFileName'] != '') ? $hotel['PlaceFileName'] : null,
                'PlaceID' => ($hotel['PlaceID'] != '') ? $hotel['PlaceID'] : null,
                'PlaceName' => ($hotel['PlaceName'] != '') ? $hotel['PlaceName'] : null,
                'PlaceType' => ($hotel['PlaceType'] != '') ? $hotel['PlaceType'] : null,
                'Popularity' => ($hotel['Popularity'] != '') ? $hotel['Popularity'] : null,
                'PropertyType' => ($hotel['PropertyType'] != '') ? $hotel['PropertyType'] : null,
                'PropertyTypeID' => ($hotel['PropertyTypeID'] != '') ? $hotel['PropertyTypeID'] : null,
                'StarRating' => ($hotel['StarRating'] != '') ? $hotel['StarRating'] : null,
                'StateName' => ($hotel['StateName'] != '') ? $hotel['StateName'] : null,
                'StatePlacefilename' => ($hotel['StatePlacefilename'] != '') ? $hotel['StatePlacefilename'] : null,
                'StatePlaceID' => ($hotel['StatePlaceID'] != '') ? $hotel['StatePlaceID'] : null,
                'Themes' => (isset($hotel['Themes']) && $hotel['Themes'] != '') ? $hotel['Themes'] : null,
                'Trademarked' => (isset($hotel['Trademarked']) && $hotel['Trademarked'] != '') ? $hotel['Trademarked'] : null,
            ]);
        }
    }
}
