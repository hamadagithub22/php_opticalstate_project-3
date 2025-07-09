<?php 
define('BASE_URL','http://localhost/opticalState/');

function URL($path =''){
    return BASE_URL . $path;

}
function redirect($path = null){
    $location = BASE_URL . $path;

    echo "
    <script>
    window.location.replace('$location')
    </script>
    ";
}

// string  filter function
function stringFilter($string){
    $string = trim($string);
    $string = htmlspecialchars($string);
    $string = stripslashes($string);
    $string = strip_tags($string);
    return $string;
}
function stringValidation($string, $min = 1, $max = 255){
    $isBigger = strlen($string) >= $min;
    $isSmaller = strlen($string) <= $max;
    $isEmpty = empty($string);

    if(!$isEmpty && $isBigger && $isSmaller){
        return false;
    }else{
        return true;
    }
}


//--------------------------
// function checkPass($password, $confirmation){
//     return $password == $confirmation;

// }

function isEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isNumber($number){
    return is_numeric($number);
}

function imageSizeValidation($image_size, $max_size){
    $max_size = ($max_size * 1024) * 1024; // (from MB to KB) to bytes
    if($image_size > $max_size){
        return true;
    }else{
        return false;
    }
}



//============= auth
function auth(){
    if(!isset($_SESSION['agent'])){
        redirect('dashboard/login.php');
    }
}

?>