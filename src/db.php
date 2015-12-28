<?php
return array(
    'db.options'=> array(
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'dbname'   => 'silex',
        'user'     => 'root',
        'password' => 'ldpa$$',
    ),
    "orm.proxies_dir"=> __DIR__ . "/../var/cache/orm/proxy",
    "orm.proxies_namespace" => "DoctrineProxy",
    "orm.auto_generate_proxies" => true,
//    "orm.default_cache"=> __DIR__ . "/../var/cache/orm/",
        //!$app['debug'] && extension_loaded('apc') ? new ApcCache() : new ArrayCache(),

    "orm.em.options" => array(
//        "query_cache" =>__DIR__ . "/../var/cache/orm/query",
//        "metadata_cache" => __DIR__ . "/../var/cache/orm/metadata",
//        "result_cache" => __DIR__ . "/../var/cache/orm/result",
//        "hydration_cache" => __DIR__ . "/../var/cache/orm/hydration",

        "mappings" => array(
            // Using actual filesystem paths
            array(
                "type" => "simple_yml",
                "namespace" => 'Entities',
                //"path" => __DIR__."/Entities",
                "path" => __DIR__."/Resources/config",
            ),
        ),
    ),
);
