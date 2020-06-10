<?php

// Used to configure user-defined routing rules and some log levels, etc.
class  UserConfig {
    public static $UserConf=array(
        //支持log不同级别
        'log'=>array('log_path'=>'/data/log/',
            'log_level'=>array(
                'info'=>1,
                'warning'=>1,
                'notice'=>1,
                'error'=>1,
                'debug'=>1,
            )
        ),
        // Support custom route to pass a function?
        'router'=>array('info'=>1,'error'=>1),
        // What did fliter do before? Pass a function?
        'preFilter'=>array('info'=>1,'error'=>1),
        // What to do after filter pass a function?
        'postFilter'=>array('info'=>1,'error'=>1),
    );

    public static function getConfig($val) {
        return self::$UserConf[$val];
    }

}
?>