function ChatWidget(pusher) {
    var self = this;

    this.pusher = pusher;
    this.channelName = 'chat';

    this.chatContainer = $('.chat-widget');
    this.messageContainer = $('.chat-messages');
    this.chatEntry = $('.chat-entry');
    this.chatName = $('.chat-name');

    this.channel = this.pusher.subscribe(this.channelName);

    this._populateLatestMessages();

    this.channel.bind('chat_message', function(data) {
        self._displayMessage(data);
    });

    this.chatEntry.on('keydown', function(e) {
        if (!e.shiftKey && e.keyCode === 13) {
            e.preventDefault();

            self._sendMessage({
                name: self.chatName.val(),
                message: self.chatEntry.val()
            });

            self.chatEntry.val('');
        }
    });
};

ChatWidget.prototype._displayMessage = function (message) {
    var nameHtml = $('<span />', {
        text: message.name + ':'
    });

    this.messageContainer.prepend($('<div />', {
        class: 'chat-message',
        text: message.message
    }).prepend(nameHtml));
};

ChatWidget.prototype._populateLatestMessages = function () {
    var self = this;

    $.ajax({
        url: 'chat/latest.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var message = data[i];
                self._displayMessage({
                    name: message.name,
                    message: message.message
                });
            }
        },
        error: function () {
            //
        }
    });
};

ChatWidget.prototype._sendMessage = function (message) {
    $.ajax({
        url: 'chat/store.php',
        type: 'post',
        data: {message: message},
        error: function () {
            //
        }
    });
};

