<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
	header('location: ../../login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php 


if (isset($_SESSION["url_aplicativo"])){
  $unisen_url = $_SESSION["url_aplicativo"];
}


?>
<?php

  $path =  $_SERVER['DOCUMENT_ROOT'];
  $path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
  include_once($path);

?>

<!-- partial:partials/_header.html -->

<?php

  $path =  $_SERVER['DOCUMENT_ROOT'];
  $path .= $unisen_url . 'app/includes/UI/header-calendar.php';
  include_once($path);

?>

<body>
  <div class=" container-scroller">

    <!-- partial:partials/_navbar.html -->
    <?php 
    
      $path =  $_SERVER['DOCUMENT_ROOT'];
      $path .= $unisen_url . 'app/includes/UI/navbar.php';
      include_once($path);

    ?>
   
    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
    
        <!-- partial:partials/_sidebar.html -->
        <?php    

          $path =  $_SERVER['DOCUMENT_ROOT'];
          $path .= $unisen_url . 'app/includes/UI/sidebar.php';
          include_once($path);
                
        ?>
          
          
        <!-- partial -->
        <div class="content-wrapper">
          <h3 class="page-heading mb-4">Calendário</h3>
          <div class="content calendar-content">

           <div id='calendar'></div>
    
          <script src="../../includes/plugins/calendar-19/js/jquery-3.3.1.min.js"></script>
            
          <script src='../../includes/plugins/calendar-19/fullcalendar/packages/core/main.js'></script>
          <script src='../../includes/plugins/calendar-19/fullcalendar/packages/interaction/main.js'></script>
          <script src='../../includes/plugins/calendar-19/fullcalendar/packages/daygrid/main.js'></script>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid' ],
            defaultDate: '2020-02-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
              {
                title: 'All Day Event',
                start: '2020-02-01'
              },
              {
                title: 'Long Event',
                start: '2020-02-07',
                end: '2020-02-10'
              },
              {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-02-09T16:00:00'
              },
              {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-02-16T16:00:00'
              },
              {
                title: 'Conference',
                start: '2020-02-11',
                end: '2020-02-13'
              },
              {
                title: 'Meeting',
                start: '2020-02-12T10:30:00',
                end: '2020-02-12T12:30:00'
              },
              {
                title: 'Lunch',
                start: '2020-02-12T12:00:00'
              },
              {
                title: 'Meeting',
                start: '2020-02-12T14:30:00'
              },
              {
                title: 'Happy Hour',
                start: '2020-02-12T17:30:00'
              },
              {
                title: 'Dinner',
                start: '2020-02-12T20:00:00'
              },
              {
                title: 'Birthday Party',
                start: '2020-02-13T07:00:00'
              },
              {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2020-02-28'
              }
            ]
          });

          calendar.render();
        });

          </script>

          </div>
        </div>
    
     <!-- partial:partials/_footer.html -->
     <?php 
          
          $path =  $_SERVER['DOCUMENT_ROOT'];
          $path .= $unisen_url . 'app/includes/UI/footer.php';
          include_once($path);
      
        ?>   
        <!-- partial -->
      </div>
    </div>

  </div>

  <script src="../../includes/dist/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../includes/dist/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../includes/dist/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../includes/dist/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../../includes/dist/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="../../includes/dist/js/off-canvas.js"></script>
  <script src="../../includes/dist/js/hoverable-collapse.js"></script>
  <script src="../../includes/dist/js/misc.js"></script>
  <script src="../../includes/dist/js/chart.js"></script>
  <script src="../../includes/dist/js/maps.js"></script>
</body>

</html>
