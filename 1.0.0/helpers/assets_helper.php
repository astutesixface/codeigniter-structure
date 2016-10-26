<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Name:  Assets Helper
 * 
 * Author: Arumugam
 * 		  sixfacedeveloper@gmail.com
 *         @sixface
 *          
 * Added Awesomeness: Phil Sturgeon
 * 
 * Location: http://github.com/astutesixface
 *          
 * Created:  18.06.2016 
 * 
 * Description:  Simple assets helper for CI helper your application to generate difference js and css file at every view page.
 * 
 */
if (!function_exists('assets')) {

    //if $str is a string include url or path
    //id $str is a array include all url and path
    function js($str) {
        $js = '';
        if (is_array($str)) {
            foreach ($str as $s) {
                if (filter_var($s, FILTER_VALIDATE_URL)) {
                    $js .= '<script src="' . $s . '" type="text/javascript"></script>';
                } else {
                    $js .= '<script src="' . site_url('assets/' . $s) . '" type="text/javascript"></script>';
                }
            }
        } else {
            if (filter_var($str, FILTER_VALIDATE_URL)) {
                $js .= '<script src="' . $str . '" type="text/javascript"></script>';
            } else {
                $js .= '<script src="' . site_url('assets/' . $str) . '" type="text/javascript"></script>';
            }
        }
        return $js;
    }

    function css($str) {
        $css = '';
        if (is_array($str)) {
            foreach ($str as $s) {
                if (filter_var($s, FILTER_VALIDATE_URL)) {
                    $css .= '<link rel="stylesheet" href="' . $s . '" type="text/css">';
                } else {
                    $css .= '<link rel="stylesheet" href="' . site_url('assets/' . $s) . '">';
                }
            }
        } else {
            if (filter_var($str, FILTER_VALIDATE_URL)) {
                $css .= '<link rel="stylesheet" href="' . $str . '">';
            } else {
                $css .= '<link rel="stylesheet" href="' . site_url('assets/' . $str) . '">';
            }
        }
        return $css;
    }

    function imgs($str, $attrib = '') {
        $img = '';

        if (filter_var($str, FILTER_VALIDATE_URL)) {
            $img .= '<img src="' . $str . '" '.$attrib.'>';
        } else {
            $img .= '<img src="' . site_url('assets/' . $str) . '" '.$attrib.'>';
        }


        return $img;
    }

}