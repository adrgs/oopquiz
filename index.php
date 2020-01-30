<?php

ini_set('session.cookie_httponly', 0);
ob_start();
session_start();

$probleme = array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '67', '68', '70', '71', '72', '73', '74', '75', '76', '77', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '96', '97', '98', '99', '100', '101', '102', '103', '104', '105', '106', '107', '108', '109', '110', '111', '112');

function valid_id($id) {
    global $probleme;
    return in_array($id, $probleme);
}

if (!isset($_SESSION['solved'])) {
    $_SESSION['solved'] = array();
}
if (!isset($_REQUEST['id']) || !valid_id($_REQUEST['id'])) {
    $url=strtok($_SERVER["REQUEST_URI"],'?');
    header('Location: '.$url.'?id=2');
    exit();
}

$problema_id = $_REQUEST['id'];

if (isset($_REQUEST['action']))
{

    if ($_REQUEST['action'] == 'check') {
        if ($_REQUEST['rez'] == 'da') {

            if (file_exists('surse/rez'.$problema_id.'.txt')) {
                $_SESSION['solved'][$problema_id] = 'solved';
                echo "ok";
            } else {
                $_SESSION['solved'][$problema_id] = 'wrong';
                echo "gresit";
            }

        } else if ($_REQUEST['rez'] == 'nu') {

            if (file_exists('surse/err'.$problema_id.'.txt')) {
                $_SESSION['solved'][$problema_id] = 'solved';
                echo "ok";
            } else {
                $_SESSION['solved'][$problema_id] = 'wrong';
                echo "gresit";
            }

        } else {
            $_SESSION['solved'][$problema_id] = 'wrong';
            echo "gresit";
        }
        exit();
    }

    if ($_REQUEST['action'] == 'details') {
        if (file_exists('surse/rez'.$problema_id.'.txt')) {
            echo file_get_contents('surse/rez'.$problema_id.'.txt');
        } else if (file_exists('surse/err'.$problema_id.'.txt')) {
            echo file_get_contents('surse/err'.$problema_id.'.txt');
        } else {
            echo "eroare server";
        }

        exit();
    }

    if ($_REQUEST['action'] == 'checkrez') {

        $data = $_REQUEST['data'];

        if (trim(file_get_contents('surse/rez'.$problema_id.'.txt')) == trim($data)) {
            echo "ok";
            $_SESSION['solved'][$problema_id] = 'solved';
        }  else {
            echo "gresit";
            $_SESSION['solved'][$problema_id] = 'wrong';
        }

        exit();

    }

    if ($_REQUEST['action'] == 'checkcompile') {

        //$sursa = file_get_contents('surse/prob'.$problema_id.'.cpp');

        $data = $_REQUEST['data'];

        if (strlen($data)>4096) {
            echo "Sursa trebuie sa aiba maxim 4096 bytes";
            exit();
        }

        $temp = tmpfile();

        $metaDatas = stream_get_meta_data($temp);
        $tmpFilename = $metaDatas['uri'];

        rename($tmpFilename, $tmpFilename .= '.cpp');

        file_put_contents($tmpFilename, $data);

        //herokuapp fix
        exec("/app/.apt/usr/bin/g++ -w -Wfatal-errors ".$tmpFilename." -o " .$tmpFilename. ".bin 2>&1", $out);
        //exec("/usr/bin/g++ -w -Wfatal-errors ".$tmpFilename." -o " .$tmpFilename. ".bin 2>&1", $out);

        $out = implode("\n",$out);

        $out = trim(str_replace("compilation terminated due to -Wfatal-errors.","",$out));

        if ($out=="") {
            $_SESSION['solved'][$problema_id] = 'solved';
            echo "ok"; 
        } else {
            $_SESSION['solved'][$problema_id] = 'wrong';
            echo $out;
        }

        if (file_exists($tmpFilename))
            unlink($tmpFilename);

        if (file_exists($tmpFilename.'.bin'))
            unlink($tmpFilename.'.bin');

        exit();
    }
}

include 'template.php';

?>