<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Util;

/**
 * Description of RotasUtil
 *
 * @author Adans
 */
class RotasUtil {
    public static function getRotas(){
        $urls = self::getUrls();
        
        $request = [];
        $request['rota'] = strtoupper($urls[0]);
        $request['recurso'] = $urls[1] ?? null;
        $request['num_reserva'] = $urls[2] ?? null;
        $request['metodo'] = $_SERVER['REQUEST_METHOD'];
        
        return $request;
        
    }
    
    public static function getUrls(){
        $uri = str_replace('/' . DIR_PROJETO, '', $_SERVER['REQUEST_URI']);
        return explode('/', trim($uri, '/'));
    }
}
