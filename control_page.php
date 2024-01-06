<!DOCTYPE html>
<html lang="en">
<head>
    <title>Controllers</title>
    <style>
        button{
            cursor: pointer;
            width: 45%;
            height: 200px;
            margin-top: 200px;
            margin-left: 2.5%;
            font-size: 50px;
            border-radius: 10px;
            border: 1px solid grey;
        }
    </style>
</head>
<body>
    <button onclick="sendCommand('prev')">Prev</button>
    <button onclick="sendCommand('next')">Next</button>

    <script>
        const socket = new WebSocket('ws://localhost:8080');

        function sendCommand(command) {
            socket.send(command);
        }
    </script>
</body>
</html>
