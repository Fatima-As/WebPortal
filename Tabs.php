<html>
<head>
    <title>
        
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <link href="css/newcss.css" rel="stylesheet" type="text/css"/>
    
</head>
<body><div class="container">
  <h1>Bootstrap Dynamic Tabs</h1>
  <div class="well">
    
    <a href="#" id="btnAdd"><i class="icon-plus-sign-alt"></i> Add Tab</a>
    <br><br>
    <ul class="nav nav-tabs" id="tabs">
        <li class="active"><a href="#tab1">Tab 1</a></li>
    </ul>
    
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">Hello tab #1 content...</div>
    </div>
  </div>
  <a href="http://www.bootply.com/61679">Edit on Bootply</a>..
</div>


</body>
</html>

<script>$('#btnAdd').click(function (e) {
  	var nextTab = $('#tabs li').size()+1;
	
  	// create the tab
  	$('<li><a href="#tab'+nextTab+'" data-toggle="tab">Tab '+nextTab+'</a></li>').appendTo('#tabs');
  	
  	// create the tab content
  	$('<div class="tab-pane" id="tab'+nextTab+'">tab' +nextTab+' content</div>').appendTo('.tab-content');
  	
  	// make the new tab active
  	$('#tabs a:last').tab('show');
});
</script>