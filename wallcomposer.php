<?php
	//include('session.php');
	//include('init.php');
//if(isset($_GET['wallid'])) {
  //      echo $_GET['wallid'];}
include('dbinc.php');
	$current = 'walls';
	//$page = $_GET['page'];

	include('header.php');
     
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--position
<script type="text/javascript" src="bootstrap/js/jquery.js"></script><!--for confirm.-->
<script type="text/javascript" src="bootstrap/js/bootstrap-tooltip.js"></script><!--for confirm.-->
<script type="text/javascript" src="bootstrap/js/bootstrap-confirmation.js"></script><!--for confirm.-->
<script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script>   
<link rel="stylesheet" id="themeStyles" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/>   
<!--For Add wall Modal--> 
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
  
<!--script>
$(document).ready(function(){
    $("button").click(function(){
        var x = $("#screen1").position();
        alert("Top position: " + x.top + " Left position: " + x.left);
    });
});
</script-->
<?php
	include("menu.php");    
        ?>

  <style>
.device {
	border:1px solid #666;
	background-color:#CCC;
	height:100px;
	margin:3px;
        padding: 0px;
	
}

</style>
      <style>
            @import url('http://getbootstrap.com/2.3.2/assets/css/bootstrap.css');

.container {
    margin-top: 10px;
   float:left;
   width:1090px;
   
}

.nav-tabs > li {
    position:relative;
    
}

.nav-tabs > li > a {
    display:inline-block;
}

.nav-tabs > li > span {
    display:none;
    cursor:pointer;
    position:absolute;
    right: 6px;
    top: 8px;
    color: red;
}


.nav-tabs > li:hover > span {
    display: inline-block;
}

#modalErr{
    color: red;
    display: none;
}
            
        </style> <!-- for Tabs-->


  

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"  ></script> 
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script> 
    <link rel="stylesheet" id="themeStyles" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/>  
              
  <script>
    $(document).ready(function() {       
    $(".nav-tabs").on("click", "a", function(e){
      e.preventDefault();
      $(this).tab('show');
      $('input[id="wid"]').val($(this).attr('href'));
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });

    $('.add-wall').click(function(e) {
       
        e.preventDefault();
         
        var id = $(".nav-tabs").children().length; //think about it ;)
        $(this).closest('li').before('<li><a href="#wall'+id+'">New Tab</a><span>x</span></li>');         
        $('.tab-content').append('<div class="tab-pane" id="wall'+id+'">Contact Form: New Contact '+id+'</div>');
    });
    
    });

    </script>
<script>
//$(document).ready(function(){
//    $("button").click(function(){
//        var scrrenN = document.getElementsByName("screens");
//        //alert(scrrenN[0].id);
//        for (var i=0; i<scrrenN.length; i++){
//        var x = $("#"+scrrenN[i].id).position();
//       // alert(i +" Top position: " + x.top + " Left position: " + x.left);
//    }
//    });
//});
</script>
<?php
	include("menu.php");
        function get_screens(){
		global $dbcon;
		$screens = array();
		$sql = "select * from screens order by name";
		$myrs = mysqli_query($dbcon,$sql);
		while($row = mysqli_fetch_assoc($myrs)){
			$screens[] = (object) $row;
		}
        
		return $screens;
	}
        
          function get_walls(){
		global $dbcon;
		$walls = array();
		$sql = "select * from walls order by id";
		$myrs = mysqli_query($dbcon,$sql);
		while($row = mysqli_fetch_assoc($myrs)){
			$walls[] = (object) $row;
		}
      		return $walls;
	}

?>
    <script>
    function AddWall(){
        var wid = document.getElementById("wallIdtxt").value;
        var wname = document.getElementById("wallNametxt").value;
       if(wid=="" || wname=="")
       {
           document.getElementById("modalErr").style.display = 'block';
       }  
     
    }    
    </script>
<!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static" style="position:fixed; top:0px; left:0px;   height: 2350px; width: 2300px; background: none; " role="dialog">
        <div class="modal-dialog" style="top:200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
          <form name="form02" method="POST" onsubmit="return AddWall()" enctype="multipart/form-data" action="" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adding Wall</h4>
        </div>
        <div class="modal-body">
            <label>Wall Id:     </label><input type="text" name="wallIdtxt" id="wallIdtxt"/><br>
         <label>Wall Name:</label><input type="text" name="wallNametxt" id="wallNametxt"/>
         <br><span id="modalErr">Important Information is missing to Add a New Wall!</span>
        </div>
        <div class="modal-footer">
            
            <button type="submit" id="btn"  name="AddMyWall" class="btn btn-default" onclick="AddWall()">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
          </form>
      </div>
      
    </div>
  </div><!--End of Modal-->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Wall Composer
                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="managers.php"> Video Walls</a></li>
                        <li class="active">Wall Composer</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                <!--Line below the menu div id="toolbar" style="width:100%; height:40px; background:#fafafa; border:1px solid #ddd;  "-->
               
                  <div class="container">
                       <ul class="nav nav-tabs">
                            <?php $walls = get_walls(); ?>
                            <?php foreach($walls as $wall) : ?>
                           <li ><a href="#wall<?php echo $wall->id;?>" data-toggle="tab"><?php echo $wall->name; ?></a><span>x</span></li>
                            <?php endforeach; ?>  
                           <!-- Trigger the modal with a button -->
  
                             <li><a href="#" class="add-wall" data-toggle="tab"><button style="background:none;border:none;"  data-toggle="modal" data-target="#myModal">+ Add Wall</button></a></li>
                       </ul>
                      
  
                            <div class="tab-content">
                                                                                                
                               <?php foreach($walls as $wall) : ?>
                                 
                                
                          <div class="tab-pane" id="wall<?php echo$wall->id; ?>">
                             
                              <div id="canvas<?php echo$wall->id; ?>" style="  border:1px solid #ddd; background-color:#fafafa; width:800px; position: absolute;height:400px; float:left;">
                             
                                      
                     <?php $screens = get_screens(); ?>
                     <?php 
                     $sideTop= 17;
                     $sidLeft = 960;
                     foreach($screens as $screen) : 
                            
                          if($wall->id==$screen->wallid){
                               if($screen->X>800){
                             ?>
                             <div class="screen" name="screens" id="screen<?php echo $screen->wallid.$screen->id;?>" style=" margin:0px; padding:0px; position: absolute; top:<?php echo $sideTop; ?>px; left:<?php echo $sidLeft; ?>px; border:1px solid #ddd; background-color:#fafaaa; width: <?php echo $screen->width /6.5; ?>px; height: <?php echo $screen->height/6.5; ?>px;">
                            <?php echo $screen->name; ?><br />
            
                            <i class="fa fa-rotate-right rotate" data="#screen<?php echo $screen->id; ?>" style="cursor:pointer" onclick='javascript: rotate_screen("#screen<?php echo $screen->id; ?>");'></i>
                            </div><!--./screen-->
                        <?php $sideTop= $sideTop+ $screen->height/6.5 + 10;
                        
                         }else{
                              ?>
                             
                               
                            <div class="screen" name="screens" id="screen<?php echo $screen->wallid.$screen->id;?>"style=" margin:0px; padding:0px; position: absolute; top:<?php echo $screen->Y ?>px; left:<?php echo $screen->X ?>px; border:1px solid #ddd; background-color:#fafaaa; width: <?php echo $screen->width /6.5; ?>px; height: <?php echo $screen->height/6.5; ?>px;">
                            <?php echo $screen->name; ?><br />
            
                            <i class="fa fa-rotate-right rotate" data="#screen<?php echo $screen->id; ?>" style="cursor:pointer" onclick='javascript: rotate_screen("#screen<?php echo $screen->id; ?>");'></i>
                            </div><!--./screen-->
          
                         <?php }
                         
                         }
                     endforeach; ?>  
                                             

    
                                 </div><!--canvas-->    
                                 
                                </div><!--Tab end-->
                             
                             <?php endforeach; ?>      
                        
                        
                            </div><!-- TabContent End-->      
                   <div id="devices" style="margin-left:20px; padding:0px; border:1px solid #ddd; background-color:#fff; width:200px; height:500px; float:right;">
        	
      </div> <!--devices-->         
                  </div><!--Container End-->
      

                                 <div style="clear:both;"></div>
                                 
    
    
                                
    


                    
                    <!--button class="btn btn-primary" style="width:80px; height:32px; margin:3px 0 3px 3px;">Demo Wall</button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button>
                  <button class="btn btn-primary" style="width:32px; height:32px; margin:3px 0 3px 3px;"></button-->
                  

                                </div><!-- /.box-header -->
                                <div class="box-body" style="height:100px;">
                                   <form name="form01" method="POST" enctype="multipart/form-data" >  
                                        <input type="hidden" name="wid" id="wid"> 
                                        <?php $screens = get_screens(); ?>
                                        <?php foreach($screens as $screen) : ?>
                                        <input type="hidden" class="screenid" name="screensid[]" id="s<?php echo $screen->wallid.$screen->id; ?>" value="<?php echo $screen->wallid.$screen->id; ?>"/>
                                        <input type="hidden" class="screenTop" name="screensTop[]" id="screenTop<?php echo $screen->wallid.$screen->id; ?>"/>
                                        <input type="hidden" class="screenLeft" name="screensLeft[]" id="screenLeft<?php echo $screen->wallid.$screen->id; ?>"/>
                                        <?php endforeach; ?> 
                                        
                                     <!--Wall Name:  <input type="text" id="textbox01" name="wallText"><br>   -->
                                     <button value="Save Wall" class="btn btn-primary" name="submit" onclick="sWall()">Save Wall</button>

                                    </form> 
                                    
                                    <!--div class="tab-content"-->
                                        
                                      <!--div id="home" class="tab-pane fade in active">
                                         <div id="canvas" style="border:1px solid #ddd; background-color:#fafafa; width:800px; height:400px; float:left; position: relative;">
                             
                                                      

                                         </div>
                                      </div-->
                                      <!--input type="text"  id="xText" value=""/-->
                                   
                                    <!--/div--> <!--./tabcontent>
                                                
                                  <!-- text input -->
                                    
                                </div><!-- /.box-body -->
                                <div class="box-footer">

                                </div><!--footer -->

                           

                            </div><!-- /.box -->
                            

        
                        </div><!--./col-->
                    </div><!--./Row-->

                </section><!-- /.content -->
             </div><!-- ./wrapper -->
             
            
<!--             <form>
                     Wall Name:  <input type="text" id="textbox1" name="wallText"><br>
                    X-Position: <input type="text" id="textbox2" disabled/><br>
                    Y-Position: <input type="text" id="textbox3" disabled/><br>
             </form>-->
<?php
	include("footer.php");
        
 
?>
  <script>
$(document).ready(function(){
                	$("#devices").sortable();
			$("#canvas").droppable();
			$(".screen").draggable({
				snap: ".screen",
				grid: [2,2],containment:"#canvas" 
			});
                    
			//$("#devices").sortable();
		
		
		});
		
                
                
		$(".rotate").click(function(){
			var w = $(this).parent().width();
			var h = $(this).parent().height();
			$(this).parent().width(h);
			$(this).parent().height(w);
		});
		
    var coordinates = function(element) {
    element = $(element);
    var top = element.position().top;
    var left = element.position().left;

  };
$("#canvas").droppable();

$('.screen').draggable({
    start: function() {
        coordinates('.screen');}, stop: function() {coordinates('.screen');}
  });

function  sWall(){
   
      var scrrenN = document.getElementsByName("screens");//the screens dives 
        //alert(scrrenN[0].id);
 
        for (var i=0; i<scrrenN.length; i++){
           // alert(i);
        var x = $("#"+scrrenN[i].id).position();
        //alert(scrrenN[i].id +" Top position: " + x.top + " Left position: " + x.left);
        //alert(scrrenN[i].id.toString().substring(6));
        
        document.getElementById('screenTop'+scrrenN[i].id.toString().substring(6)).value=" "+x.top;
        document.getElementById('screenLeft'+scrrenN[i].id.toString().substring(6)).value=" "+x.left;
        
        }
        
 


}
		
	
  </script>

  <?php
           if(isset($_POST["AddMyWall"]))
           {
              
               $wid=$_POST["wallIdtxt"];
               $wname=$_POST["wallNametxt"];
               
            $sql="Insert Into walls (id, name, status, width, height, X, Y) values ('$wid','$wname','Active',0,0,0,0)";
             mysqli_query($dbcon,$sql);
                          
             $sql1="Insert Into screens (id, name, width, height, orientation, X, Y, Wallid) values ('1','screen1',935,525, 'H',900,0,'$wid')";
             $sql2="Insert Into screens (id, name, width, height, orientation, X, Y, Wallid) values ('2','screen2',935,525, 'H',900,0,'$wid')";
             $sql3="Insert Into screens (id, name, width, height, orientation, X, Y, Wallid) values ('3','screen3',1110,525, 'H',900,0,'$wid')";
             $sql4="Insert Into screens (id, name, width, height, orientation, X, Y, Wallid) values ('4','screen4',1110,525, 'H',900,0,'$wid')";
             
                        mysqli_query($dbcon,$sql1);
                        mysqli_query($dbcon,$sql2);
                        mysqli_query($dbcon,$sql3);
                        mysqli_query($dbcon,$sql4);
           $url='http://localhost/WebPortal/wallcomposer.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

           }
           
           ?>
<?php 
 
  if(isset($_POST["submit"])){
      
       $ids = $_POST["screensid"];
       $tops = $_POST["screensTop"];
       $lefts = $_POST["screensLeft"];
       $wallid=$_POST['wid'];
       $wallid = str_replace("#wall", "", $wallid);
        
     
       for($i=0; $i<count($ids);$i++){
           $sid = $ids[$i];//
           $stop = $tops[$i];
           $sleft = $lefts[$i];
           //echo'<script> alert("sid'.$sid.'");</script>';
           $swid = substr_replace($sid."", "", -1);
           //echo'<script> alert("swid'.$swid.'");</script>';
           
           $sid = substr($sid."", 1);
           //echo'<script> alert("sid'.$sid.'");</script>';
           //echo'<script> alert("wall'.$swid.'screen'.$sid.'");</script>';
           if( $swid == $wallid){
          //  echo'<script> alert("'.$ids[$i].'");</script>';
           // echo'<script> alert("swid==wllid");</script>';    
            $sql = "UPDATE screens SET X=$sleft,Y=$stop WHERE id=$sid and wallid=$swid";
            mysqli_query($dbcon,$sql); 
           
            
           }
   echo $sql;
         }
         
          $sql = "Select * from screens where wallid=$swid";
          $result = mysqli_query($dbcon,$sql); 
          $row = mysqli_fetch_assoc($result);
         $wx= array();
       $why= array();
       
       foreach ($row as $sc){
           if( $sc['X'] <=800){
               $wx[] = $sc['X'];
               $wx[] = $sc['X']+$sc['width'];
               $wy[] = $sc['y'];
               $wy[] = $sc['y']+$sc['height'];
           }
       }
         
         sort($wx);
         sort($wy);
         
       
         
         $xstart = $wx[0];
         $xend = $wx[sizeof($wx)-1];
         $ystart = $wy[0];
         $yend = $wy[sizeof($wy)-1];
         $wwidth = $xend - $xstart;
         $wheight = $yend - $ystart;
      
         
         $sql = "UPDATE `walls` SET `width`=$wwidth,`height`=$wheight WHERE `id`=$swid";
         mysqli_query($dbcon,$sql); 
         
         $url='http://localhost/WebPortal/wallcomposer.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
         //header("Location: http://localhost/WebPortal/wallcomposer.php");
         //exit();
         
      

}
 ?>
