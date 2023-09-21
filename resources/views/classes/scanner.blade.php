<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>QR Code Scanner</title>

  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- this function of java Script play Camera -->
    <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
 <!-- Header --> 
  </head>
<body>
<div class="container">
    

<div class="container-fluid header_se">
 <div class="col-md-8">
  <div class="row">
   <div class="col">
    <div id="reader"></div>
   </div>
   <div class="col" style="padding:30px;">
    <h4>SCAN RESULT</h4>
    <div id="result" >Result Here</div>
   </div>
  </div>
 <script type="text/javascript">
     // after success to play camera Webcam Ajax paly to send data to Controller
  function onScanSuccess(data) { 

    document.getElementById('result').innerHTML = '<span class="result">'+'thank you, please wait 2 minutes'+'</span>';
    
    $.ajax({
      type: "POST",
      cache: false,
      url : "{{action('App\Http\Controllers\ListeCodeController@checkUser')}}",
      data: {"_token": "{{ csrf_token() }}",data:data},
      success: function(response) {
          // after success to get Answer from controller if User Registered login user by scanner
          // and page change to Home blade
        if (response){
            document.getElementById('result').innerHTML = '<span class="result">'+'thank you, please wait 5 minutes'+'</span>';
           // html5QrcodeScanner().stop(html5QrcodeScanner.render(onScanSuccess));
           //html5QrcodeScanner.exit(0);
           //this.myStream.getVideoTracks()[0].stop();

          const video = document.querySelector('video');
          const mediaStream = video.srcObject;
          const tracks = mediaStream.getTracks();
          tracks[0].stop();
         // tracks.forEach(track => track.stop());
         
         html5QrcodeScanner.clear(html5QrcodeScanner.render(onScanSuccess));
            }
       else{ //alert(data);
       // $(location).attr('href', '{{url('/index')}}');
        return confirm('There is no user with this qr code'); 
        
       }
      }
    })
  }
    var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);

//  </script>
 </div>
 </div>
</div>
<hr/>
<div class="container">
	 © {{ date('Y') }}.
	 <br/>
</div>

<script type="text/javascript">
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
</script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  #reader {
    background: black;
    width:500px;
  }
  button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
a#reader__dashboard_section_swaplink {
  background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
span a{
  display:none
}

#reader__camera_selection{
  background: blueviolet;
  color: aliceblue;
}
#reader__dashboard_section_csr span{
  color:red
}
</style>
</body>
</html>
