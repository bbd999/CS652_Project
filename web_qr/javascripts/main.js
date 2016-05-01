$(document).ready(function() {
  $('#reader').html5_qrcode(function(code) {
      $('#read').html(code);
      console.log(code);
      //var tStamp = Date.now();
      //var url = 'https://attendancetracker.mybluemix.net/attend';
      //page redirect to php processor
      window.location.replace(window.location.href+"?id="+code);
      //var send = {
      //  'code': document.getElementById('devCode').value,
      //  'id': code,
	//'Token': document.getElementById('tokenCode').value
      //};
      //$.post(url, send,function(response){
      //$('#dv').html(response);
    //});

    //return false; 
    },
    function(error) {
      $('#read_error').html(error);
    },
    function(videoError) {
      $('#vid_error').html(videoError);
    }
  );
});
