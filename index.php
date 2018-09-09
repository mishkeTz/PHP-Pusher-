<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Chat</title>
		<link rel="stylesheet" type="text/css" href="css/chat.css">
	</head>
	<body>
		
		<div class="chat-widget">
			<div class="chat-messages">
				
			</div>

			<input type="text" class="chat-name" placeholder="Your name">
			<textarea class="chat-entry" placeholder="Type a message and hit enter"></textarea>
		</div>

		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>	
		<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
		<script src="js/chat.js"></script>
		<script type="text/javascript">

			
			
			var pusher = new Pusher('2ee52b8cac2c85819859', {
		      	encrypted: true
		    });

			var chat = new ChatWidget(pusher);

		</script>
	</body>
</html>