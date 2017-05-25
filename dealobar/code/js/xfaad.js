function addreview(){
	var name=document.forms['reviews']['name'];

	var rev=document.forms['reviews']['review'];
	var params="name="+name+"&reviews="+rev;
	var reviewnav; 
		try{
		 reviewnav = new XMLHttpRequest();
		}catch (e){
		 
		 try{
		 reviewnav = new ActiveXObject("Msxml2.XMLHTTP");
		 }catch (e) {
		 try{
		 reviewnav = new ActiveXObject("Microsoft.XMLHTTP");
		 }catch (e){
		 alert("Your browser broke!");
		 return;
		 }
		 }
		reviewnav.onreadystatechange = function(){
		 if(reviewnav.readyState == 4){
			document.getElementById('products').innerHTML="<h1>Your Review Has benn added</h1>"+reviewnav.responseText; 
		 }
		}
		reviewnav.open("GET", "productsfetchajax?content="+1 , true);
		reviewnav.send(params); 
		



		}

}
function paginate(){
	var tabnav; 
		try{
		 tabnav = new XMLHttpRequest();
		}catch (e){
		 
		 try{
		 tabnav = new ActiveXObject("Msxml2.XMLHTTP");
		 }catch (e) {
		 try{
		 tabnav = new ActiveXObject("Microsoft.XMLHTTP");
		 }catch (e){
		 alert("Your browser broke!");
		 return;
		 }
		 }
		}


	tabnav.onreadystatechange = function(){
		 if(tabnav.readyState == 4){
			document.getElementById('products').innerHTML=tabnav.responseText; 
		 }
		}
		tabnav.open("GET", "productsfetchajax?content="+1 , true);
		tabnav.send(null); 
		

}

function paginateback(){
	var tabnav; 
		try{
		 tabnav = new XMLHttpRequest();
		}catch (e){
		 
		 try{
		 tabnav = new ActiveXObject("Msxml2.XMLHTTP");
		 }catch (e) {
		 try{
		 tabnav = new ActiveXObject("Microsoft.XMLHTTP");
		 }catch (e){
		 alert("Your browser broke!");
		 return;
		 }
		 }
		}


	tabnav.onreadystatechange = function(){
		 if(tabnav.readyState == 4){
			document.getElementById('products').innerHTML=tabnav.responseText; 
		 }
		}
		tabnav.open("GET", "productsfetchajax?content="+0 , true);
		tabnav.send(null); 
		

}