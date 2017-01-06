var app=require('express')();
var http=require('http').Server(app);
var io=require('socket.io')(http);

app.get('/', function (request, response) {
    response.sendFile(__dirname+'/index.html');
});

io.on('connection', function (socket) {
    //接收chat.message频道传过来的信息
    socket.on('chat.message', function (message) {
        //将接收到的信息广播到所有连接到该频道的用户
        io.emit('chat.message',message);
    });
});

http.listen(3000, function () {
    console.log('Server started');
});