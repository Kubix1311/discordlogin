const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.urlencoded({ extended: true }));

app.post('/send-email', (req, res) => {
    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'kontak.lezi@gmail.com',
            pass: 'Kuba1234@'
        }
    });

    const mailOptions = {
        from: req.body.email,
        to: 'kontak.lezi@gmail.com',
        subject: 'Nowa wiadomość z formularza',
        text: `Imię: ${req.body.name}\nE-mail: ${req.body.email}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return console.log(error);
        }
        res.send('Wiadomość została wysłana!');
    });
});

app.listen(3000, () => {
    console.log('Serwer działa na porcie 3000');
});
