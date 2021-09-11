jQuery(document).ready(function()
{
	
	"use strict";

	$(".rotate").textrotator({
	  animation: "dissolve", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
	  separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
	  speed: 2000 // How many milliseconds until the next word show.
	});
	
	$('#user-avatar-upload').on("change", function(){
		var avatarfile = $(this)[0].files[0];
		//alert (avatarfile.type);
		var type = avatarfile.type;
		var type1 = type.substring(type.indexOf("/")+1);
		//alert (type1);
		var size = avatarfile.size;
		if(type1!="png" && type1!="jpg" && type1!="jpeg")
		{
			alert('Dateityp wird nicht unterstützt.');
		}
		else if(size>500000)
		{
			alert('Die Dateigröße sollte weniger als 500 KB betragen.');
		}
		else
		{
			var formdata =new FormData();
			formdata.append('avatar',avatarfile);
			var xhr = new XMLHttpRequest();
			xhr.addEventListener("load",avatarloadedhandler,false);
			xhr.open('POST','avatarchange.php');
			xhr.send(formdata);
			
			function avatarloadedhandler(evt)
			{
				//alert(evt.target.responseText);
				$('#avatar-image-id').attr('src',evt.target.responseText);
			}
		}
	});
	
		$('#new-image').on("change", function(){
		var file = $(this)[0].files[0];
		//alert (file.type);
		var type = file.type;
		var type1 = type.substring(type.indexOf("/")+1);
		//alert (type1);
		var size = file.size;
		if(type1!="png" && type1!="jpg" && type1!="jpeg")
		{
			alert('Dateityp wird nicht unterstützt.');
		}
		else if(size>500000)
		{
			alert('Die Dateigröße sollte weniger als 500 KB betragen.');
		}
		else
		{
			var formdata =new FormData();
			formdata.append('file1',file);
			var xhr = new XMLHttpRequest();
			xhr.addEventListener("load",loadedhandler,false);
			xhr.open('POST','fileupload.php');
			xhr.send(formdata);
			
			function loadedhandler(evt)
			{
				
				alert(evt.target.responseText);
			}
		}
	});
	
});