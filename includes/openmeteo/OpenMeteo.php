<?php

use \GuzzleHttp\Client;

class OpenMeteo {

    public static function getWeather ($latitude, $longitude){

        $guzlle = new Client();
        $json = $guzlle->request ('GET', "https://api.open-meteo.com/v1/forecast?latitude={$latitude}&longitude={$longitude}&current=temperature_2m,relative_humidity_2m,apparent_temperature,is_day,precipitation,rain,showers,snowfall,weather_code,cloud_cover,pressure_msl,surface_pressure,wind_speed_10m,wind_direction_10m,wind_gusts_10m&hourly=temperature_2m,relative_humidity_2m,dew_point_2m,apparent_temperature,precipitation_probability,precipitation,rain,showers,snowfall,snow_depth,weather_code,pressure_msl,surface_pressure,cloud_cover,cloud_cover_low,cloud_cover_mid,cloud_cover_high,visibility,evapotranspiration,et0_fao_evapotranspiration,vapour_pressure_deficit,wind_speed_10m,wind_speed_80m,wind_speed_120m,wind_speed_180m,wind_direction_10m,wind_direction_80m,wind_direction_120m,wind_direction_180m,wind_gusts_10m,temperature_80m,temperature_120m,temperature_180m,soil_temperature_0cm,soil_temperature_6cm,soil_temperature_18cm,soil_temperature_54cm,soil_moisture_0_to_1cm,soil_moisture_1_to_3cm,soil_moisture_3_to_9cm,soil_moisture_9_to_27cm,soil_moisture_27_to_81cm&daily=weather_code,temperature_2m_max,temperature_2m_min,apparent_temperature_max,apparent_temperature_min,sunrise,sunset,daylight_duration,sunshine_duration,uv_index_max,uv_index_clear_sky_max,precipitation_sum,rain_sum,showers_sum,snowfall_sum,precipitation_hours,precipitation_probability_max,wind_speed_10m_max,wind_gusts_10m_max,wind_direction_10m_dominant,shortwave_radiation_sum,et0_fao_evapotranspiration&timezone=America%2FSao_Paulo");

        return json_decode($json->getBody(), true);
    
    }

    public static function getWMOCode ($code, $is_day)
    {

        $codes =  [
            "0" => [
                "day" => [
                    "description" => "Ensolarado ☀️",
                    "image" => "http://openweathermap.org/img/wn/01d@2x.png"
                ],
                "night" => [
                    "description" => "Céu limpo 🌙",
                    "image" => "http://openweathermap.org/img/wn/01n@2x.png"
                ]
            ],
            "1" => [
                "day" => [
                    "description" => "Principalmente ensolarado ☀️",
                    "image" => "http://openweathermap.org/img/wn/01d@2x.png"
                ],
                "night" => [
                    "description" => "Principalmente limpo 🌙",
                    "image" => "http://openweathermap.org/img/wn/01n@2x.png"
                ]
            ],
            "2" => [
                "day" => [
                    "description" => "Parcialmente nublado ⛅",
                    "image" => "http://openweathermap.org/img/wn/02d@2x.png"
                ],
                "night" => [
                    "description" => "Parcialmente nublado ⛅",
                    "image" => "http://openweathermap.org/img/wn/02n@2x.png"
                ]
            ],
            "3" => [
                "day" => [
                    "description" => "Nublado ☁️",
                    "image" => "http://openweathermap.org/img/wn/03d@2x.png"
                ],
                "night" => [
                    "description" => "Nublado ☁️",
                    "image" => "http://openweathermap.org/img/wn/03n@2x.png"
                ]
            ],
            "45" => [
                "day" => [
                    "description" => "Nevoeiro 🌫️",
                    "image" => "http://openweathermap.org/img/wn/50d@2x.png"
                ],
                "night" => [
                    "description" => "Nevoeiro 🌫️",
                    "image" => "http://openweathermap.org/img/wn/50n@2x.png"
                ]
            ],
            "48" => [
                "day" => [
                    "description" => "Nevoeiro congelante 🌨️",
                    "image" => "http://openweathermap.org/img/wn/50d@2x.png"
                ],
                "night" => [
                    "description" => "Nevoeiro congelante 🌨️",
                    "image" => "http://openweathermap.org/img/wn/50n@2x.png"
                ]
            ],
            "51" => [
                "day" => [
                    "description" => "Chuvisco leve 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuvisco leve 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "53" => [
                "day" => [
                    "description" => "Chuvisco 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuvisco 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "55" => [
                "day" => [
                    "description" => "Chuvisco pesado 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuvisco pesado 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "56" => [
                "day" => [
                    "description" => "Chuvisco leve congelante 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuvisco leve congelante 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "57" => [
                "day" => [
                    "description" => "Chuvisco congelante 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuvisco congelante 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "61" => [
                "day" => [
                    "description" => "Chuva fraca 🌧️",
                    "image" => "http://openweathermap.org/img/wn/10d@2x.png"
                ],
                "night" => [
                    "description" => "Chuva fraca 🌧️",
                    "image" => "http://openweathermap.org/img/wn/10n@2x.png"
                ]
            ],
            "63" => [
                "day" => [
                    "description" => "Chuva 🌧️",
                    "image" => "http://openweathermap.org/img/wn/10d@2x.png"
                ],
                "night" => [
                    "description" => "Chuva 🌧️",
                    "image" => "http://openweathermap.org/img/wn/10n@2x.png"
                ]
            ],
            "65" => [
                "day" => [
                    "description" => "Chuva forte 🌧️",
                    "image" => "http://openweathermap.org/img/wn/10d@2x.png"
                ],
                "night" => [
                    "description" => "Chuva forte 🌧️",
                    "image" => "http://openweathermap.org/img/wn/10n@2x.png"
                ]
            ],
            "66" => [
                "day" => [
                    "description" => "Chuva congelante leve 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/10d@2x.png"
                ],
                "night" => [
                    "description" => "Chuva congelante leve 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/10n@2x.png"
                ]
            ],
            "67" => [
                "day" => [
                    "description" => "Chuva congelante 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/10d@2x.png"
                ],
                "night" => [
                    "description" => "Chuva congelante 🌧️❄️",
                    "image" => "http://openweathermap.org/img/wn/10n@2x.png"
                ]
            ],
            "71" => [
                "day" => [
                    "description" => "Neve fraca ❄️",
                    "image" => "http://openweathermap.org/img/wn/13d@2x.png"
                ],
                "night" => [
                    "description" => "Neve fraca ❄️",
                    "image" => "http://openweathermap.org/img/wn/13n@2x.png"
                ]
            ],
            "73" => [
                "day" => [
                    "description" => "Neve ❄️",
                    "image" => "http://openweathermap.org/img/wn/13d@2x.png"
                ],
                "night" => [
                    "description" => "Neve ❄️",
                    "image" => "http://openweathermap.org/img/wn/13n@2x.png"
                ]
            ],
            "75" => [
                "day" => [
                    "description" => "Neve forte ❄️",
                    "image" => "http://openweathermap.org/img/wn/13d@2x.png"
                ],
                "night" => [
                    "description" => "Neve forte ❄️",
                    "image" => "http://openweathermap.org/img/wn/13n@2x.png"
                ]
            ],
            "77" => [
                "day" => [
                    "description" => "Granizo ❄️",
                    "image" => "http://openweathermap.org/img/wn/13d@2x.png"
                ],
                "night" => [
                    "description" => "Granizo ❄️",
                    "image" => "http://openweathermap.org/img/wn/13n@2x.png"
                ]
            ],
            "80" => [
                "day" => [
                    "description" => "Chuveiros leves 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuveiros leves 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "81" => [
                "day" => [
                    "description" => "Chuveiros 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuveiros 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "82" => [
                "day" => [
                    "description" => "Chuveiros fortes 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09d@2x.png"
                ],
                "night" => [
                    "description" => "Chuveiros fortes 🌧️",
                    "image" => "http://openweathermap.org/img/wn/09n@2x.png"
                ]
            ],
            "85" => [
                "day" => [
                    "description" => "Chuva de neve fraca ❄️🌧️",
                    "image" => "http://openweathermap.org/img/wn/13d@2x.png"
                ],
                "night" => [
                    "description" => "Chuva de neve fraca ❄️🌧️",
                    "image" => "http://openweathermap.org/img/wn/13n@2x.png"
                ]
            ],
            "86" => [
                "day" => [
                    "description" => "Chuva de neve ❄️🌧️",
                    "image" => "http://openweathermap.org/img/wn/13d@2x.png"
                ],
                "night" => [
                    "description" => "Chuva de neve ❄️🌧️",
                    "image" => "http://openweathermap.org/img/wn/13n@2x.png"
                ]
            ],
            "95" => [
                "day" => [
                    "description" => "Tempestade ⛈️",
                    "image" => "http://openweathermap.org/img/wn/11d@2x.png"
                ],
                "night" => [
                    "description" => "Tempestade ⛈️",
                    "image" => "http://openweathermap.org/img/wn/11n@2x.png"
                ]
            ],
            "96" => [
                "day" => [
                    "description" => "Trovoadas com granizo leve ⛈️❄️",
                    "image" => "http://openweathermap.org/img/wn/11d@2x.png"
                ],
                "night" => [
                    "description" => "Trovoadas com granizo leve ⛈️❄️",
                    "image" => "http://openweathermap.org/img/wn/11n@2x.png"
                ]
            ],
            "99" => [
                "day" => [
                    "description" => "Trovoadas com granizo ⛈️❄️",
                    "image" => "http://openweathermap.org/img/wn/11d@2x.png"
                ],
                "night" => [
                    "description" => "Trovoadas com granizo ⛈️❄️",
                    "image" => "http://openweathermap.org/img/wn/11n@2x.png"
                ]
            ]
        ];

        return $codes [$code][($is_day) ? 'day' : 'night'] ?? null;
    }

}