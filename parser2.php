<html lang="en">
<head>
  <meta charset="utf-8">
  <title>STDOI - Files to DB Table</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="js/jquery-2.2.2.min.js"></script>
  <script src="js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
  <!--<link rel="stylesheet" href="js/jquery-ui.css">-->
  <link ref="stylesheet" href="css/tables.css">
  <style>
  .draggable { width: 250px; height: 20px; padding: 0.5em; margin: 3px 3px 3px 3px; border: 2px dashed #999; background-color: lightblue; cursor:grab; }
  #droppable { width: 300px; height: 150px; padding: 0.5em; float:right; margin-top: -200px;}
  
.ui-droppable {
    border: 4px solid #2E82B7;
    background-color: #E5E5E5;
  
}

table, th, td {
    border: 2px dashed #777;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}

tr:nth-of-type(even) {
      background-color:#E5E5E5;
    }
    
caption {
   font-size:x-large;
   padding: 0.5em;
   color: #888;
}  
    
#tb-display{
    display: flex;
    justify-content: space-between;
}

    
#btn-dir {
height: 20px;
width: 75px;
background-color:#2286BF;
color: #E5E5E5;
padding: 0.2em;
text-align:center;
cursor: pointer;
border-radius: 5px;
  } 
    
/*#tb-name{
height: 50px;
width: 200px;
background-color:#E5E5E5;

  } */   
  
  </style>
  <script>
  $(function() {
    $( ".draggable" ).draggable();
    $( "#droppable" ).droppable({
      drop: function( event, ui ) {
        $( this )
          .addClass( "ui-state-highlight" )
          .find( "p" )
            .html( "Dropped!" );
      }
    });
  });
  </script>
</head>
<body>
  
<input type="text" id="dir" class="t-box" placeholder="directory path eg. (files/foo/">
<div id="btn-dir">submit</div>  
  
<div id="tb-files"></div>  
 
<div id="droppable" class="ui-droppable">
  <p>Add File(s) Here</p>
</div>

<div id="tb-name"></div>

<div id="tb-display"></div>

<!--<div class="droppable ui-widget-header">
  <p>Drop here One</p>
</div>
 
 <div class="droppable ui-widget-header">
  <p>Drop here Two</p>
</div>-->
 <script>
 //JQUERY SHITE BELOW
//$(document).ready(function() {

//GET ALL FILES FROM DIRECTORY
//var uri_files = 'flat_files2.php';
var uri_files = 'test_files.php';

$("#btn-dir").click(function(){
  
var dir_path = document.getElementById('dir').value;
//var dir_path = 'files';
 
$('#tb-files').text();//REMOVE FILES ON SUBMIT [REFRESH]
 
  //BEGIN AJAX BELOW
$.ajax({
  type: 'POST',
  url: uri_files,
  //data: { un: un, rts:enc, rm: rm, sv:sv, sr:sr, pb:pb },
  data: { dir:dir_path},
  success:function(data){
    
   var obj = $.parseJSON(data);
   
      for (var x = 0; x < obj.length; x++) {
        
        var data_formatted = '<div class="draggable"><span class="file-text">' + obj[x] + '</span></div>';
       
       $('#tb-files').append(data_formatted);
        
        
    }
    
    //LOOP THRU FILE JSON
    /*$.getJSON(uri_files, function(data){
    for (var i = 0, len = data.length; i < len; i++) {
       // console.log(data[i]);
       var data_formatted = '<div class="draggable"><span class="file-text">' + data[i] + '</span></div>';
       
       $('#tb-files').append(data_formatted); 
    }
});*/
   
         }
    });//END AJAX

});//END MOUSEOUT

 
 //$( ".draggable" ).click(function() {
 //$(document).on('click', '.draggable', function () {
 $("#tb-files").on('mouseup', '.draggable', function(){ 
  //alert( "Handler for .click() called." );
  $('#tb-name').hide();
  
  //var tbID = $(this).attr('class').replace('draggable ', '');
  //var x = $(".draggable").text();
  var x = $(this).find("span").text();
  
  $("#tb-name").text(x);
  
  //BEGIN AJAX BELOW 
var uri = 'ajax.php';
var tb = $('#tb-name').text();//PUBLIC FEED
//var enc = base64_encode(a);
  
  
  //BEGIN AJAX BELOW
$.ajax({
  type: 'POST',
  url: uri,
  //data: { un: un, rts:enc, rm: rm, sv:sv, sr:sr, pb:pb },
  data: { tb:tb},
  success:function(data){
    

 //if(inputId != 0){

//DISPLAY CONTAINER AND FADEOUT
//$('#tb-display').hide();
    
    
    //setTimeout(function(){
  $("#tb-display").fadeIn("slow", function () {
  
  //$("#rts-usr-container").hide();
  
  $('#tb-display').append(data);
  
      });
 //}, 3000);
  
		//}
	    }	

  }); //END AJAX FUNK 
  
  
});//END ONCLICK




//});//END DOCUMENT READY
 </script>
</body>
</html>