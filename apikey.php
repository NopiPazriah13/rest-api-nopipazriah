<?php
    function getKey() {
        return ["1234", "rahasia", "xyz"];
    }
    function isValid($input) {
        $apikey = $input["api_key"];
        if(in_array($apikey, getKey())){
            return true;
        }else {
            return false;
        }
    }
    function jsonOut($status, $message, $data){
        $respon = ["status" => $status, "message" => $message, "data" => $data];

        header("Content-type: applictaion/json");
        echo json_encode($respon);
    }
    

?>