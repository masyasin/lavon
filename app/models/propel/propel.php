<?php
define('BASEPATH', '../../../');

require_once '../../config/database.php';


return [
    'propel' => [
        'database' => [
            'connections' => [
                'default' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => $db['default']['dsn'], 
                    'user'       => $db['default']['username'], 
                    'password'   => $db['default']['password'],
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'default',
            'connections' => ['default']
        ],
        'generator' => [
            'defaultConnection' => 'default',
            'connections' => ['default']
        ]
    ]
];