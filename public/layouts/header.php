<?php 
// $categories = array('programming', 'development', 'hardware' ); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>eTutor</title>
  
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONT AWESOME CSS -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  <!-- FLEXSLIDER CSS -->
  <link href="assets/css/flexslider.css" rel="stylesheet" />
  <!-- CUSTOM STYLE CSS -->
  <link href="assets/css/style.css" rel="stylesheet" />    
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />    
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet"> 
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

  <!--  Jquery Core Script -->
  <script src="assets/js/jquery-1.10.2.js" async></script>
  <!--  Core Bootstrap Script -->
  <script src="assets/js/bootstrap.js" async></script>
  <!--  Flexslider Scripts --> 
  <script src="assets/js/jquery.flexslider.js" async></script>
  <!--  Scrolling Reveal Script -->
  <script src="assets/js/scrollReveal.js" async></script>
  <!--  Scroll Scripts --> 
  <script src="assets/js/jquery.easing.min.js" async></script>
  <!--  Custom Scripts --> 
  <script src="assets/js/custom.js" async></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" async></script>
  <script src="js/jquery.js" async></script>
  <script src="js/jquery-ui-1.10.4.min.js" async></script>
  <script src="js/jquery-1.8.3.min.js" async></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js" async></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js" async></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js" async></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript" async></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js" async></script>
  <script src="js/jquery.sparkline.js" type="text/javascript" async></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" async></script>
  <script src="js/owl.carousel.js" async ></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js" async></script> <!-- Full Google Calendar - Calendar -->
  <script src="assets/fullcalendar/fullcalendar/fullcalendar.js" async></script>
  <!--script for this page only-->
  <script src="js/calendar-custom.js" async></script>
  <script src="js/jquery.rateit.min.js" async></script>
    <!-- custom select -->
  <script src="js/jquery.customSelect.min.js" async ></script>
  <script src="assets/chart-master/Chart.js" async></script>
   
    <!--custome script for all page-->
  <script src="js/scripts.js" async></script>
    <!-- custom script for this page-->
  <script src="js/sparkline-chart.js" async></script>
  <script src="js/easy-pie-chart.js" async></script>
  <script src="js/jquery-jvectormap-1.2.2.min.js" async></script>
  <script src="js/jquery-jvectormap-world-mill-en.js" async></script>
  <script src="js/xcharts.min.js" async></script>
  <script src="js/jquery.autosize.min.js" async></script>
  <script src="js/jquery.placeholder.min.js" async></script>
  <script src="js/gdp-data.js" async></script>  
  <script src="js/morris.min.js" async></script>
  <script src="js/sparklines.js" async></script>  
  <script src="js/charts.js" async></script>
  <script async>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      $(function(){
    $('#map').vectorMap({
      map: 'world_mill_en',
      series: {
        regions: [{
          values: gdpData,
          scale: ['#000', '#000'],
          normalizeFunction: 'polynomial'
        }]
      },
    backgroundColor: '#eef3f7',
      onLabelShow: function(e, el, code){
        el.html(el.html()+' (GDP - '+gdpData[code]+')');
      }
    });
      });
  </script>

  </head>
  <body>
<!--     <div id="header">
      <h1>eTutor</h1>
    </div> -->
<!--     <div id="main"> -->
  <section id="container" class="">
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">e<span class="lite">Tutor</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <!-- <img alt="" src="img/avatar1_small.jpg" style="width:40px; height:40px;"> -->
                            </span>
                            <span class="username"> More </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="index.php"><i class="icon_search"></i> Search courses</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->
  </section>
