<?php

class CommonApp {

    public static $PATH_SAVE_FILE = "../images/items/";

    public function __construct() {
        
    }

    public function getRunCodeItem($table) {
        $lastSEQ = $this->getLastSEQ_($table);
        return $this->genCodeItem($lastSEQ);
    }

    public function getLastSEQ_($table) {
        if (!empty($table)) {
            $sequence = Sequence::model()->findByAttributes(array('s_table' => $table));
            return (int) $sequence->s_value;
        }
    }

    public function genCodeItem($code) {
        $nextNumber = "0000000000";
        // 0000000001
        if ($code < 10) { //9
            $nextNumber = "000000000" . $code;
            return $nextNumber;
        } else {
            if ($code < 100) { // 99
                $nextNumber = "00000000" . $code;
                return $nextNumber;
            } else {
                if ($code < 1000) { // 999 
                    $nextNumber = "0000000" . $code;
                    return $nextNumber;
                } else {
                    if ($code < 10000) { // 9999
                        $nextNumber = "000000" . $code;
                        return $nextNumber;
                    } else {
                        if ($code < 100000) { // 99999
                            $nextNumber = "00000" . $code;
                            return $nextNumber;
                        } else {
                            if ($code < 1000000) { //999999
                                $nextNumber = "0000" . $code;
                                return $nextNumber;
                            } else {
                                if ($code < 10000000) { //9999999
                                    $nextNumber = "000" . $code;
                                    return $nextNumber;
                                } else {
                                    if ($code < 100000000) { //99999999
                                        $nextNumber = "00" . $code;
                                        return $nextNumber;
                                    } else {
                                        if ($code < 1000000000) { //99999999
                                            $nextNumber = "0" . $code;
                                            return $nextNumber;
                                        } else {
                                            return -1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    
    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return (string)$randomString;
    }
    public static function updateSEQ_($table){
        if (!empty($table)) {
            $seques = Sequence::model()->findByAttributes(array('s_table' => $table));
            $seques->s_value = $seques->s_value+1;
            $seques->save();
        }
    }

}
