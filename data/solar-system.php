<?php
$solarSystem = array(
    'id' => 'solar_system_cheat_sheet',
    'name' => 'Solar System',
    'description' => 'Basic information about our solar system',
    'metadata' =>
        array(
            'sourceName' => 'NASA',
            'sourceUrl' => 'http://nssdc.gsfc.nasa.gov/planetary/factsheet/',
        ),
    'aliases' =>
        array(
            0 => 'solar',
            1 => 'planet',
            2 => 'planets',
            3 => 'solarsystem',
            4 => 'sun',
            5 => 'earth',
            6 => 'mercury',
            7 => 'mars',
            8 => 'jupiter',
            9 => 'saturn',
            10 => 'uranus',
            11 => 'neptune',
        ),
    'template_type' => 'reference',
    'section_order' =>
        array(
            0 => 'Sun',
            1 => 'Mercury',
            2 => 'Venus',
            3 => 'Earth',
            4 => 'Mars',
            5 => 'Jupiter',
            6 => 'Saturn',
            7 => 'Uranus',
            8 => 'Neptune',
        ),
    'sections' =>
        array(
            'Sun' =>
                array(
                    0 =>
                        array(
                            'key' => 'Mean distance from earth',
                            'val' => '149,597,900 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '1.989 x 10³⁰ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Temperature (core)',
                            'val' => '1.56×10⁷ K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '1.41×10¹⁸ km³',
                        ),
                ),
            'Mercury' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => ' 46,001,200 / 69,816,900 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '3.3011×10²³ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '440 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '6.083×10¹⁰ km³',
                        ),
                ),
            'Venus' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => '107,477,000 / 108,939,000 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '4.8675×10²⁴ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '737 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '9.2843×10¹¹ km³',
                        ),
                ),
            'Earth' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => '147,095,000 / 152,100,000 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '5.97237×10²⁴ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '288 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '1.08321×10¹² km³',
                        ),
                ),
            'Mars' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => '206,669,000 / 249,209,300 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '6.4171×10²³ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '208 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '1.6318×10¹¹ km³',
                        ),
                ),
            'Jupiter' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => '740,573,600 / 816,520,800 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '1.8986×10²⁷ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '163 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '1.43128×10¹⁵ km³',
                        ),
                ),
            'Saturn' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => '1,353,572,956 / 1,513,325,783 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '5.6846×10²⁶ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '133 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '8.2713×10¹⁴ km³',
                        ),
                ),
            'Uranus' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => '2,748,938,461 / 3,004,419,704 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '8.68×10²⁵ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '78 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '6.833×10¹³ km³',
                        ),
                ),
            'Neptune' =>
                array(
                    0 =>
                        array(
                            'key' => 'Distance from Sun (minimum / maximum)',
                            'val' => '4,452,940,833 / 4,553,946,490 km',
                        ),
                    1 =>
                        array(
                            'key' => 'Mass',
                            'val' => '1.0243×10²⁶ kg',
                        ),
                    2 =>
                        array(
                            'key' => 'Surface Temperature (mean)',
                            'val' => '73 K',
                        ),
                    3 =>
                        array(
                            'key' => 'Volume',
                            'val' => '6.254×10¹³ km³',
                        ),
                ),
        ),
);
