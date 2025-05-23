
<?php
// application/helpers/custom_helper.php

if (!function_exists('captcha')) {
    function captcha()
    {
        $n1 = rand(10, 100);
        $n2 = rand(0, 10);
        $sign = array('+', '-');
        $m = rand(0, 1);
        $math = eval("return $n1$sign[$m]$n2;");
        $a = array('n1' => $n1, 'n2' => $n2, 'sign' => $sign[$m], "captcha_word" => $math);

        return $a;
    }
}

if (!function_exists('calculateAgeDetails')) {
    function calculateAgeDetails($birthdate)
    {
        $birthDate = new DateTime($birthdate);
        $currentDate = new DateTime();
        $diff = $birthDate->diff($currentDate);

        $years = $diff->y;
        $months = ($years * 12) + $diff->m;
        $days = $diff->days;

        return [
            'Years' => $years,
            'Months' => $months,
            'Days' => $days
        ];
    }
}

function findDateOfBirth($years, $months)
{
    $currentDate = new DateTime();
    $birthDate = clone $currentDate;

    // Subtract years and months from the current date
    $birthDate->sub(new DateInterval("P{$years}Y"));
    $birthDate->sub(new DateInterval("P{$months}M"));

    return $birthDate->format("Y-m-d");
}

function formatDate($date)
{
    return date("d-m-Y", strtotime($date));
}

function calculateDaysBetween($date1, $date2)
{
    $d1 = new DateTime($date1);
    $d2 = new DateTime($date2);
    return $d1->diff($d2)->days;
}

function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function validatePassword($password, $hash)
{
    return password_verify($password, $hash);
}


function generatePatientID()
{
    return uniqid("PAT_");
}

function calculateBMI($weight, $height)
{
    /* 
    ============================== 

    BMI stands for Body Mass Index. It is a measurement that calculates whether a person has a healthy body weight for their height.
    ------------------------------------------------------------------
        Underweight: BMI < 18.5
        Normal weight: BMI 18.5 – 24.9
        Overweight: BMI 25 – 29.9
        Obese: BMI ≥ 30
 ====================================
 */
    return $weight / ($height * $height);
}

function encryptData($data)
{
    return base64_encode($data);
}

function decryptData($encryptedData)
{
    return base64_decode($encryptedData);
}

function validatePhoneNumber($phone)
{
    return preg_match("/^[0-9]{10}$/", $phone) ? true : false;
}




?>