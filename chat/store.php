<?php  

require_once '../app/bootstrap.php';

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    
    $store = $db->prepare("
        INSERT INTO messages (name, message, created)
        VALUES (:name, :message, NOW())
    ");

    $store->execute([
        'name' => $message['name'],
        'message' => $message['message']
    ]);

    $pusher->trigger('chat', 'chat_message', [
        'name' => $message['name'],
        'message' => $message['message']
    ]);
}

