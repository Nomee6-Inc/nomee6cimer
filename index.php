<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include_once "config.php";

if (isset($_POST['submit'])) {
$tc = $_POST['tc'];	
$tur = $_POST['tur'];
$name = $_POST['name'];
$adres = $_POST['adres'];
$il = $_POST['il'];
$ilce = $_POST['ilce'];
$phonenum = $_POST['ceptel'];
$egitimdurum = $_POST['egitimdurum'];
$email = $_POST['mail'];
$messagecontent = $_POST['message'];
$sql = "INSERT INTO cimerdata (type, name, adres, il, ilce, telno, egitimdurum, mail, message, tc)
					VALUES ('$tur', '$name', '$adres', '$il', '$ilce', '$phonenum', '$egitimdurum', '$email', '$messagecontent', '$tc')";
$result = mysqli_query($conn, $sql);
if($result==true){
	echo "Başvurunuz başarıyla veritabanımıza kaydedildi!";
	$mail = new PHPMailer(true);
	$mail->SMTPDebug = 3;  
	$mail->isSMTP();           
	$mail->Host = "";
	$mail->SMTPAuth = true;
	$mail->Username = "";                 
	$mail->Password = "";
	$mail->SMTPSecure = "ssl";
	$mail->Port = 465;
	$mail->From = "";
	$mail->FromName = "";
	$mail->addAddress("");
	$mail->isHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Encoding = 'base64';
	$mail->Subject = "";
	$mail->Body = "";
	$mail->Timeout       =   60;
	$mail->SMTPKeepAlive = true;
	try {
		$mail->send();
	} catch (Exception $e) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
} else {
	echo "Başvuru gönderilirken hata oluştu!";
}
}
?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Cimer</title>
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
	<meta property="og:title" content="Nomee6 Cimer" />
	<meta property="og:url" content="https://cimer.nomee6.xyz" />
  </head>
  <body>
  <div class="page">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
          </button>
          <div class="navbar-nav flex-row order-md-last">
            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Koyu Tema" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
            </a>
            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Açık Tema" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
            </a>
        </div>
      </header>
      <div class="page-wrapper">
        <div class="container-xl">
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <div class="page-pretitle">
                  CİMER
                </div>
                <h2 class="page-title">
                  Başvuru Yap
                </h2>
              </div>
		<div class="page-body">
          <div class="container-xl">
		  <form enctype="multipart/form-data" action="" method="POST">
			  <div class="mb-3">
                <div class="form-label">Tür</div>
                <div>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tur" name="tur" checked value="İstek">
                    <span class="form-check-label">İstek</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tur" name="tur" value="Görüş Öneri">
                    <span class="form-check-label">Görüş Öneri</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tur" name="tur" value="İhbar">
                    <span class="form-check-label">İhbar</span>
                  </label>
				  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tur" name="tur" value="Şikayet">
                    <span class="form-check-label">Şikayet</span>
                  </label>
				  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tur" name="tur" value="Bilgi Edinme Hakkı">
                    <span class="form-check-label">Bilgi Edinme Hakkı</span>
                  </label>
				  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tur" name="tur" value="Teşekkür">
                    <span class="form-check-label">Teşekkür</span>
                  </label>
				  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tur" name="tur" value="Yönetime Katıl">
                    <span class="form-check-label">Yönetime Katıl</span>
                  </label>
              </div>
			  <div class="mb-3">
			  		<label class="form-label required">TC Kimlik No</label>
			  		<input type="text" class="form-control" name="tc" id="tc" placeholder="TC Kimlik No" >
              </div>
			  <div class="mb-3">
			  	<label class="form-label required">Ad Soyad</label>
              	<input type="text" class="form-control" name="name" id="name" placeholder="Ad Soyad" >
			  </div>
			  <div class="mb-3">
			  	<label class="form-label required">Adres</label>
              	<input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" >
			  </div>
			  <div class="mb-3">
			  	<label class="form-label required">İl</label>
              	<input type="text" class="form-control" name="il" id="il" placeholder="İl" >
			  </div>
			  <div class="mb-3">
			  	<label class="form-label required">İlçe</label>
              	<input type="text" class="form-control" name="ilce" id="ilce" placeholder="İlçe" >
			  </div>
			  <div class="mb-3">
			  	<label class="form-label required">Cep Telefonu</label>
              	<input type="tel" class="form-control" name="ceptel" id="ceptel" placeholder="Cep telefonu" >
			  </div>
			  <div class="mb-3">
			  	<label class="form-label required">E-Posta</label>
              	<input type="email" class="form-control" name="mail" id="mail" placeholder="E-Posta" >
			  </div>
			  <div class="mb-3">
                <div class="form-label">Eğitim Durumu</div>
                <select class="form-select" name="egitimdurum" id="egitimdurum">
                  <option value="ilkokul">İlkokul</option>
                  <option value="ortaokul">Ortaokul</option>
				  <option value="lise">Lise</option>
				  <option value="uni">Üniversite</option>
				  <option value="nomee6egitim">NOMEE6 EGİTİM MEZUNU</option>
                </select>
              </div>
			  <div class="mb-3">
                <label class="form-label">Başvuru Mesajınız</label>
                <textarea class="form-control" name="message" id="message" placeholder="Başvuru Mesajınız"></textarea>
		      </div>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Gönder</button>
			</div>
			</form>
		</div>
      </div>
	  
	  <div class="col-12">
            	<div class="card">
            	  <div class="card-body">
            	    <h3 class="card-title">İşbu taahhütname</h3>
            	    <div class="card-subtitle">İşbu taahhütname; Başvuru Sahibi tarafından gerçekleştirilecek istek, şikayet, bilgi edinme, ihbar, öneri veya görüş niteliğindeki başvurulara yönelik Cumhurbaşkanlığı İletişim Merkezi’nin (“CİMER”) kullanımına ilişkin hak ve yükümlülükleri düzenlemektedir.</div>
            	    <p>Bu kapsamda Başvuru Sahibi; <br>
					1. Başvuru sürecinde temin ettiği kişisel ve sair bilgilerin doğru, eksiksiz ve güncel olduğunu, <br> 
					2. CİMER üzerinden verilecek hizmetlerden yararlanma hakkının münhasıran şahsına ait olduğunu, CİMER vasıtasıyla gerçekleştirdiği her işlemin kendisi tarafından gerçekleştirilmiş olduğunu, bu işlemlerden kaynaklanan hukuki ve cezai sorumluluğunun münhasıran kendisine ait olduğunu, CİMER’in söz konusu hukuki ve cezai yükümlülüklerle ilgili herhangi bir sorumluluğu bulunmadığını, <br>
					3. CİMER sisteminin işleyişi hakkında bilgi sahibi olduğunu, başvuruya yönelik işlemlerin CİMER tarafından yapılacak değerlendirme sonucu gerçekleştirileceğini, <br>
					4. Kamu kurum ve kuruluşlarının CİMER’den teknik altyapı desteği alarak kendi internet sitelerinde yer alan “Bilgi Edinme Başvuru” sayfalarını sisteme entegre edebildiğini ve bu şekilde yapılan başvuruların doğrudan ilgili kurum ya da kuruluşa gönderildiğini, bu doğrultuda başvuruya yönelik işlem ve değerlendirme sürecinde CİMER’in herhangi bir kontrolü, bilgisi ve sorumluluğu bulunmadığını, <br>
					5. Söz konusu hizmetin sunum kalitesinin artırılması amacıyla yapılacak araştırma ve çalışmalarda CİMER sistemine yapılan başvurular ile ilgili istatistiki verilerin elde edilebileceğini,<br>
					6. CİMER sisteminin sunduğu hizmetlerden faydalanmak üzere tarafına gönderilen güvenlik kodunun gizli kalması için gerekli dikkat ve özeni göstereceğini, güvenlik kodunu muhafaza etmek için gerekli tedbirleri alacağını, güvenlik kodunun kendi kontrolü dışında üçüncü şahısların eline geçmesi halinde derhal CİMER’e yazılı bildirimde bulunacağını ve gerekli önlemlerin alınması hususunda işbirliği yapacağını, yazılı bildirim tarihine kadar güvenlik kodunun kullanılması haline CİMER’e herhangi bir sorumluluk yüklenemeyeceğini, <br>
					7. Kimlik bilgilerinin CİMER hizmetlerinden yararlanmak için vekâlet veya vesayet yetkileri içinde sınırlı kalmak kaydıyla vekâlet verdiği ya da vasisi olan kişiler haricinde, herhangi bir üçüncü kişi tarafından kullanılmasına izin vermeyeceğini, bunların kullanılması durumunda sonuçlarından şahsi sorumluluğu bulunduğunu, bu nedenle CİMER’e karşı herhangi bir cezai, idari ve hukuki sorumluluk iddiasında bulunamayacağını, CİMER’in kullanıcılar için kimlik araştırma yükümlülüğünün olmadığını, <br>
					8. Başvurusunda; Türkiye Cumhuriyeti Yasalarına ve Türkiye Cumhuriyeti’nin taraf olduğu uluslararası sözleşmelere aykırı; tehdit, hakaret ve küfür içeren, suiistimal veya taciz edici, haksız fiil veya iftira niteliğinde, kaba, müstehcen, kötüleyici veya başka birinin gizlilik haklarını ihlal edebilecek nitelikte olan ve hukuki ve cezai sorumluluğunu gerektiren hiçbir mesaj, bilgi, veri, metin, yazılım, resim veya diğer herhangi bir tür materyali iletmeyeceğini, aksi takdirde doğacak tüm hukuki ve cezai yükümlülüklerden münhasıran sorumlu olacağını, <br>
					9. Yaptığı başvurularda herhangi bir gerçek veya tüzel kişinin şöhretine, ticari itibarına, markasına, şan ve şerefine ve diğer tüm kişilik haklarına tecavüzde bulunmayacağını, bunlara yol açacak ibare ve ifadeleri kullanmayacağını, aksi halde üçüncü şahısların taleplerinden doğabilecek maddi ve manevi zararlar, ile diğer her türlü talep ve davadan münhasıran sorumlu olacağını, <br>
					10. CİMER sisteminin tamamı veya herhangi bir bölümü üzerinde bozma, değiştirme, tersine mühendislik yapma amacıyla kullanım gerçekleştiremeyeceğini, CİMER sisteminin iletişim veya teknik sistemlerini engelleyen, değiştiren, bozan ya da sistemlere müdahale edecek her türlü davranıştan kaçınacağını, CİMER sistemi üzerinde otomatik program, robot, örümcek, web crawler, veri madenciliği, veri taraması vb. screen scraping yazılımları veya sistemleri, otomatik aletler ya da manuel süreçler kullanmayacağını, virüsler, truva atları, casus programlar ve dialer programları vb. her türlü kötü amaçlı kodları ve materyalleri CİMER Sistemine yerleştirmeyeceğini veya iletmeyeceğini, <br>
					11. CİMER sisteminin iletişim özelliklerini ve bu sistemin kaynaklarını herhangi bir yöntemle diğer başvuru sahiplerinin erişimlerini kısıtlayacak veya yok edecek biçimde kullanmayacağını, <br> 
					12. Reklam, promosyonal materyal, junk mail veya spam, zincir mektuplar, ticari fikir ve duyurular, ticari amaçlı metin, resim, ses, grafik ve diğer her türlü materyali CİMER sistemine yerleştirmeyeceğini veya iletmeyeceğini, CİMER sistemini ticari amaçlarla veya kullanım amacı dışında kullanmayacağını, <br>
					13. Şahsına ait kimlik bilgilerinin ve/veya ulaşım kayıtları bilgilerinin CİMER görevlilerine yanlış olarak beyan edilmesi durumunda ve/veya CİMER’in güvenlik açısından gerekli görmesi halinde; işlemi durdurma, işlemi yapmama ve/veya değiştirilmesini talep etme haklarına sahip olduğunu, bu durumlarda zararlarından, kayıplarından ve gecikmelerden CİMER’in sorumlu tutulamayacağını, <br>
					14. CİMER hizmetlerini kullanırken ortaya çıkabilecek cihaz arızası, iletişim kesintisi, iletişim yavaşlığı, hat yoğunluğu vb. teknik nedenlerden dolayı hizmetin yerine getirilememesi durumunda CİMER’in herhangi bir sorumluluğunun olmayacağını,<br>
					15. CİMER uygulamalarının içerik ve kapsamında önceden tarafına haber verilmeksizin değişiklik yapılabileceğini,<br>
					16. Daha önce yaptığı başvurularının işlemden kaldırılması veya silinmesi talebinin yetkili makamlar tarafından mer’i mevzuat hükümleri kapsamında değerlendirileceğini, <br>
					17. Yukarıda açıklanan şartlara ve yükümlülüklere uyulmaması halinde CİMER’in yetkili makamlara bildirme dahil olmak üzere her türlü hukuki ve fiili tedbiri alma hakkına sahip olduğunu, CİMER’e herhangi bir cezai, idari ve hukuki sorumluluk yükletilemeyeceğini, CİMER’e karşı hiçbir talep ve iddiada bulunamayacağını ve CİMER’in söz konusu işlemlerden doğacak zararlardan herhangi bir sorumluluğunun bulunmadığını 
					kabul, beyan ve taahhüt eder.</p>
                    </div>
                </div>
            </div>
              
			<footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    <a href="https://discord.gg/bserKPkHCM" target="_blank" class="link-secondary" rel="noopener">
	                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="12" r="1" /><circle cx="15" cy="12" r="1" /><path d="M7.5 7.5c3.5 -1 5.5 -1 9 0" /><path d="M7 16.5c3.5 1 6.5 1 10 0" /><path d="M15.5 17c0 1 1.5 3 2 3c1.5 0 2.833 -1.667 3.5 -3c.667 -1.667 .5 -5.833 -1.5 -11.5c-1.457 -1.015 -3 -1.34 -4.5 -1.5l-1 2.5" /><path d="M8.5 17c0 1 -1.356 3 -1.832 3c-1.429 0 -2.698 -1.667 -3.333 -3c-.635 -1.667 -.476 -5.833 1.428 -11.5c1.388 -1.015 2.782 -1.34 4.237 -1.5l1 2.5" /></svg>
                      Discord
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Site tamamen mizah amaçlı olup hiçbir kurum veya kişiyi hedef almamaktadır.
                  </li>
                </ul>
              </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world.js"></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
    <script src="./dist/js/demo.min.js"></script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		stroke: {
      			width: [2, 1],
      			dashArray: [0, 3],
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "May",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
      		},{
      			name: "April",
      			data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4", "#a8aeb7"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 240,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      			stacked: true,
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Web",
      			data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
      		},{
      			name: "Social",
      			data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
      		},{
      			name: "Other",
      			data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
      		}],
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      			xaxis: {
      				lines: {
      					show: true
      				}
      			},
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
      		],
      		colors: ["#206bc4", "#79a6dc", "#bfe399"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:on
      document.addEventListener("DOMContentLoaded", function() {
      	new jsVectorMap({
      		selector: '#map-world',
      		map: 'world',
      		backgroundColor: 'transparent',
      		regionStyle: {
      			initial: {
      				fill: '#F8FAFC',
      				stroke: '#dae1e7',
      				strokeWidth: 1,
      			}
      		},
      		zoomOnScroll: false,
      		zoomButtons: false,
      		// -------- Series --------
      		visualizeData: {
      			scale: ['#F8FAFC', '#206bc4'],
      			values: { "AF": 16, "AL": 11, "DZ": 158, "AO": 85, "AG": 1, "AR": 351, "AM": 8, "AU": 1219, "AT": 366, "AZ": 52, "BS": 7, "BH": 21, "BD": 105, "BB": 3, "BY": 52, "BE": 461, "BZ": 1, "BJ": 6, "BT": 1, "BO": 19, "BA": 16, "BW": 12, "BR": 2023, "BN": 11, "BG": 44, "BF": 8, "BI": 1, "KH": 11, "CM": 21, "CA": 1563, "CV": 1, "CF": 2, "TD": 7, "CL": 199, "CN": 5745, "CO": 283, "KM": 0, "CD": 12, "CG": 11, "CR": 35, "CI": 22, "HR": 59, "CY": 22, "CZ": 195, "DK": 304, "DJ": 1, "DM": 0, "DO": 50, "EC": 61, "EG": 216, "SV": 21, "GQ": 14, "ER": 2, "EE": 19, "ET": 30, "FJ": 3, "FI": 231, "FR": 2555, "GA": 12, "GM": 1, "GE": 11, "DE": 3305, "GH": 18, "GR": 305, "GD": 0, "GT": 40, "GN": 4, "GW": 0, "GY": 2, "HT": 6, "HN": 15, "HK": 226, "HU": 132, "IS": 12, "IN": 1430, "ID": 695, "IR": 337, "IQ": 84, "IE": 204, "IL": 201, "IT": 2036, "JM": 13, "JP": 5390, "JO": 27, "KZ": 129, "KE": 32, "KI": 0, "KR": 986, "KW": 117, "KG": 4, "LA": 6, "LV": 23, "LB": 39, "LS": 1, "LR": 0, "LY": 77, "LT": 35, "LU": 52, "MK": 9, "MG": 8, "MW": 5, "MY": 218, "MV": 1, "ML": 9, "MT": 7, "MR": 3, "MU": 9, "MX": 1004, "MD": 5, "MN": 5, "ME": 3, "MA": 91, "MZ": 10, "MM": 35, "NA": 11, "NP": 15, "NL": 770, "NZ": 138, "NI": 6, "NE": 5, "NG": 206, "NO": 413, "OM": 53, "PK": 174, "PA": 27, "PG": 8, "PY": 17, "PE": 153, "PH": 189, "PL": 438, "PT": 223, "QA": 126, "RO": 158, "RU": 1476, "RW": 5, "WS": 0, "ST": 0, "SA": 434, "SN": 12, "RS": 38, "SC": 0, "SL": 1, "SG": 217, "SK": 86, "SI": 46, "SB": 0, "ZA": 354, "ES": 1374, "LK": 48, "KN": 0, "LC": 1, "VC": 0, "SD": 65, "SR": 3, "SZ": 3, "SE": 444, "CH": 522, "SY": 59, "TW": 426, "TJ": 5, "TZ": 22, "TH": 312, "TL": 0, "TG": 3, "TO": 0, "TT": 21, "TN": 43, "TR": 729, "TM": 0, "UG": 17, "UA": 136, "AE": 239, "GB": 2258, "US": 4624, "UY": 40, "UZ": 37, "VU": 0, "VE": 285, "VN": 101, "YE": 30, "ZM": 15, "ZW": 5 },
      		},
      	});
      });
      // @formatter:off
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
      		chart: {
      			type: "radialBar",
      			fontFamily: 'inherit',
      			height: 40,
      			width: 40,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		plotOptions: {
      			radialBar: {
      				hollow: {
      					margin: 0,
      					size: '75%'
      				},
      				track: {
      					margin: 0
      				},
      				dataLabels: {
      					show: false
      				}
      			}
      		},
      		colors: ["#206bc4"],
      		series: [35],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 192,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Purchases",
      			data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      		point: {
      			show: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
  </body>
</html>