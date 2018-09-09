<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Realtime chat</title>

        <link rel="stylesheet" href="css/chat.css">
    </head>
    <body>
        <div class="chat-widget">
            <div class="chat-messages"></div>
            <input type="text" class="chat-name" placeholder="Your name">
            <textarea class="chat-entry" placeholder="Type a message and hit enter"></textarea>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://js.pusher.com/2.2/pusher.min.js"></script>
        <script src="js/chat.js"></script>
        <script>
            var pusher = new Pusher('2ee52b8cac2c85819859', {
                encrypted: true
            });
            var chat = new ChatWidget(pusher);
        </script>
    </body>
</html>