<?php
system("clear");
$res = "\033[0m";
$red = "\033[1;31m";
$green = "\033[1;32m";
$yellow = "\033[1;33m";
$test = "\033[1;33m";
$datroi = "\033[1;36m";
$lam = "\033[1;34m";
while (true) {
    echo($green.
        'Mã Kích Hoạt: ');
    $unl = trim(fgets(STDIN));
    if ('WWW.MECLOUD.VN' == $unl) {
        print($lam.
            "ĐÚNG KEY.\n");
        break;
    }
    sleep(2); {
        echo $pass[1];
        echo($red.
            "Key Sai Vui Lòng Nhập Lại!.\n\033[0m");
        sleep(1);
    }
}
echo $red.
"Hãy Chọn Nhiệm Vụ !!!\n$res";
echo "\033[1;37m================================ \n";
echo "\033[1;37m~\033[1;31m[\033[1;32m✓\033[1;31m]\033[1;37m => \033[1;33mNhập 1 Chế Độ Auto Sub\n";
echo "\033[1;37m~\033[1;31m[\033[1;32m✓\033[1;31m]\033[1;37m => \033[1;33mNhập 2 Chế Độ Auto Page\n";
echo "\033[1;37m~\033[1;31m[\033[1;32m✓\033[1;31m]\033[1;37m => \033[1;33mNhập 3 Chế Độ Xóa Config\n";
echo "\033[1;37m~\033[1;31m[\033[1;32m✓\033[1;31m]\033[1;37m => \033[1;33mNhập 4 Chế Độ Auto Tương Tác Chéo\n";
echo " \033[1;32mVui Lòng Nhập Chế Độ : \033[1;32m";
$chedo = trim(fgets(STDIN));
if ($chedo == '1') {
    while (true) {
        //color
$res="\033[0m";
$red="\033[1;31m";
$green="\033[1;32m";
$yellow="\033[1;33m";
$test="\033[1;33m";
$datroi="\033[1;36m";
$lam="\033[1;34m";
$banner="\r
\033[1;37m \033[1;31m●\033[;33m TOOL TƯƠNG TÁC CHÉO \033[1;31m● \n\n\033[0m
\033[1;37m \033[1;31m\033[1;33m• Facebook: \033[1;37m saytbson 
\033[1;37m \033[1;31m\033[1;33m• Mail: \033[1;37mngocson.ops\033[1;32m@gmail.com
\033[1;37m \033[1;31m\033[1;33m• Website : \033[1;37www.mecloud.vn
\n";
system("clear");
echo "$banner";
if (file_exists("config.json")  != true) {
	echo "\033[1;32mNhập vào PHPSESSID : ";
	$PHPSESSID = trim(fgets(STDIN));
	echo "\033[1;32mNhập vào cookie facebook : ";
	$cookie = trim(fgets(STDIN));
        echo "\033[1;32mNhập vào id facebook : ";
	$account_id = trim(fgets(STDIN));
	$file = fopen("config.json","a+");
	fwrite($file,'{
		"PHPSESSID":"'.$PHPSESSID.'",
		"cookie":"'.$cookie.'",
		"account_id":"'.$account_id.'"
		}');
	fclose($file);
}
$__cfduid = "__cfduid=d8129be9f78b59a04120bf79f49246ad91595234205";
$data = json_decode(fread(fopen("config.json","r"),filesize("config.json")),true);
$PHPSESSID = $data["PHPSESSID"];
$cookie = $data["cookie"];
$account_id = $data["account_id"];
echo $cookie;
if ( strpos($PHPSESSID,"=") != true) {
	echo "\033[1;33m Config Sai định dạng !!!!\n";
	unlink("config.json");
	exit();
}
 
system("clear");
echo "$banner";
echo "\033[1;32mNhập Time Delay : ";
$time = trim(fgets(STDIN));
system("clear");
echo "$banner";
while(true){
$info = listpost($PHPSESSID,$__cfduid);
foreach ($info as $info){
	$post_id = $info["idpost"];
	follow($post_id,$account_id,$cookie);
	sleep(2);
	$hoanthanh = hoanthanh($post_id,$PHPSESSID,$__cfduid);
	$suc = $hoanthanh["mess"];
	$err = $hoanthanh["error"];
	if (strlen($suc) >10 ) {$xu=$xu+600;$t = $t+1;
		 echo"\033[0;33m[$t]\033[0;31m[\033[0;32mTheoDõi$red]\033[0;37m=>\033[1;33m$post_id\033[0;31m|\033[0;32m+600xu\033[0;31m|\033[0;32mTổng:$xu";
	}else{
		 echo "\033[1;31m|FAIL| \033[1;37mJobs lỗi, không nhận được Xu.\n";
	}
	
	echo"\n";
for ($i=$time;$i>-1;$i--){
    echo "\033[1;33mVui lòng đợi $i giây "."\r";
    sleep(1);

}

}

}
function listpost($PHPSESSID,$__cfduid){
	$url = "https://tuongtaccheo.com/kiemtien/subcheo/getpost.php";
	$head = array (
		"Host: tuongtaccheo.com",
		"accept: application/json, text/javascript, *"."/"."*; q=0.01",
		"x-requested-with: XMLHttpRequest",
		"user-agent: Mozilla/5.0 (Linux; Android 5.1.1; SM-J320G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36",
		"referer: https://tuongtaccheo.com/kiemtien/subcheo/",
		"cookie: ".$__cfduid,
		"cookie: ".$PHPSESSID,
	);
	$ch = curl_init();
	curl_setopt_array ($ch, array (
		CURLOPT_URL => $url,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_HTTPGET => true,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	return json_decode(curl_exec($ch),true);
}

function hoanthanh($post_id,$PHPSESSID,$__cfduid){
	$url = "https://tuongtaccheo.com/kiemtien/subcheo/nhantien.php";
	$data = "id=".$post_id;
	$head = array (
		"Host: tuongtaccheo.com",
		"content-length: ".strlen($data),
		"x-requested-with: XMLHttpRequest",
		"user-agent: Mozilla/5.0 (Linux; Android 5.1.1; SM-J320G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36",
		"content-type: application/x-www-form-urlencoded; charset=UTF-8",
		"origin: https://tuongtaccheo.com",
		"referer: https://tuongtaccheo.com/kiemtien/subcheo/",
		"cookie: ".$__cfduid,
		"cookie: ".$PHPSESSID,
		"cookie: TawkConnectionTime=0"

	);
	$ch = curl_init();
	curl_setopt_array ($ch, array (
		CURLOPT_URL => $url,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	$a = json_decode(curl_exec($ch),true);
	return $a;
}



function follow($post_id,$account_id,$cookie){
        $url = "https://mbasic.facebook.com/".$post_id;
        $head = array (
        "Host: mbasic.facebook.com",
        "upgrade-insecure-requests: 1",
        "save-data: on",
        "user-agent: Mozilla/5.0 (Linux; Android 5.1.1; SM-J320G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*"."/"."*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site: same-origin",
        "sec-fetch-mode: navigate",
        "sec-fetch-user: ?1",
        "sec-fetch-dest: document",
        "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
        "cookie: locale=pt_BR",
        "cookie: c_user=".$account_id,
        "cookie: ".$cookie,
        "cookie: wd=360x559");
        $ch = curl_init();
        curl_setopt_array ($ch, array (
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => TRUE));
        $data = curl_exec($ch);
        if (strpos($data,"preview=deleted") == true){
                echo "\033[1;34m• \033[1;31mCookie đã hết hạn, cấp lại ngay !\n";
        } else {
        $one = explode("location: ",$data);
        $two = explode("rdr",$one[1]);
        $url = $two[0]."rdr";
        curl_setopt_array ($ch, array (
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => TRUE));
        $data = curl_exec($ch);
        $one = explode("/a/subscribe.php?",$data);
        $two = explode('"',$one[1]);

        $url = "https://mbasic.facebook.com/a/subscribe.php?".htmlspecialchars_decode($two[0]);
        curl_setopt_array ($ch, array (
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => TRUE));
        $data = curl_exec($ch);
        
        }
}
    }
}
else if($chedo == '2') {
    while (true) {
        $res="\033[0m";
$red="\033[1;31m";
$green="\033[1;32m";
$yellow="\033[1;33m";
$test="\033[1;33m";
$datroi="\033[1;36m";
$lam="\033[1;34m";
$banner="\r
\033[1;37m \033[1;31m●\033[;33m TOOL TƯƠNG TÁC CHÉO \033[1;31m● \n\n\033[0m
\033[1;37m \033[1;31m\033[1;33m• Facebook: \033[1;37m saytbson 
\033[1;37m \033[1;31m\033[1;33m• Mail: \033[1;37mngocson.ops\033[1;32m@gmail.com
\033[1;37m \033[1;31m\033[1;33m• Website : \033[1;37www.mecloud.vn
\n";
system("clear");
echo "$banner";
echo "\033[1;34m• \033[1;31mVui lòng nhập thông tin để bắt đầu \n";

if ( file_exists("config.json")  != true ) {
	echo "\033[1;32mNhập vào PHPSESSID : ";
	$PHPSESSID = trim(fgets(STDIN));
	echo "\033[1;32mNhập vào cookie facebook : ";
	$cookie = trim(fgets(STDIN));
	echo "\033[1;32mNhập vào id facebook : ";
	$account_id = trim(fgets(STDIN));
	$file = fopen("config.json","a+");
	fwrite($file,'{
"PHPSESSID":"'.$PHPSESSID.'",
"cookie":"'.$cookie.'",
"account_id":"'.$account_id.'"
}');
fclose($file);
}
$__cfduid = "__cfduid=d8129be9f78b59a04120bf79f49246ad91595234205";
$data = json_decode(fread(fopen("config.json","r"),filesize("config.json")),true);
$PHPSESSID = $data["PHPSESSID"];
$cookie = $data["cookie"];
$account_id = $data["account_id"];
echo $cookie;
if ( strpos($PHPSESSID,"=") != true) {
	echo "\033[1;33m Config Sai định dạng !!!!\n";	
	unlink("config.json");
	exit();
}

system("clear");
echo "\033[1;32mNhập Time Delay : ";
$time = trim(fgets(STDIN));
system("clear");
while(true){
$info = listpost($PHPSESSID,$__cfduid);
foreach ($info as $info){
	$post_id = $info["idpost"];
	likepage($post_id,$account_id,$cookie);
	sleep(2);
	$hoanthanh = hoanthanh($post_id,$PHPSESSID,$__cfduid);
	$suc = $hoanthanh["mess"];
	$err = $hoanthanh["error"];
	if (strlen($suc) >10 ) {$xu=$xu+600;$t=$t+1;
		 echo"\033[0;33m[$t]\033[0;31m[\033[0;32mLikePage$red]\033[0;37m=>\033[1;33m$post_id\033[0;31m|\033[0;32m+600xu\033[0;31m|\033[0;32mTổng:$xu";
	}else{
		 echo "\033[1;35m|FAIL| \033[1;37mJobs lỗi, không nhận được Xu.\n";
	}
echo"\n";
for ($i=$time;$i>-1;$i--){
    echo "\033[1;33mVui lòng đợi $i giây "."\r";
    sleep(1);

}
}

}
function listpost($PHPSESSID,$__cfduid){
	$url = "https://tuongtaccheo.com/kiemtien/likepagecheo/getpost.php";
	$head = array (
	           "Host: tuongtaccheo.com",
	           "accept: application/json, text/javascript, */*; q=0.01",
               "x-requested-with: XMLHttpRequest",
               "user-agent: Mozilla/5.0 (Linux; Android 9; CPH1931) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36",
               "referer: https://tuongtaccheo.com/kiemtien/likepagecheo/",
               "cookie: ".$__cfduid,
		       "cookie: ".$PHPSESSID,
	);
	$ch = curl_init();
	curl_setopt_array ($ch, array (
		CURLOPT_URL => $url,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_HTTPGET => true,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	return json_decode(curl_exec($ch),true);
}
function hoanthanh($post_id,$PHPSESSID,$__cfduid){
	$url = "https://tuongtaccheo.com/kiemtien/likepagecheo/nhantien.php";
	$data = "id=".$post_id;
	$head = array (
	           "Host: tuongtaccheo.com",
               "content-length: ".strlen($data),
               "x-requested-with: XMLHttpRequest",
               "user-agent: Mozilla/5.0 (Linux; Android 9; CPH1931) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36",
               "content-type: application/x-www-form-urlencoded; charset=UTF-8",
               "origin: https://tuongtaccheo.com",
                "referer: https://tuongtaccheo.com/kiemtien/likepagecheo/",
                "cookie: ".$__cfduid,
		        "cookie: ".$PHPSESSID,
		        "cookie: TawkConnectionTime=0"

);
	$ch = curl_init();
	curl_setopt_array ($ch, array (
		CURLOPT_URL => $url,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	$a = json_decode(curl_exec($ch),true);
	return $a;
}


function likepage($post_id,$account_id,$cookie){
        $url = "https://mbasic.facebook.com/".$post_id;
        $head = array (
        "Host: mbasic.facebook.com",
        "upgrade-insecure-requests: 1",
        "save-data: on",
        "user-agent: Mozilla/5.0 (Linux; Android 9; CPH1931) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site: none",
        "sec-fetch-mode: navigate",
        "sec-fetch-user: ?1",
        "sec-fetch-dest: document",
       "accept-language: vi-VN,vi;q=0.9",
       "cookie: locale=vi_VN",
       "cookie: c_user=".$account_id,
        "cookie: ".$cookie,
        "cookie: wd=360x672");
        $ch = curl_init();
        curl_setopt_array ($ch, array (
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => TRUE));
        $data = curl_exec($ch);
        if (strpos($data,"xs=deleted") == true){
                echo "\033[1;37m~\033[1;33m[\033[1;31m✘\033[1;33m] \033[1;37m=> \033[1;31mPhiên Bản Cookie Hết Hạn !!!!\n";
        } else {
        $one = explode("location: ",$data);
        $two = explode("rdr",$one[1]);
        $url = $two[0]."rdr";
        curl_setopt_array ($ch, array (
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => TRUE));
        $data = curl_exec($ch);
        $one = explode("/a/profile.php?",$data);
        $two = explode('"',$one[1]);
        
        $url = "https://mbasic.facebook.com/a/profile.php?".htmlspecialchars_decode($two[0]);
        curl_setopt_array ($ch, array (
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => TRUE));
        $data = curl_exec($ch);
        
        }
}
    }
}
else if($chedo == '3') {
        unlink("config.json");
    } 
else if($chedo == '4') {
        while (true) {
            echo "Đang cập nhật";
        }
    } 
?>