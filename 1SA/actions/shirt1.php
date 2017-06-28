<script>
var i,j;
		   function changeimage(){
		   	var element = document.getElementById('myimage');
		   	
		   }
		   function showAlert(){
			   var form = document.getElementById("form1");
			   var form2 = document.getElementById("form2");			   		   
			   for (var i=0; i<form1.custom.length; i++){
  for (var j=0; j<form2.color.length; j++){
	  if (form2.color[j].checked)

   {

      var color = form2.color[j].value;
	  
      break;

   }
	  
	  }
   if (form1.custom[i].checked)

   {

      var custom = form1.custom[i].value;
	  
	  
      break;

   }   
 }
if(j==0)
 {
	if(i==0){
	 location.href="index.php?action=PositionAndColor";
	 }
	 if(i==1){
	 location.href="index.php?action=PositionAndColor";
	 }
	 if(i==2){
	 location.href="index.php?action=PositionAndColor";
	 }
	 if(i==3){
	 location.href="index.php?action=PositionAndColor";
	 }
	 
	}
	else{
		location.href="index.php";
		}
	
if(confirm("您選擇的客製化為"+custom+", "+color+"，您確定了嗎？"))
	{
		alert("已完成客製化，祝您消費愉快"); 			  
	}
else{location.href="index.php?action=shirt1";}
			  }
		   
</script>
              
              <script src="./MagicZoom _ Example_files/mz-packed.js" type="text/javascript"></script>
<div class="container">
  <div>
    <div>
      <p id="substract" class="item active col-md-6 col-md-offset-0" align="center" style="margin-left:20px;margin-top:10px"> <iframe align="center" name="myIframe" border="1" width="500px" height="600px" src="">
		</iframe>
        </p>
        <form name="form" id="form" method="post" onClick="showAlert();" action="index.php?action=PositionAndColor">
       <label><input type="radio" name="custom" value="1" checked><b style="padding-right:150px;paddind-bottom:200px">位置一：正中橫幅</b></label>
      <label><input type="radio" name="custom" value="2" style="padding-left:100px;paddind-bottom:200px"><b>位置二：右邊直列</b></label>
      <br>
      <br>
       <p id="main-content"> <a target="myIframe" href="http://i.imgur.com/3HiSLQ3.jpg"><img src="http://i.imgur.com/3HiSLQ3.jpg" width="250px" height="250px"></a>  
             <a target="myIframe" href="http://i.imgur.com/fH1bapC.jpg"><img src="http://i.imgur.com/fH1bapC.jpg" width="250px" height="250px" style="margin-left:20px"></a>  
             <br>  
             <br>
             <label><input type="radio" name="custom" value="3"><b style="padding-right:150px;paddind-bottom:200px">位置三：正中直列</b></label>
              <label><input type="radio" name="custom" value="4" style="padding-left:100px;paddind-bottom:200px"><b>位置四：左邊直列</b></label>
             <a target="myIframe" href="http://i.imgur.com/IuIyiyH.jpg"><img src="http://i.imgur.com/IuIyiyH.jpg" width="250px" height="250px" style="margin-right:20px;margin-top:20px"></a>
             <a target="myIframe" href="http://i.imgur.com/VLYBLZr.jpg"><img src="http://i.imgur.com/VLYBLZr.jpg" width="250px" height="250px" style="margin-right:3px;margin-top:20px"></a>                            
     
            </p>
              
              <hr style="color: #9E9E9E; border-style:dashed; border-width:5px">   
              <div class="row">
                                     
              <label><input type="radio" name="color" value="黑勾白底" checked style="margin-left:30px"><b style="margin-right:120px;padding:5px">顏色一：黑勾白底</b></label>
              <label><input type="radio" name="color" value="黑勾黃底"><b style="margin-right:130px;padding:5px">顏色二：黑勾黃底</b></label>
              <label><input type="radio" name="color" value="白勾黑底"><b style="margin-right:130px;padding:5px">顏色三：白勾黑底</b></label>
              <label><input type="radio" name="color" value="白勾紅底"><b style="padding:5px">顏色四：白勾紅底</b></label>
              <br>
              <br>              
              <img src="http://i.imgur.com/WVyfe6u.jpg" width="250px" height="250px" style="margin-right:20px;margin-left:55px;border-radius:8px">
              <img src="http://i.imgur.com/DaG2KN2.jpg" width="250px" height="250px" style="margin-right:20px;border-radius:8px">
              <img src="http://i.imgur.com/FupWi5I.jpg" width="250px" height="250px" style="margin-right:20px;border-radius:8px">
              <img src="http://i.imgur.com/svNMxIW.jpg" width="250px" height="250px" style="margin-right:20px;border-radius:8px">
              
              </div>
                 
             <div style="margin:20px 50px;padding:0px 20px">            
			<p id="footer">
                   <br>    
           
	    
    	<input type="submit" class="btn btn-info" value="客製確認" style="margin-bottom:20px;padding:15px 80px; border-radius:30px;border:0px;;color:white;width:275px" onClick="showAlert();"></form>
		</p>	
        </div>
    </div>
  </div>
</div>
<br>


