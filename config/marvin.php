<?php

return [
    "maintenance_mode" => array(
        "on" => false
        ,"message" => 'Il pannello è attualmente in manutenzione.'
    )                     
    , "site"  => array(
        "name" => config("app.name")
        ,"name_extended" =>  config("app.name")
        ,"url" => config("app.url")
    )

    ,"errors" => array(
         "alert_mail" => 'errori@atriostudio.it'
        ,"default_page" => '/error.php'
        ,"debug_mode" => 0
        ,"404_msg" => "Il contenuto richiesto non è stato trovato."
    )
    
    ,"urls" => array(
        "app_base" => '/admin'
    )

    ,"path" => array(
        "app_root" => public_path()
    )

    /**
     * FileManager
     */
    ,"upload" => array(
         "base_dir" => realpath(__DIR__.'/../../..')
        ,"tmp_path" => storage_path('app/public/temp')
        ,"gallery_limit" => 30
        ,"max_weight" => 21000000
        ,"max_weight_label" => "21 megabyte"
        ,"img_quality" => 88
        ,"img_max_mpx" => 12000000
    ) 

    ,"login" => [
        "cookie_name" => "marvin_login"
        ,"session_index" => "marvin_login_session"
        ,"user_table" => "marvin_user"
        ,"user_table_username" => "user"
        ,"user_login_table" => "marvin_user_login"
    ]

    ,"locales" => [

        // "id" =>  ["suffix","titolo", "language_tag","required"]
        1 => ["it", "Italiano", "it-IT", 1],
        2 => ["en", "Inglese", "en-EN", 0],
        3 => ["fr", "Francese", "fr-FR", 0],
        4 => ["es", "Spagnolo", "es-ES", 0],
        5 => ["de", "Tedesco", "de-DE", 0],
    
    ],

    // database / csv
    "lang_source" => env("APP_LANG_SOURCE", "file"),

    // auto esportazione da database a csv
    "lang_autoexport_file" => env("APP_LANG_AUTOEXPORT_FILE", false),

];


