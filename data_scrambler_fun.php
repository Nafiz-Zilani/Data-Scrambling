<?php
function displaykey($key) {
    printf(" value = '%s' ", $key);
}

function scrambling($orginaldata, $key) {
    $orginal_key = 'abcdefghijklmnopurstuvwxyz1234567890';
    $data = '';
    $length = strlen($orginaldata);
    for ($i = 0; $i < $length; $i++){
        $currentChar = $orginaldata[$i];
        $position = strpos($orginal_key, $currentChar);
        if ($position !== false) {
                                            //Meaning of $data .= $key[$position]; (It only work for 0 because PHP take 0 as false)
                                            // $data = "H";
                                            // $key = "W";
                                            // $position = 0;
                                            // $data .= $key[$position];
                                            // echo $data; 
                                            // outputs "HW"     
            $data .= $key[$position];
        }else{
            $data .= $currentChar;
        }
    }

    return $data;
}

function decodeData($orginaldata, $key) {
    $orginal_key = 'abcdefghijklmnopurstuvwxyz1234567890';
    $data = '';
    $length = strlen($orginaldata);
    for ($i = 0; $i < $length; $i++){
        $currentChar = $orginaldata[$i];
        $position = strpos($key, $currentChar);
        if ($position !== false) {  
            $data .= $orginal_key[$position];
        }else{
            $data .= $currentChar;
        }
    }

    return $data;
}

?>