<?php

final class Config
{

    /* Beautiful color:
     * #0778c4 - blue
     * #c48811 - orange
     * #000000 - black
     * #c41176 - pink
     * #039642 - green
     */

    protected static $config_img = [

        "img_link" => "https://pp.userapi.com/c639825/v639825454/39737/oa_ZLuDZsjw.jpg",
        "plus_time" => 28800,

        // Main site theme
        "theme_color" => "#000000",
        "included_snow" => false,
        "admin_token_prefix" => "dsf324sdfsdf233_sdf73bf_sdf74gh_",
		"status_testing" => false
    ];

    public static function get_data(String $data)
    {
        return array_key_exists($data, self::$config_img) ? self::$config_img[$data] : null;
    }
}


