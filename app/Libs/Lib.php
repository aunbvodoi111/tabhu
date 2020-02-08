<?php
namespace App\Libs;
use Illuminate\Http\Request;
use App\Models\ConfigSite;

class Lib{
    protected static $lang;
    protected static $langdefault;
    public static function lang(){
        if(\Cookie::get('langdefault')){
            if(\Crypt::decryptString(\Cookie::get('langdefault'))){
                SELF::$lang = \Crypt::decryptString(\Cookie::get('langdefault'));
            }else{
                SELF::$lang = 'vi';
            }
        }else{
            SELF::$lang = 'vi';
        }
        
        return SELF::$lang;
    }

    public static function langindex(){
        if(\Cookie::get('langdefault')){
            SELF::$langdefault = \Cookie::get('langdefault');
        }else{
            SELF::$langdefault = 'vi';
        }
        return SELF::$langdefault;
    }
    
    public static function ajaxRespond($success = true, $msg = '', $data = []){
        return [
            'error' => $success ? 0 : 1,
            'msg' => $msg,
            ($success ? 'data' : 'code') => $data
        ];
    }
}
