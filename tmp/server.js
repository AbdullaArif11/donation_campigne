const express = require('express');
const mysql = require('mysql');
const fs = require('fs');
const cors = require('cors');

const app = express();
app.use(cors());

// MySQL connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',  // Your MySQL username
    password: '',  // Your MySQL password
    database: 'web_technology_lab_project'  // Your database name
});

// Connect to MySQL
db.connect(err => {
    if (err) {
        console.error('MySQL connection error:', err);
        return;
    }
    console.log('Connected to MySQL database');
});

// Function to renumber IDs before fetching data
function renumberIds(callback) {
    const setVarQuery = 'SET @row_number = 0;';
    const renumberQuery = `
        UPDATE donation_cards
        SET id = (@row_number := @row_number + 1)
        ORDER BY id;
    `;

    // First, set the variable
    db.query(setVarQuery, (err, result) => {
        if (err) {
            console.error('Error setting row_number variable:', err);
            return callback(err);
        }
        
        // Then run the UPDATE query
        db.query(renumberQuery, (err, result) => {
            if (err) {
                console.error('Error renumbering IDs:', err);
                return callback(err);
            }
            console.log('IDs renumbered successfully.');
            callback(null);
        });
    });
}

// Fetch data from MySQL and convert it to JSON
app.get('/get-data', (req, res) => {
    // First, renumber the IDs
    renumberIds(err => {
        if (err) return res.status(500).send('Error renumbering IDs.');

        // After renumbering, fetch the data
        const query = 'SELECT * FROM donation_cards';
        db.query(query, (err, results) => {
            if (err) throw err;

            const jsonData = JSON.stringify(results);

            // Save the data to a JSON file
            fs.writeFile('data.json', jsonData, 'utf8', (err) => {
                if (err) {
                    console.error('Error writing to file:', err);
                    return res.status(500).send('Error saving data to JSON file.');
                }
                res.send(jsonData);  // Send the JSON response to the client
                console.log('Data saved to donations.json');
            });
        });
    });
});

// Start the server
app.listen(3000, () => {
    console.log('Server running on port 3000');
});
