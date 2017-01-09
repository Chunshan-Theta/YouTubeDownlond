<!doctype html>
<html>
   <head>
   </head>
   <body style="margin:0px;padding:0px;overflow:hidden">
	
   <input id="inputURL" type="text"></input>
   <button onclick="changeSrc()">go</button>輸入youtube網址將可以循環撥放影片
   <a href="https://youtube.com"target="_blank">link to Youtube</a>
   <br>
   <button onclick="download()">download</button>
   <button onclick="Disdownload()">clear link</button>
   <div id="ShowBox"></div>
   <br>
   <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.4.js"></script>
   
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
	  Send();
	  }
	</script>
	<script>
	function Send(){
		var inputURL = document.getElementById("inputURL").value;
		inputURL = inputURL.substring(inputURL.indexOf("v=")+2);
		$.ajax({
			type: "GET",
			url: "http://140.130.36.221/happyY/AJAX._Insert.php?Surl="+inputURL,
			success:'success',
			dataType: 'string'
		});
		
	}

	</script>		
	<script>
	function Disdownload(){
		document.getElementById("ShowBox").innerHTML="";
	}
	function download(){
		var inputURL = document.getElementById("inputURL").value;
		inputURL = inputURL.substring(inputURL.indexOf("v=")+2);
		//document.getElementById("ShowBox").innerText="http://140.130.36.221/happyY/AJAX_SearchData.php?TVideo="+inputURL;
		
		$.ajax({url: "http://140.130.36.221/happyY/AJAX_SearchData.php?TVideo="+inputURL, 
					success: function(result){
						
						if(result=="not Found"){
							alert("not Found");
						}
						else if(result.toString()=="-1"){
							document.getElementById("ShowBox").innerHTML="請稍後重新點擊'Download'<br>";
							document.getElementById("ShowBox").innerHTML+="每部影片需約20秒處理，人數眾多時請耐心等候<br>因為是依序處理!<br>";
							document.getElementById("ShowBox").innerHTML+="同時請確定網址輸入正確，並曾經按過 'go' 按鈕送出資料過<br>(要送出過系統才會去分析下再連結，若依然無法使用，請再次點go按鈕)";
						}
						else{
							var contact = JSON.parse(result);
							document.getElementById("ShowBox").innerHTML="";							
							document.getElementById("ShowBox").innerHTML+="不一定每個連結都能使用，請多嘗試<br>";
							document.getElementById("ShowBox").innerHTML+="P.S DASH是串流檔案,並不是一般使用的mp4 ";
							for(i=0;i<contact.length;i++){
							       document.getElementById("ShowBox").innerHTML+=" <br> ";
							       document.getElementById("ShowBox").innerHTML+="<a href="+contact[i]["url"]+" download>"+contact[i]["info"]+"</a>";
						
							}
						}
					},
					error:function(xhr, ajaxOptions, thrownError){ 
							alert(xhr.status); 
							alert(thrownError);  
							$("#ShowBox").html(xhr.status+","+thrownError);
					}
				
				});
		
		
	}

	</script>
</html>