const express = require('express');
const session = require('express-session');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();

// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }));

// parse application/json
app.use(bodyParser.json());

app.use(session({
  secret: 'keyboard cat',
  resave: false,
  saveUninitialized: true,
}));

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'users'
});

app.get('/', (req, res) => {
  res.send(`login.html`);
});

app.post("/login", function(req, res){
    var LoginUsername = req.body.username;
    var LoginPassword = req.body.password;
      console.log("success");
     pool.getConnection((err, connection) => {
      if (err) throw err
    
      connection.query("SELECT * FROM users WHERE username = '" + LoginUsername +"'",(err, rows)=>{
       connection.release()
    
       if(!err){
        if(LoginPassword == rows[0].password){
          activeUser.push(LoginUsername);
    
          res.redirect("/homepage");
        }
       }
       else{
        console.log(err)
        res.send('unsuccessful')
       }
      })
    })
    });
    
app.get('/signup', (req, res) => {
    res.send(`signup.html`);
  });

  app.post("/signup", function(req, res){
    var username = req.body.uname;
    var password = req.body.psw;
    var confirmPassword = req.body.cpsw;
   
    if(password == confirmPassword){
     pool.getConnection((err, connection) => {
     if (err) throw err
   
     connection.query("INSERT INTO users (password, username) VALUES ('" + password + "', '" + username + "')" , (err, rows)=>{
    connection.release()
   
      if(!err){
       res.send('user with username:' + username +' has been successfully signed up' )
       res.render("/login")
      }
      else{
       console.log(err)
      }
     })
    })
    }
    else{
      //add an alert box to inform user that does password is error
     console.log("password does not match");
     res.redirect("/signup")
    }
   
   })
  
  

app.get('/home', (req, res) => {
  if (req.session.loggedIn) {
    res.send('Welcome to the homepage!');
  } else {
    res.redirect('/');
  }
});

app.listen(3000, () => {
  console.log('Server started on http://localhost:3000');
});
