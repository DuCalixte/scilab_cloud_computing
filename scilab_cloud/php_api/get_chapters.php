<?php 
$ch = curl_init();
$id= $_GET['id'];
$fields = array (
                        "id" => urlencode($id),               
			"api_user" => urlencode("scilab"),
                        "api_key" => urlencode("zdFmTjX98.")
                );
$fields_string='';
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
$url="http://scilab-test.garudaindia.in/cloud/get_chapters";
//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
//execute post
$result = curl_exec($ch);
$json_d = json_decode($result)->{"response"}->{"data"};
echo "<select name='chapter' id='chapter'><option value=''>Select Chapter</option>";
//print_r($json_d[0]);
for($i=0;$i<sizeof($json_d);$i++) {  //
echo "<option value='".$json_d[$i]->{"value"}."'>".$json_d[$i]->{"name"}."</option>";
//echo $i;
 }
echo "</select>";


?>

