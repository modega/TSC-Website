<!DOCTYPE html>
<html lang="tr">
  <head>
    <title>TSC - The Sanguine Council</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <!-- Fade Out Animation -->
    <script>
    $(document).ready(function () {
      $("#preImage").click(function () {
        $(this).fadeOut(1200);
      });
    })
    </script>
    <!-- Smooth Scrolling Script -->
		<script>
		  $(document).ready(function(){
		  $(".navbar a").on('click', function(event) {
		  if (this.hash !== "") {
		    event.preventDefault();
		    var hash = this.hash;
		    $('html, body').animate({
		      scrollTop: $(hash).offset().top
		    }, 900, function(){
		      window.location.hash = hash;
		      });
		    }
		  });
		})
		</script>
    <!-- Slide Animation -->
    <script>
      $(window).scroll(function() {
        $(".slideanim").each(function(){
          var pos = $(this).offset().top;
          var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
        });
      });
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-103556866-1', 'auto');
      ga('send', 'pageview');
    </script>
    <script>
      $(document).ready(function() {
        jQuery.validator.addMethod("notEqualTo",
          function(value, element, param) {
              var notEqual = true;
              value = $.trim(value);
              for (i = 0; i < param.length; i++) {
                  if (value == $.trim($(param[i]).val())) { notEqual = false; }
              }
              return this.optional(element) || notEqual;
            }, "Aynı klan birden fazla kere seçilemez.");
          $("#eventRegister").validate({
              rules:{
                optionOneM:{
                  notEqualTo: ['#optionTwoM','#optionThreeM','#optionFourM','#optionFiveM']
                },
                optionTwoM:{
                  notEqualTo: ['#optionOneM','#optionThreeM','#optionFourM','#optionFiveM']
                },
                optionThreeM:{
                  notEqualTo: ['#optionOneM','#optionTwoM','#optionFourM','#optionFiveM']
                },
                optionFourM:{
                  notEqualTo: ['#optionOneM','#optionTwoM','#optionThreeM','#optionFiveM']
                },
                optionFiveM:{
                  notEqualTo: ['#optionOneM','#optionTwoM','#optionThreeM','#optionFourM']
                },
                optionOneF:{
                  notEqualTo: ['#optionTwoF','#optionThreeF','#optionFourF','#optionFiveF']
                },
                optionTwoF:{
                  notEqualTo: ['#optionOneF','#optionThreeF','#optionFourF','#optionFiveF']
                },
                optionThreeF:{
                  notEqualTo: ['#optionOneF','#optionTwoF','#optionFourF','#optionFiveF']
                },
                optionFourF:{
                  notEqualTo: ['#optionOneF','#optionTwoF','#optionThreeF','#optionFiveF']
                },
                optionFiveF:{
                  notEqualTo: ['#optionOneF','#optionTwoF','#optionThreeF','#optionFourF']
                }
              },
              messages:{

              }
          });
        })
    </script>
    <script>
      $(document).ready(function() {
        $('input[name="sex"]').click(function() {
            $('.togglehid').addClass('hidden');
          if($(this).attr('id') == 'sexMale')
          {
          	$("#form-male").toggleClass('hidden');
          }
          else if($(this).attr('id') == 'sexFemale')
          {
          	$("#form-female").toggleClass('hidden');
          }
        });
      });
    </script>
    <?php
      include('mail.php');
      if(isset($_POST["Contact"])){
        $alertController = sendEmailContact($_POST["contactName"],$_POST["contactEmail"],$_POST["contactSubject"],$_POST["contactContent"]);
      }
      if(isset($_POST["RegEvent"])){
        if($_POST["sex"] == "male"){
          $alertController = sendEmailRegister($_POST["registerName"],$_POST["registerMail"],$_POST["registerPhone"],$_POST["registerOtherContact"],$_POST["optionOneM"],$_POST["optionTwoM"],$_POST["optionThreeM"],$_POST["optionFourM"],$_POST["optionFiveM"],"Erkek");
        }
        if($_POST["sex"] == "female"){
          $alertController = sendEmailRegister($_POST["registerName"],$_POST["registerMail"],$_POST["registerPhone"],$_POST["registerOtherContact"],$_POST["optionOneF"],$_POST["optionTwoF"],$_POST["optionThreeF"],$_POST["optionFourF"],$_POST["optionFiveF"],"Kadın");
        }
      }
    ?>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="40">
    <div id="page-container" class="container-fluid col-sm-8 col-sm-offset-2">
      <!-- Site Navigation - Sticky -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div id="navbar-container" class="container">
          <a class="navbar-brand" href="#top-content">
            <img src="img/logo-nav.png" alt="TSC" height="50" width="50">
          </a>
          <div class="collapse navbar-collapse">
  		     	<ul class="nav navbar-nav">
              <li><a href="#whois"><strong>TSC Kimdir?</strong></a></li>
              <!---<li><a href="#events">Etkinliklerimiz</a></li>-->
              <li><a href="#whatis"><strong>Larp Nedir?</strong></a></li>
              <li><a href="#thisyear"><strong>Concordia Salus</strong></a></li>
              <li><a href="#contact"><strong>İletişim</strong></a></li>
            </ul>
            <ul id="fb-container" class="nav navbar-nav">
              <li><a id="fb-link" href="https://www.facebook.com/TheSanguineCouncil/" target="_blank"><img src="img/fb-icon.png" alt="FB" height="36" width="36"></a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div id="top-content" class="container-fluid">
        <div id="jumbo" class="jumbotron card">
        </div>
      </div>
      <?php if(isset($_POST["Contact"])||isset($_POST["RegEvent"])){ ?>
      <?php if(!$alertController) {?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Bir sıkıntı oluştu!.</strong>
        </div>
      <?php } ?>
      <?php if($alertController) {?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Başarılı.</strong>
        </div>
      <?php } } ?>
      <div id="below-image" class="container-fluid">
        <div id="whois" class="card container content-card">
          <div class="container-fluid text-container slideanim">
            <h1 class="text-center text-color text-header-font"><strong>TSC KİMDİR?</strong></h1>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <p class="text-styler text-color text-center text-font"><strong>The Sanguine Council</strong>, METUCON 2016 etkinliğinde düzenlediğimiz <strong>Red Star Rising</strong>,  adlı LARP’ın ardından Nisan 2017’de resmi olarak kurulan, kâr amacı gütmeyen bir LARP topluluğudur. Ankara merkezli olan ve geniş çaplı projeler üzerinde çalışan <strong>The Sanguine Council</strong>,  olarak etkinliklerimizin merkezinde <strong>World of Darkness</strong>,  evreni yer almaktadır. </p>
                <p class="text-styler text-color text-center text-font">En büyük amacımız, World of Darkness evreninde geçen hikayeleri, masa başından kaldırıp gerçek dünyaya taşıyarak oyuncularımıza sürükleyici oyun deneyimleri sunmak ve ülkemizde pek çok oyuncusu olan World of Darkness evreninin sevenlerini etkinliklerimiz ile bir araya getirmektir. </p>
              </div>
            </div>
          </div>
        </div>
        <!--<div id="events" class="card container content-card">
        </div>-->
        <div id="whatis" class="card container content-card">
          <div class="container-fluid text-container slideanim">
            <h1 class="text-center text-color text-header-font"><strong>LARP NEDİR?</strong></h1>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <p class="text-styler text-color text-center text-font">“Gerçek zamanlı rol yapma oyunu” olarak çevirebileceğimiz LARP (Live action role-playing), oyuncuların masa başında rol yapmak yerine karakterlerinin hareketlerini fiziksel olarak canlandırdıkları rol yapma oyunu türüdür. Oyuncuların gerçek dünyada, kurgusal bir senaryo içerisinde karakterlerini canlandırdıkları LARP oyunlarında amaç, oyunculara sunulan belirli hedefleri gerçekleştirmektir. LARP oyunlarında kostüm ve dekor kullanımı oldukça yaygındır.</p>
                <p class="text-styler text-color text-center text-font">Herhangi bir konunun işlenebileceği LARP oyunlarında genel bir senaryo olmasına karşın takip edilmesi gereken belirli adımlar yoktur. Oyunun akışı ve ortaya çıkacak sonuçlar, oyuncuların birbirleri ile kurdukları etkileşimler, kişisel planları ve aksiyonları sonucunda belirlenir. LARP oyunları, oyunların ilerleyişini takip eden <strong>oyun yöneticileri</strong> (GM) tarafından belirlenen sistem kuralları dahilinde ilerlemektedir. LARP oyunlarında odak, dramatik ve sanatsal dışavurumdur. LARP etkinlikleri tek günde bitirebileceği gibi, günler ya da aylar süren uzun soluklu oyunlar da düzenlenebilir. </p>
              </div>
            </div>
          </div>
        </div>
        <div id="thisyear" class="card container content-card">
          <div class="container-fluid text-container slideanim">
            <h1 class="text-center text-color text-header-font"><strong>CONCORDIA SALUS</strong></h1>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <p class="text-styler text-color text-center text-font"><em>Yeni Dünya’nın gözbebeği, Sabbat’ın kalesi Montreal’ hoş geldiniz. Kara Mucizelerin Şehri gerçekten de büyüleyici, n’est-ce pas? Fakat dikkatli olmakta, kendinizi şehrin büyüsüne fazla kaptırmamanızda fayda var zira gölgeler bir kez kokunuzu aldığında, ister İngilizce çığlık atın ister Fransızca, size yardım edecek tek bir ruh dahi bulamazsınız.</em></p>
                <p class="text-styler text-color text-center text-font"><em>Ne var ki Montreal’in karanlık ve güzel çehresini, sonu gelmek bilmeyen dertler lekeliyor. Adeta şehrin toprağına işlemiş lanetle bir kedi-fare oyununa girmiş Montreal ölümsüzlerinin çığ gibi büyüyen sorunlarına bir yenisi ve belki de bu geceye kadar karşılaştıkları en büyüklerinden biri eklendi: Şehrin Başpiskopos’u Carolina Valez, ardında hiçbir iz bırakmadan ortadan kayboldu.
                İşte bu yüzden, Montreal Sabbat’ının önde gelen isimleri 21 Nisan 1998 akşamında, şehrin en “popüler” mekânlarından biri olan The Heart’da bir araya geliyor. İçine hapsoldukları vahşi sarmaldan çıkmanın, geceye bir kez daha kimin avcı kimin av, kimin efendi kimin köle olduğunu kanıtlama zamanı geldi. Montreal’in geleceği, Yeni Dünya’nın kaderi, bu gece The Heart’da bir araya gelmiş her bir vampirin ağzından çıkacak sözcüklere bağlı – Kabil’in Kılıcı bir kez daha kana mı bulanacak yoksa kınında uykusunu sürdürmeye devam mı edecek?</em></p>
                <!--<p class="text-styler text-color text-center text-font"><em>Düş’ün kudretinin arkasına saklanan çıkarlar, inanç maskesi takmış yılanlar, anka kuşunu küllerinden diriltmeyi arzulayanlar şimdi her zamankinden daha temkinli olmak zorundalar. Zira şüphesiz ki Kapadokya rüzgarlarına karışan her fısıltı, gecenin çocuklarının kaderine yön verecek.</em></p>
                <p class="text-styler text-color text-center text-font">Etkinliğimiz; <strong>9 Eylül 2017</strong> tarihinde, Cappadocian klanının evi olan Kapadokya topraklarında yer alan <strong>Açık Saray Örenyeri’nde</strong> gerçekleşecektir. Katılımcılarımız, karanlık çağların güçlü vampirleri için muazzam bir önem taşıyan Kapadokya’nın, karanlık ve gizemli dehlizlerinde eşsiz bir gece geçirme ve <strong>World of Darkness</strong> tarihine yön veren olaylara şahitlik etme şansını yakalayacaklar. Kendinizi, vampir camiasının güç oyunları ve entrikaları içerisinde bulacağınız bu gecede amacınıza ulaşmak için her yolu deneyecek, ölümsüzlerin karanlık politik çekişmeleri içinden muzaffer olarak çıkmak tüm kozlarınızı kullanacaksınız. 10. yüzyıla ait Açık Saray’ın tarihi atmosferi etrafınızı sararken aldığınız her karar, gecenin çocuklarının kaderini değiştirecek.</p>
              --></div>
            </div>
            <!-- Carousel -->
            <!--
              <div id="carousel-container" class="row">
              <div id="event-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#event-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#event-carousel" data-slide-to="1"></li>
                  <li data-target="#event-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="img/open-palace-1.jpg" alt="Açık Saray 1">
                  </div>
                  <div class="item">
                    <img src="img/open-palace-2.jpg" alt="Açık Saray 2">
                  </div>
                  <div class="item">
                    <img src="img/open-palace-3.jpg" alt="Açık Saray 3">
                  </div>
                </div>
                <a class="left carousel-control" href="#event-carousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#event-carousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
              </div>

            </div>
            -->
            <div id="button-container" class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#registerModal">Kayıt Formuna Ulaşmak İçin</button>
              </div>
            </div>
          </div>
        </div>
        <div id="contact" class="card container content-card">
          <div class="container-fluid slideanim">
          <h1 class="text-center text-color text-header-font"><strong>İLETİŞİM</strong></h1><br><br>
            <form action="index.php" method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                  <input name="contactName" type="text" class="form-control" id="contactName" placeholder="İsim Soyisim">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                  <input name="contactEmail" type="text" class="form-control" id="contactEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-align-justify"></span>
                  <input name="contactSubject" type="text" class="form-control" id="contactSubject" placeholder="Konu">
                </div>
              </div>
              <div class="form-group">
                <textarea id="content" class="form-control vresize" rows="8" name="contactContent" placeholder="Ne hakkında iletişim kurmak istemiştiniz?"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="Contact" class="btn btn-default btn-lg btn-block">Gönder</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Announcement Card WIP -->
        <!--<div id="announcement" class="card container content-card">
          <div class="container-fluid slideanim">
            <h1 class="text-center text-color text-header-font"><strong>DUYURULAR</strong></h1><br><br>
            <div class="">

            </div>
          </div>
        </div>-->
      </div>
    </div>
    <!-- Register Modal -->
    <div id="registerModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <!--<p class="register-styler text-color text-font">Etkinliğimize katılım ücreti 175 TL’dir. Bu ücrete konaklama, otel ve etkinlik alanına ulaşım dahildir.  Ödeme, bilgileri katılımcılarımıza iletilecek hesaba yapılacaktır. Elden ödeme kabul edilmeyecektir.</p>-->
            <p class="register-styler text-color text-font">Etkinliğimizin kontenjanı 25 kişi ile sınırlıdır.</p>
            <!--<p class="register-styler text-color text-font">Etkinliğimizde +18 yaş sınırı bulunmaktadır.</p>-->
            <p class="register-styler text-color text-font">Etkinliğimize temsili de olsa kostüm ile katılım <strong>zorunludur</strong>.</p>
            <!--<p class="register-styler text-color text-font">Kayıt süreci <strong>23 Nisan 2018</strong> tarihine kadar devam edecektir.</p>-->
            <br><br>
            <form id="eventRegister" action="index.php" method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                  <input name="registerName" type="text" class="form-control" id="registerName" placeholder="İsim Soyisim">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                  <input name="registerMail" type="text" class="form-control" id="registerMail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-phone"></span>
                  <input name="registerPhone" type="text" class="form-control" id="registerPhone" placeholder="Telefon">
                </div>
              </div>
              <div class="form-group text-color register-styler">
                  <span>Cinsiyetinizi seçiniz:&nbsp;&nbsp;</span>
                  <label class="radio-inline">
                    <input type="radio" name="sex" id="sexMale" value="male"> <span class="glyphicon glyphicon-king"></span> Erkek
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="sex" id="sexFemale" value="female"> <span class="glyphicon glyphicon-queen"></span> Kadın
                  </label>
              </div>
              <div class="form-group">
                  <p class="register-styler text-color text-font"><strong>Yukarıda belirtilen iletişim kanalları dışında bir tercihiniz varsa lütfen giriniz</strong></p>
                  <input name="registerOtherContact" type="text" class="form-control" id="registerOtherContact">
              </div>
              <div id="form-male" class="form-group togglehid hidden">
                <p class="register-styler text-color text-font"><strong>Lütfen ilk 5 klan tercihinizi belirtiniz</strong></p>
                <select id="optionOneM" name="optionOneM" class="form-control">
                  <option>Assamite antitribu</option>
                  <option>Brujah antitribu</option>
                  <option>City Gangrel</option>
                  <option>Country Gangrel</option>
                  <option>Lasombra</option>
                  <option>Malkavian antitribu</option>
                  <option>Nosferatu antitribu</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                </select><br>
                <select id="optionTwoM" name="optionTwoM" class="form-control">
                  <option>Assamite antitribu</option>
                  <option>Brujah antitribu</option>
                  <option>City Gangrel</option>
                  <option>Country Gangrel</option>
                  <option>Lasombra</option>
                  <option>Malkavian antitribu</option>
                  <option>Nosferatu antitribu</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                </select><br>
                <select id="optionThreeM" name="optionThreeM" class="form-control">
                  <option>Assamite antitribu</option>
                  <option>Brujah antitribu</option>
                  <option>City Gangrel</option>
                  <option>Country Gangrel</option>
                  <option>Lasombra</option>
                  <option>Malkavian antitribu</option>
                  <option>Nosferatu antitribu</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                </select><br>
                <select id="optionFourM" name="optionFourM" class="form-control">
                  <option>Assamite antitribu</option>
                  <option>Brujah antitribu</option>
                  <option>City Gangrel</option>
                  <option>Country Gangrel</option>
                  <option>Lasombra</option>
                  <option>Malkavian antitribu</option>
                  <option>Nosferatu antitribu</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                </select><br>
                <select id="optionFiveM" name="optionFiveM" class="form-control">
                  <option>Assamite antitribu</option>
                  <option>Brujah antitribu</option>
                  <option>City Gangrel</option>
                  <option>Country Gangrel</option>
                  <option>Lasombra</option>
                  <option>Malkavian antitribu</option>
                  <option>Nosferatu antitribu</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                </select>
              </div>
              <div id="form-female" class="form-group togglehid hidden">
                <p class="register-styler text-color text-font"><strong>Lütfen ilk 5 klan tercihinizi belirtiniz</strong></p>
                <select id="optionOneF" name="optionOneF" class="form-control">
                  <option>Brujah antitribu</option>
                  <option>Country Gangrel</option>
                  <option>Gargoyle</option>
                  <option>Kiasyd</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                  <option>Ventrue antitribu</option>
                </select><br>
                <select id="optionTwoF" name="optionTwoF" class="form-control">
                  <option>Brujah antitribu</option>
                  <option>Country Gangrel</option>
                  <option>Gargoyle</option>
                  <option>Kiasyd</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                  <option>Ventrue antitribu</option>
                </select><br>
                <select id="optionThreeF" name="optionThreeF" class="form-control">
                  <option>Brujah antitribu</option>
                  <option>Country Gangrel</option>
                  <option>Gargoyle</option>
                  <option>Kiasyd</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                  <option>Ventrue antitribu</option>
                </select><br>
                <select id="optionFourF" name="optionFourF" class="form-control">
                  <option>Brujah antitribu</option>
                  <option>Country Gangrel</option>
                  <option>Gargoyle</option>
                  <option>Kiasyd</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                  <option>Ventrue antitribu</option>
                </select><br>
                <select id="optionFiveF" name="optionFiveF" class="form-control">
                  <option>Brujah antitribu</option>
                  <option>Country Gangrel</option>
                  <option>Gargoyle</option>
                  <option>Kiasyd</option>
                  <option>Pander</option>
                  <option>Ravnos antitribu</option>
                  <option>Serpents of the Light</option>
                  <option>Toreador antitribu</option>
                  <option>Tremere antitribu</option>
                  <option>Tzimisce</option>
                  <option>Ventrue antitribu</option>
                </select>
              </div>
              <br>
              <button type="submit" name="RegEvent" class="btn btn-default btn-lg btn-block">Kayıt Ol</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Before Page Image -->
    <div id="preImage" class="container-fluid"></div>
  </body>
</html>
