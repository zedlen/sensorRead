self.addEventListener('message', function(e) {
//var i = 0;
var data = e.data;
url=data.url;
var a=[]
function timedCount() {
   
    r=httpGet(url);
    console.log(r)
    r=JSON.parse(r)
    //console.log(r)   
    postMessage(r);    
}
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl+"index.php/welcome/getData",true ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
while(true)
{
  timedCount();  
}


})