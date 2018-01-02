<?php

namespace Itcuijian\DingTalk\Util;

class Log
{
    public static function i($msg)
    {
        self::write('I', $msg);
    }
    
    public static function e($msg)
    {
        self::write('E', $msg);
    }

    private static function write($level, $msg)
    {
        if (defined('LOG_ROOT')) {
            $filename = LOG_ROOT . "corp.log";
        } else {
            $filename = dirname(dirname(__FILE__)) . '/' . "corp.log";
        }

        $logFile = fopen($filename, "aw");
        fwrite($logFile, $level . "/" . date(" Y-m-d h:i:s") . "  " . $msg . "\n");
        fclose($logFile);
    }
}
