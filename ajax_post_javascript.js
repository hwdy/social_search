/* V.1.0.0 MODIFIED 070712 */
//BEGIN AJAX REQUEST BELOW
function getXmlHttpRequestObject() { if (window.XMLHttpRequest) { return new XMLHttpRequest();} else if(window.ActiveXObject) { return new ActiveXObject("Microsoft.XMLHTTP");} else {}}

//SCOUR URL DISPLAY
var twt0 = getXmlHttpRequestObject();

function yooDsp(eq) {
if(twt0.readyState == 4 || twt0.readyState == 0) {
    
var e = escape(document.getElementById('e').value);
//var url = escape(document.getElementById('sn').value);
//var key = escape(document.getElementById('key').value);
var rs = escape(document.getElementById('rs').value);
var pg = escape(document.getElementById('pg').value);
var sr = escape(document.getElementById('sr').value);//SEARCH SOURCE
var vw = escape(document.getElementById('vw').value);//DISPLAY WHAT RESULTS

document.title = document.getElementById('e').value + ' - Hwdy.';//ADD QUERY TO TITLE

var parameters="e="+e + "&rs="+rs + "&pg="+pg + "&sr="+sr;
<<<<<<< HEAD
<<<<<<< HEAD
twt0.open("POST", 'foo.php', true);
=======
twt0.open("POST", foo.php', true);
>>>>>>> ba6a734b48817a30db500d9c696d025252b8d6c4
=======
twt0.open("POST", foo.php', true);
>>>>>>> ba6a734b48817a30db500d9c696d025252b8d6c4
twt0.onreadystatechange = handleGetDsp; twt0.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
twt0.send(parameters);
//setTimeout("scourDsp()", 1000);
}}

//DISPLAY RESULTS OR APPEND RESULTS...
function handleGetDsp() {
if(twt0.readyState == 4) {
    
var pg = escape(document.getElementById('pg').value);    
 
var gg = parseFloat(pg);    
if(gg == 0){
document.getElementById("rts").innerHTML=twt0.responseText;
//document.getElementsByClassName("rts").innerHTML=twt0.responseText;    
} else {
   
//document.getElementById("rts").classList.remove("pg-bt-rm");
var lns = '<div class="rts-ln">-------------------</div>' + twt0.responseText;//APPEND DASHED LINE AFTER RESULTS

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
    
    }// 
}}