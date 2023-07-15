<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Booook!-特商法に基づく表記-</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCGEzgbTlm_wLLKhZYZtlOps7a0N2yk3GM&callback=initialize"></script>
	<style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        .wrap{
            width:90%;
            margin:0 auto;
        }

        li {
            list-style: none;
        }

        a {
            color: #000000;
        }
        
        header {
            height: 80px;
        }

        ul {
            padding: 0;
            margin: 0;
        }

        li{
            display: block;
            padding: 10px auto;
        }

        h1 a {
            text-decoration: none;
        }

        h1 a:hover {
            color: #000000;
        }

        a,:focus{
            outline: none;

        }
	</style>
	</head>
	<body onload="initialize()" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <header class="d-flex justify-content-between bg-light">
            <div class="d-flex justify-content-center align-items-center col-4">
                <h1><a href="{{ route('user.home') }}">Booook!</a></h1>   
            </div>
        </header>    
        <div class="wrap">
            <h1 class="text-center my-5">- 特商法に基づく表記 -</h1>
                <div id="map" style="width: 600px; height: 450px; margin: 0 auto;"></div>
            <p>&nbsp;</p>
            <div class="text-center my-3">
                <a href="{{ route('user.home') }}">
                    <button class="btn btn-secondary">戻る</button>
                </a>
            </div>           
        </div>
		<script>
			function initialize() { 

				// Google Mapで利用する座標
			    var latlng = new google.maps.LatLng({{ config('googlemap.map.latitude') }}, {{ config('googlemap.map.longitude') }}); 
		
				var mapOptions = { 
					zoom: 17, 
					mapTypeId: google.maps.MapTypeId.ROADMAP, 
					center: latlng 
				}; 
		
				// GoogleMapの生成
				var gmap = new google.maps.Map(document.getElementById("map"), mapOptions); 
		
				// マーカーを生成
				var gmarker = new google.maps.Marker({ 
					map: gmap, 
					position: latlng, 
					title: "株式会社アーシャルデザイン" 
				}); 
		
				// 情報ウィンドウの生成
				var infoWindow = new google.maps.InfoWindow({ 
					content: "<table border=0 cellspacing=0 cellpadding=0><tr><td rowspan=2 width=100><img src={{ asset('/storage/aciallogo.png') }} width=70 height=32 border=0></td><td><div align=left><font size=-1>■株式会社アーシャルデザイン<br><br></font></div></td></tr><tr><td><div align=left><font size=-1>東京都渋谷区神宮前2丁目4-11<br>Daiwa神宮前ビル 3F<br>TEL:03-4546-8348　FAX:03-4546-8348</font></div></td><td width=10></td></tr></table>", 
					maxWidth: 400
				});
		
				// マーカーのクリックイベントの関数登録
				google.maps.event.addListener(gmarker, 'click', function(event) { 
					// 情報ウィンドウの表示
					infoWindow.open(gmap, gmarker); 
				}); 
		
				// ロード時に噴出し表示
				google.maps.event.addListenerOnce(gmap, 'tilesloaded', function () {
					// 情報ウィンドウの表示
					infoWindow.open(gmap, gmarker);
				});
			}
		</script>
	</body>
</html>