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
            }, "Ayn?? klan birden fazla kere se??ilemez.");
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
          $alertController = sendEmailRegister($_POST["registerName"],$_POST["registerMail"],$_POST["registerPhone"],$_POST["registerOtherContact"],$_POST["optionOneF"],$_POST["optionTwoF"],$_POST["optionThreeF"],$_POST["optionFourF"],$_POST["optionFiveF"],"Kad??n");
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
              <li><a href="#contact"><strong>??leti??im</strong></a></li>
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
          <strong>Bir s??k??nt?? olu??tu!.</strong>
        </div>
      <?php } ?>
      <?php if($alertController) {?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Ba??ar??l??.</strong>
        </div>
      <?php } } ?>
      <div id="below-image" class="container-fluid">
        <div id="whois" class="card container content-card">
          <div class="container-fluid text-container slideanim">
            <h1 class="text-center text-color text-header-font"><strong>TSC K??MD??R?</strong></h1>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <p class="text-styler text-color text-center text-font"><strong>The Sanguine Council</strong>, METUCON 2016 etkinli??inde d??zenledi??imiz <strong>Red Star Rising</strong>,  adl?? LARP?????n ard??ndan Nisan 2017???de resmi olarak kurulan, k??r amac?? g??tmeyen bir LARP toplulu??udur. Ankara merkezli olan ve geni?? ??apl?? projeler ??zerinde ??al????an <strong>The Sanguine Council</strong>,  olarak etkinliklerimizin merkezinde <strong>World of Darkness</strong>,  evreni yer almaktad??r. </p>
                <p class="text-styler text-color text-center text-font">En b??y??k amac??m??z, World of Darkness evreninde ge??en hikayeleri, masa ba????ndan kald??r??p ger??ek d??nyaya ta????yarak oyuncular??m??za s??r??kleyici oyun deneyimleri sunmak ve ??lkemizde pek ??ok oyuncusu olan World of Darkness evreninin sevenlerini etkinliklerimiz ile bir araya getirmektir. </p>
              </div>
            </div>
          </div>
        </div>
        <!--<div id="events" class="card container content-card">
        </div>-->
        <div id="whatis" class="card container content-card">
          <div class="container-fluid text-container slideanim">
            <h1 class="text-center text-color text-header-font"><strong>LARP NED??R?</strong></h1>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <p class="text-styler text-color text-center text-font">???Ger??ek zamanl?? rol yapma oyunu??? olarak ??evirebilece??imiz LARP (Live action role-playing), oyuncular??n masa ba????nda rol yapmak yerine karakterlerinin hareketlerini fiziksel olarak canland??rd??klar?? rol yapma oyunu t??r??d??r. Oyuncular??n ger??ek d??nyada, kurgusal bir senaryo i??erisinde karakterlerini canland??rd??klar?? LARP oyunlar??nda ama??, oyunculara sunulan belirli hedefleri ger??ekle??tirmektir. LARP oyunlar??nda kost??m ve dekor kullan??m?? olduk??a yayg??nd??r.</p>
                <p class="text-styler text-color text-center text-font">Herhangi bir konunun i??lenebilece??i LARP oyunlar??nda genel bir senaryo olmas??na kar????n takip edilmesi gereken belirli ad??mlar yoktur. Oyunun ak?????? ve ortaya ????kacak sonu??lar, oyuncular??n birbirleri ile kurduklar?? etkile??imler, ki??isel planlar?? ve aksiyonlar?? sonucunda belirlenir. LARP oyunlar??, oyunlar??n ilerleyi??ini takip eden <strong>oyun y??neticileri</strong> (GM) taraf??ndan belirlenen sistem kurallar?? dahilinde ilerlemektedir. LARP oyunlar??nda odak, dramatik ve sanatsal d????avurumdur. LARP etkinlikleri tek g??nde bitirebilece??i gibi, g??nler ya da aylar s??ren uzun soluklu oyunlar da d??zenlenebilir. </p>
              </div>
            </div>
          </div>
        </div>
        <div id="thisyear" class="card container content-card">
          <div class="container-fluid text-container slideanim">
            <h1 class="text-center text-color text-header-font"><strong>CONCORDIA SALUS</strong></h1>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <p class="text-styler text-color text-center text-font"><em>Yeni D??nya???n??n g??zbebe??i, Sabbat?????n kalesi Montreal??? ho?? geldiniz. Kara Mucizelerin ??ehri ger??ekten de b??y??leyici, n???est-ce pas? Fakat dikkatli olmakta, kendinizi ??ehrin b??y??s??ne fazla kapt??rmaman??zda fayda var zira g??lgeler bir kez kokunuzu ald??????nda, ister ??ngilizce ??????l??k at??n ister Frans??zca, size yard??m edecek tek bir ruh dahi bulamazs??n??z.</em></p>
                <p class="text-styler text-color text-center text-font"><em>Ne var ki Montreal???in karanl??k ve g??zel ??ehresini, sonu gelmek bilmeyen dertler lekeliyor. Adeta ??ehrin topra????na i??lemi?? lanetle bir kedi-fare oyununa girmi?? Montreal ??l??ms??zlerinin ?????? gibi b??y??yen sorunlar??na bir yenisi ve belki de bu geceye kadar kar????la??t??klar?? en b??y??klerinden biri eklendi: ??ehrin Ba??piskopos???u Carolina Valez, ard??nda hi??bir iz b??rakmadan ortadan kayboldu.
                ????te bu y??zden, Montreal Sabbat?????n??n ??nde gelen isimleri 21 Nisan 1998 ak??am??nda, ??ehrin en ???pop??ler??? mek??nlar??ndan biri olan The Heart???da bir araya geliyor. ????ine hapsolduklar?? vah??i sarmaldan ????kman??n, geceye bir kez daha kimin avc?? kimin av, kimin efendi kimin k??le oldu??unu kan??tlama zaman?? geldi. Montreal???in gelece??i, Yeni D??nya???n??n kaderi, bu gece The Heart???da bir araya gelmi?? her bir vampirin a??z??ndan ????kacak s??zc??klere ba??l?? ??? Kabil???in K??l??c?? bir kez daha kana m?? bulanacak yoksa k??n??nda uykusunu s??rd??rmeye devam m?? edecek?</em></p>
                <!--<p class="text-styler text-color text-center text-font"><em>D?????????n kudretinin arkas??na saklanan ????karlar, inan?? maskesi takm???? y??lanlar, anka ku??unu k??llerinden diriltmeyi arzulayanlar ??imdi her zamankinden daha temkinli olmak zorundalar. Zira ????phesiz ki Kapadokya r??zgarlar??na kar????an her f??s??lt??, gecenin ??ocuklar??n??n kaderine y??n verecek.</em></p>
                <p class="text-styler text-color text-center text-font">Etkinli??imiz; <strong>9 Eyl??l 2017</strong> tarihinde, Cappadocian klan??n??n evi olan Kapadokya topraklar??nda yer alan <strong>A????k Saray ??renyeri???nde</strong> ger??ekle??ecektir. Kat??l??mc??lar??m??z, karanl??k ??a??lar??n g????l?? vampirleri i??in muazzam bir ??nem ta????yan Kapadokya???n??n, karanl??k ve gizemli dehlizlerinde e??siz bir gece ge??irme ve <strong>World of Darkness</strong> tarihine y??n veren olaylara ??ahitlik etme ??ans??n?? yakalayacaklar. Kendinizi, vampir camias??n??n g???? oyunlar?? ve entrikalar?? i??erisinde bulaca????n??z bu gecede amac??n??za ula??mak i??in her yolu deneyecek, ??l??ms??zlerin karanl??k politik ??eki??meleri i??inden muzaffer olarak ????kmak t??m kozlar??n??z?? kullanacaks??n??z. 10. y??zy??la ait A????k Saray?????n tarihi atmosferi etraf??n??z?? sararken ald??????n??z her karar, gecenin ??ocuklar??n??n kaderini de??i??tirecek.</p>
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
                    <img src="img/open-palace-1.jpg" alt="A????k Saray 1">
                  </div>
                  <div class="item">
                    <img src="img/open-palace-2.jpg" alt="A????k Saray 2">
                  </div>
                  <div class="item">
                    <img src="img/open-palace-3.jpg" alt="A????k Saray 3">
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
                <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#registerModal">Kay??t Formuna Ula??mak ????in</button>
              </div>
            </div>
          </div>
        </div>
        <div id="contact" class="card container content-card">
          <div class="container-fluid slideanim">
          <h1 class="text-center text-color text-header-font"><strong>??LET??????M</strong></h1><br><br>
            <form action="index.php" method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                  <input name="contactName" type="text" class="form-control" id="contactName" placeholder="??sim Soyisim">
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
                <textarea id="content" class="form-control vresize" rows="8" name="contactContent" placeholder="Ne hakk??nda ileti??im kurmak istemi??tiniz?"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="Contact" class="btn btn-default btn-lg btn-block">G??nder</button>
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
            <!--<p class="register-styler text-color text-font">Etkinli??imize kat??l??m ??creti 175 TL???dir. Bu ??crete konaklama, otel ve etkinlik alan??na ula????m dahildir.  ??deme, bilgileri kat??l??mc??lar??m??za iletilecek hesaba yap??lacakt??r. Elden ??deme kabul edilmeyecektir.</p>-->
            <p class="register-styler text-color text-font">Etkinli??imizin kontenjan?? 25 ki??i ile s??n??rl??d??r.</p>
            <!--<p class="register-styler text-color text-font">Etkinli??imizde +18 ya?? s??n??r?? bulunmaktad??r.</p>-->
            <p class="register-styler text-color text-font">Etkinli??imize temsili de olsa kost??m ile kat??l??m <strong>zorunludur</strong>.</p>
            <!--<p class="register-styler text-color text-font">Kay??t s??reci <strong>23 Nisan 2018</strong> tarihine kadar devam edecektir.</p>-->
            <br><br>
            <form id="eventRegister" action="index.php" method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                  <input name="registerName" type="text" class="form-control" id="registerName" placeholder="??sim Soyisim">
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
                  <span>Cinsiyetinizi se??iniz:&nbsp;&nbsp;</span>
                  <label class="radio-inline">
                    <input type="radio" name="sex" id="sexMale" value="male"> <span class="glyphicon glyphicon-king"></span> Erkek
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="sex" id="sexFemale" value="female"> <span class="glyphicon glyphicon-queen"></span> Kad??n
                  </label>
              </div>
              <div class="form-group">
                  <p class="register-styler text-color text-font"><strong>Yukar??da belirtilen ileti??im kanallar?? d??????nda bir tercihiniz varsa l??tfen giriniz</strong></p>
                  <input name="registerOtherContact" type="text" class="form-control" id="registerOtherContact">
              </div>
              <div id="form-male" class="form-group togglehid hidden">
                <p class="register-styler text-color text-font"><strong>L??tfen ilk 5 klan tercihinizi belirtiniz</strong></p>
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
                <p class="register-styler text-color text-font"><strong>L??tfen ilk 5 klan tercihinizi belirtiniz</strong></p>
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
              <button type="submit" name="RegEvent" class="btn btn-default btn-lg btn-block">Kay??t Ol</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Before Page Image -->
    <div id="preImage" class="container-fluid"></div>
  </body>
</html>
