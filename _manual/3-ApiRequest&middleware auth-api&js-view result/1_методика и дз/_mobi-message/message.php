<!DOCTYPE html>
<html>
<head>
<title>Message Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="jQuery-2.2.0.min.js"></script>
<script src="mine.js"></script>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8 col-xs-12">
			<h2>Message Form</h2>
			<form method="post" action="./">
			  <div class="container">
			    <label for="title"><b>Title</b></label>
			    <input type="text" placeholder="Enter Title" name="title" required>
			    <label for="message"><b>Message</b></label>
			    <input type="text" placeholder="Enter Message" name="message" required>
			    <span class="red"><?php if(isset($result_api) && $result_api) echo $result_api; else echo '&nbsp;'; ?></span>
			    <button type="button" class="button_message" name="hook" value="Message">Send Message</button>
			  </div>
			</form>
        </div>
    </div>
</div>

</body>
</html>
