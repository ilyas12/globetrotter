<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script>
// initialize client with app credentials
SC.initialize({
  client_id: '89e7642d86f9241b0d1917ebfae99e38',
  redirect_uri: ''
});

// initiate auth popup
SC.connect(function() {
  SC.get('/me', function(me) { 
    alert('Hello, ' + me.username); 
  });
});
</script>
</head>

<body>
</body>
</html>