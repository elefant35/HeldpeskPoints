<?php
//Globals-----------------------------
$Wurl="https://hooks.slack.com/services/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";
$text = explode(' ', $_POST['text']);
$Filename = 'points.csv';
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
function plusplus($text){
	foreach($text as $word){
		if(substr($word, -2) === '++')
		{
			$words = $words.' '.$word;
		}
	}
	return $words;
}
function subtract(&$csvi,$file, $name)
{
	 foreach($csv as &$acsv){
                if( $acsv['name'] == $name){
                        $acsv['points'] = $acsv['points'] - $amount;
                }
        }
        $fp = fopen($Filename, 'w');
        fputs($fp,"name,points\n");
        foreach($csv as $row){
                fputcsv($fp, $row);
        }
        fclose($fp);



}
//main------------------------------------
//ready file-----------------------------
$csv = array_map('str_getcsv', file($Filename));
array_walk($csv, function(&$a) use ($csv){
        $a = array_combine($csv[0],$a);
});
array_shift($csv);

//Verify token
$token = $_POST['token'];
if($token !='KvEAVM3BF3ox2SRfjHuUw0J8'){
        echo ('<img src= http://vignette1.wikia.nocookie.net/muppet/images/5/5b/Oscar-can.png/revision/latest?cb=20120117061845>');
/*	$blah = explode(' ', "hello my name is tac4++");
	$test = plusplus($blah);
	echo($test);*/

        die("Go Away");
}

echo("test");
$test = plusplus($text);
$data = makePackage($test);
sendPackage($data, $Wurl);


echo($test);


?>
