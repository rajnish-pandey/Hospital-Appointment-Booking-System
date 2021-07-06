const express = require("express");
const bodyParser = require("body-parser");
const request = require("request");
const https = require("https");

const app = express();

app.use(express.static("public"));
app.use(bodyParser.urlencoded({extended: true}));

app.get("/", function(req, res) {
    res.sendFile(__dirname + "/signup.html");
});

app.post("/", function(req,res) {
    const firstname = req.body.fname;
    const lastname = req.body.lname;
    const email = req.body.email;

    const data = {
        members: [
            {
                email_address: email,
                status: "subscribed",
                merge_fields : {
                    FNAME: firstname,
                    LNAME: lastname
                }

            }
        ]
    };

    const jsonData = JSON.stringify(data);

    const url = "https://us6.api.mailchimp.com/3.0/lists/abd25b2cd7";

    const options = {
        method: "post",
        auth: "rajnishp:ef36f7023c436f2b67883ae1270eccf1-us6"
    }

    const request = https.request(url, options, function(response) {

        if (response.statusCode === 200) {
            res.sendFile(__dirname + "/success.html");
        } else {
            res.sendFile(__dirname + "/failure.html");
        }

        response.on("data", function(data) {
            console.log(JSON.parse(data));
        })
    })

    request.write(jsonData);
    request.end();
});

app.post("/failure", function(req, res) {
    res.redirect("/");
});

app.listen(process.env.PORT || 3000, function() {
    console.log("Server is running on port 3000 as well as on heroku's server");
});

// Api Key
// ef36f7023c436f2b67883ae1270eccf1-us6

// list id
// abd25b2cd7
// https://tim-minister-74463.herokuapp.com/
