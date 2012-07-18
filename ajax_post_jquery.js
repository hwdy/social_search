/* V.1.0.0 MODIFIED 070712 */
//BEGIN JQUERY AJAX REQUEST BELOW
function yooDsp(eq) {

var e = escape($('#e').val());
var rs = escape($('#rs').val());
var pg = escape($('#pg').val());
var sr = escape($('#sr').val());
var vw = escape($('#vw').val());

document.title = $('#e').val() + ' - Hwdy.';//ADD QUERY TO TITLE

var uri = 'foo.php';

//BEGIN AJAX BELOW
$.ajax({
  type: 'POST',
  url: uri,
  data: { e: e, rs: rs, pg:pg, sr:sr},
  success:function(data){
   
var pg = escape($('#pg').val());
var gg = parseFloat(pg);

if(gg == 0){
//document.getElementById("rts").innerHTML=twt0.responseText;
$('#rts').html(data);
   
} else {  
  
  //document.getElementById("rts").classList.remove("pg-bt-rm");
var lns = '<div class="rts-ln">-------------------</div>' + data;//APPEND DASHED LINE AFTER RESULTS

$("#rts").append(lns);//JQUERY APPEND

var dl = '#' + 'ddg-' + pg;//REMOVE REDUNDANT DDG RESULTS     
$(dl).remove();
var tl = '#' + 'rts-tts-' + pg;//REMOVE REDUNDANT TOTAL RTS    
$(tl).remove();

    //GOTO BOTTOM 
    setTimeout(function() {
        var $div = $('#rts');
        $('html, body').scrollTop($div.height());
        //$('#rts').fadeIn('slow');
    },100);
  
    }
  
}
});

}//END FUNK