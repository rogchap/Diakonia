<?php

namespace RJC\DiakoniaBundle\Code;

class StaticHelper {

    public static function sanitize_filename($filename, $forceextension=""){
        $defaultfilename = "none";
        $dodgychars = "[^0-9a-zA-Z()_-]"; // allow only alphanumeric, underscore, parentheses and hyphen

        $filename = preg_replace("/^[.]*/","",$filename); // lose any leading dots
        $filename = preg_replace("/[.]*$/","",$filename); // lose any trailing dots
        $filename = $filename?$filename:$defaultfilename; // if filename is blank, provide default

        $lastdotpos=strrpos($filename, "."); // save last dot position
        $filename = preg_replace("/$dodgychars/","_",$filename); // replace dodgy characters
        $afterdot = "";
        if ($lastdotpos !== false) { // Split into name and extension, if any.
        $beforedot = substr($filename, 0, $lastdotpos);
        if ($lastdotpos < (strlen($filename) - 1))
        $afterdot = substr($filename, $lastdotpos + 1);
        }
        else // no extension
        $beforedot = $filename;

        if ($forceextension)
        $filename = $beforedot . "." . $forceextension;
        elseif ($afterdot)
        $filename = $beforedot . "." . $afterdot;
        else
        $filename = $beforedot;

        return $filename;
    }
}