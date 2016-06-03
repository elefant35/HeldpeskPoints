<?php
//Globals-----------------------------
$Wurl="https://hooks.slack.com/services/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";

//functions---------------------------
function sendPackage($data, $Wurl){
        $ch = curl_init($Wurl);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_exec($ch);
        curl_close($ch);


}
function makePackage($string)
{
        $data= "payload=" . json_encode(array(
//        "channel" => "#{$_POST['channel_name']}",
        "text" => $string));


        return $data;
}
//main------------------------------------
$token = $_POST['token'];
if($token !='KvEAVM3BF3ox2SRfjHuUw0J8'){
        echo ('<img src= http://vignette1.wikia.nocookie.net/muppet/images/5/5b/Oscar-can.png/revision/latest?cb=20120117061845>');
        die("Go Away");
}

echo("test");
$text = makePackage("not hello");
sendPackage($text, $Wurl);


echo("$text");


?>
