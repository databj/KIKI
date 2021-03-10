
<meta charset='utf-8' />
<link href='assets/plugins/fullcalendar2/lib/main.css' rel='stylesheet' />
<script src='assets/plugins/fullcalendar2/lib/main.js'></script>
<script src='assets/plugins/fullcalendar2/lib/locales/es.js'></script>

<?php
$user = UserData::getById($_SESSION["user_id"]);

$cliente= ClienteData::getById($user->is_dueno);

$empresa=EmpresaData::getByNit($cliente->nit_ced);
if($empresa==null){
    $empresa=EmpresaData::getByCC($cliente->nit_ced);
}



  ?>              


<?php

$thejson=null;
$events = ProcesoData::getAll();

foreach($events as $event){

  if($event->id_empresa==$empresa->id){

 
  $tempario= TemparioData::getById($event->tipo_trabajo);
	if($event->estado=="FINALIZADO"){
    $thejson[] = array("id"=>$event->id,"title"=>$tempario->descripcion,"url"=>"#","start"=>$event->start_date."T".$event->start_hour,"end"=>$event->end_date."T".$event->end_hour,"className"=>"bg-teal");

  }else{

  
	$thejson[] = array("id"=>$event->id,"title"=>$tempario->descripcion,"url"=>"#","start"=>$event->start_date."T".$event->start_hour,"end"=>$event->end_date."T".$event->end_hour,"className"=>"bg-warning");
  
  }
}
}
?>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
    
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
   
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events:  <?php echo json_encode($thejson); ?>,

      eventClick: function(arg) {
       
        if (confirm('¿ informacion detallada?\n'+arg.event.title+"\nID: "+arg.event.id)) {
          
          window.location='index.php?view=Empresa/Proceso/Like_Proceso2&id='+arg.event.id;
        
        }
      },
    });

    calendar.render();
  });

</script>
<style>

  html, body {
    margin: 0px 0px;
    padding: 0;
   
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar-container {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }

  
#calendar {
  max-width: 2000px;
  margin: 0 auto;
}

  .fc-header-toolbar {
    /*
    the calendar will be butting up against the edges,
    but let's scoot in the header's buttons
    */
    padding-top: 1em;
    padding-left: 1em;
    padding-right: 1em;
  }

</style>
                  <div class="row row-xs clearfix">
                     <div class="col-12">
                        <div class="card mg-t-20 mg-b-20">
                           <div class="card-body">
                              <!--================================-->
                              <!-- calendar Start -->
                              <!--================================-->
                              <div id='calendar'></div>
                              <!--/ calendar End -->
                           </div>
                        </div>
                     </div>
                  </div>

