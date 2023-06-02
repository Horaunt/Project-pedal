const http = require('http');
const mysql = require('mysql');

// Create a MySQL connection
const connection = mysql.createConnection({
  host: 'localhost', // Replace with your MySQL server host
  user: 'root', // Replace with your MySQL user
  password: 'password', // Replace with your MySQL password
  database: 'cycle_rental_service' // Replace with your MySQL database name
});

// Connect to the MySQL server
connection.connect((err) => {
  if (err) {
    console.error('Error connecting to the database:', err);
    return;
  }
  console.log('Connected to the database');
});

// Create the HTTP server
const server = http.createServer((req, res) => {
  if (req.url === '/cycles' && req.method === 'GET') {
    // Retrieve all cycles from the database
    connection.query('SELECT * FROM cycles', (error, results) => {
      if (error) {
        console.error('Error retrieving cycles:', error);
        res.writeHead(500, { 'Content-Type': 'text/plain' });
        res.end('Internal Server Error');
      } else {
        res.writeHead(200, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify(results));
      }
    });
  } else if (req.url === '/cycles' && req.method === 'POST') {
    // Create a new cycle
    let body = '';
    req.on('data', (chunk) => {
      body += chunk;
    });
    req.on('end', () => {
      const cycle = JSON.parse(body);
      connection.query('INSERT INTO cycles SET ?', cycle, (error, result) => {
        if (error) {
          console.error('Error creating cycle:', error);
          res.writeHead(500, { 'Content-Type': 'text/plain' });
          res.end('Internal Server Error');
        } else {
          res.writeHead(201, { 'Content-Type': 'application/json' });
          res.end(JSON.stringify({ id: result.insertId }));
        }
      });
    });
  } else {
    res.writeHead(404, { 'Content-Type': 'text/plain' });
    res.end('Not Found');
  }
});

// Start the server
const port = 3000; // Replace with your desired port number
server.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
