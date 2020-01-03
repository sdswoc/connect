<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        echo "Server Started!";
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
            $db = mysqli_connect("localhost", "root", "abiit@2019", "rconnect");

            // Check connection
            if (!$db) {
                die("Connection failed: \n" . mysqli_connect_error());
            }
            if($db){
                echo "Connected successfully! \n";
            }


        $data = json_decode($msg, true);
        $from_id = $data['from_userID'];
echo $from_id;
       $get_from_details = "SELECT username FROM userData where userID = $from_id";
       $det = mysqli_query($db, $get_from_details);
       if($det){
           echo "Data Retrieved!";
           $row = $det->fetch_assoc();
           $data['to_userID'] = $data['to_userID'];
           $data['from_userID'] = $data['from_userID'];
            $data['from_username'] = $row['username'];
            $data['msg'] = $data['msg'];
            $date=date_create($row['notif_time']);

            $data['dt'] = date_format($date,"d/m/y h:i a");
       }

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send(json_encode($data));
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}