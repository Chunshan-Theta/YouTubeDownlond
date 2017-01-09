<!doctype html>
<html>
   <head>
   </head>
   <body style="margin:0px;padding:0px;overflow:hidden">
	
   <input id="inputURL" type="text"></input>
   <button onclick="changeSrc()">go</button>輸入youtube網址將可以循環撥放影片
   <a href="https://youtube.com"target="_blank">link to Youtube</a>
   <br>
   <iframe 
	class="embed-responsive-item"
	id="ytplayer" 
	type="text/html" 
	width="640" 
	height="100%" 
	src="https://www.youtube.com/embed/tp0tMGjylNQ?&autoplay=1&loop=1&rel=0&showinfo=0&color=white&iv_load_policy=3&playlist=tp0tMGjylNQ"
	style="position: absolute;width:100%; height: 90%; border: none"
	frameborder="0" allowfullscreen></iframe>
   </body>
   <script type="text/javascript">
	function changeSrc()
	  {
      var inputURL = document.getElementById("inputURL").value;
	  
	  inputURL = inputURL.substring(inputURL.indexOf("v=")+2);
	  
	  //alert(inputURL);
	  document.getElementById("ytplayer").src="https://www.youtube.com/embed/"+inputURL+"?&autoplay=1&loop=1&rel=0&showinfo=0&color=white&iv_load_policy=3&playlist="+inputURL;
	  }
	</script>
</html>
