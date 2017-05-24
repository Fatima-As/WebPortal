   <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"  ></script>  -->
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script> 
    <script>$(document).ready(function (){
        
    $(".nav-tabs").on("click", "a", function(e){
      e.preventDefault();
      $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });

    $('.add-contact').click(function(e) {
        
        e.preventDefault();
        var id = $(".nav-tabs").children().length; //think about it ;)
        $(this).closest('li').before('<li><a href="#contact_'+id+'">New Tab</a><span>x</span></li>');         
        $('.tab-content').append('<div class="tab-pane" id="contact_'+id+'">Contact Form: New Contact '+id+'</div>');
});
});
    </script>
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
#contact_01{
    width:1020px;
  
}
    
</style>
<?php  include('dbinc.php');

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
?>
<body>



    
      <div class="container">
    <ul class="nav nav-tabs">
        <?php $walls = get_walls(); ?>
        <?php foreach($walls as $wall) : ?>
        <li class="active"><a href="#contact_01" data-toggle="tab"><?php echo $wall->name; ?></a><span>x</span></li>
                      <?php endforeach; ?>  
             
        <li><a href="#" class="add-contact" data-toggle="tab">+ Add Contact</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="contact_01">Contact Form: Joe Smith</div>
        <div class="tab-pane" id="contact_02">Contact Form: Molly Lewis</div>
    </div>
</div>
    </body>
</html>
                               
         


                
    <ul class="nav nav-tabs">
        <li class="active" id='1'><a href="#contact_01" data-toggle="tab">wall1</a><span>x</span></li>
        <li><a href="#contact_02" data-toggle="tab">wall2</a><span>x</span> </li>
        <li><a href="#newTab" class="add-contact" data-toggle="tab">+ Add Contact</a></li>
    </ul>
    <div class="tab-content">
      
			

    <ul class="nav nav-tabs">
        <li class="active" id='1'><a href="#contact_01" data-toggle="tab">wall1</a><span>x</span></li>
        <li><a href="#contact_02" data-toggle="tab">wall2</a><span>x</span> </li>
        <li><a href="#newTab" class="add-contact" data-toggle="tab">+ Add Contact</a></li>
    </ul>
                  <div id="canvas" style="  border:1px solid #ddd; background-color:#fafafa; width:800px; position: absolute;height:400px; float:left;">
                             <div class="tab-pane active" id="contact_01">                 
                     <?php $screens = get_screens(); ?>
                      
                     <?php foreach($screens as $screen) : 
           
                          if($screen->wallid=='1'){?>
                            <div class="screen" name="screens" id="screen<?php echo $screen->id;?>" style=" margin:0px; padding:0px; position: absolute; top:<?php echo $screen->Y ?>px; left:<?php echo $screen->X ?>px; border:1px solid #ddd; background-color:#fafaaa; width: <?php echo $screen->width * 2; ?>px; height: <?php echo $screen->height * 1.5; ?>px; ">
                            <?php echo $screen->name; ?><br />
            
                            <i class="fa fa-rotate-right rotate" data="#screen<?php echo $screen->id; ?>" style="cursor:pointer" onclick='javascript: rotate_screen("#screen<?php echo $screen->id; ?>");'></i>
                            </div><!--./screen-->
          
                     <?php } endforeach; ?>  
                              <div id="composer">                

                  </div><!--canvas-->