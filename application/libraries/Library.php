<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Library
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function Encode($string, $count = 7)
    {
        $tampung = [];
        for ($x = 0; $x < $count; $x++) {
            if (count($tampung) == 0) $tampung[] = base64_encode($string);
            else $tampung[] = base64_encode($tampung[$x - 1]);
        }

        return str_replace('=', '', ($tampung[count($tampung) - 1]));
    }

    public function Decode($stringDecode, $count, $RemoveSalt = '')
    {
        $tampung = [];
        for ($x = 0; $x < $count; $x++) {
            if (count($tampung) == 0) $tampung[] = base64_decode($stringDecode);
            else $tampung[] = base64_decode($tampung[$x - 1]);
        }

        return str_replace('=', '', ($tampung[count($tampung) - 1]));
    }

    

}

/* End of file Library.php */
