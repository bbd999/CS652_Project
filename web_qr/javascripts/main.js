$(document).ready(function() {
  $('#reader').html5_qrcode(function(code) {
      $('#read').html(code);
      console.log(code);
      var tStamp = Date.now();
      var url = 'https://attendancetracker.mybluemix.net/submitid';
      var send = {
        'code': code,
        'id': "0",
	'ts': tStamp
      };
      $.post(url, send);
    },
    function(error) {
      $('#read_error').html(error);
    },
    function(videoError) {
      $('#vid_error').html(videoError);
    }
  );
});
