function avrooms() 
{


 var exam_id =document.getElementById('exam_id').value;
 var class_id =document.getElementById('class_id').value;
 var receiver =document.getElementById('receiver').value;

 if (exam_id!="" || class_id!="" || receiver!="" ) 
 	{
 		if (window.XMLHttpRequest) 
{
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } 
  else 
  {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() 
  {
    if (this.readyState==4 && this.status==200) 
    {

alert(this.responseText);
 

    }
  }
 
   xmlhttp.open("GET", "sendmess.php?exam_id="+exam_id+"&class_id="+class_id+"&receiver="+receiver, true);
   xmlhttp.send(); 

 	}
 	else
 	{
 		alert("PLEASE FILL ALL REQUIRED FIELDS");
 	}




}