const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
app.use(bodyParser.json());

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'sua_senha',
    database: 'seu_banco'
});

db.connect(err => {
    if (err) throw err;
    console.log('Conectado ao banco de dados');
});

// Rota para cadastrar um produto
app.post('/produtos', (req, res) => {
    const produto = req.body;
    const sql = 'INSERT INTO produtos SET ?';
    db.query(sql, produto, (err, result) => {
        if (err) return res.status(500).send(err);
        res.status(201).send({ id: result.insertId, ...produto });
    });
});

// Rota para listar produtos
app.get('/produtos', (req, res) => {
    db.query('SELECT * FROM produtos', (err, results) => {
        if (err) return res.status(500).send(err);
        res.send(results);
    });
});

// Iniciar o servidor
app.listen(3000, () => {
    console.log('Servidor rodando na porta 3000');
});
