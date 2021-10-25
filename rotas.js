const express = require('express');
const app = express();
app.get('/', function (req, res) {
    res.sendFile(__dirname + '/index.html');
});
app.get('/sobre', function (req, res) {
    res.send('sobre pag');
});
app.get('/blog', function (req, res) {
    res.send('blog pag');
});
app.get('/dir/:nome', function (req, res) {
    res.send(req.params);
});


app.listen(8081),
    function () {
        console.log('Servidor Rodando na url http://localhost:8081');
    };
