/**
 * 
 */
const express = require('express');
const path = require('path');
const app = express();
const bodyParser = require('body-parser');
const morgan = require('morgan');
const session = require('express-session');
const helmet = require('helmet');
const axios = require('axios')


app.set('port', process.env.PORT || 8888);
app.set('view engine','ejs');
app.set('views', path.join(__dirname, 'views'));


// middlewares.
app.use(morgan('dev'))
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:false}));

app.use(helmet());
app.disable('x-powered-by');


/**
 * Setting Session Data Configuration.
 */
app.use(session({
    secret: 'svnfr57',
    resave: false,
    saveUninitialized: true,
    name: "",
    errs: 0,
    admin: false,
}));

app.use('/', require('./routes'));

app.use(express.static(path.join(__dirname, 'public')));


/**
 * Redirect all 404 to error page.
 */
app.use(function(req, res, next) {
    res.status(404).redirect('/');
});


app.listen(app.get('port'), () =>{
    console.log('Server on port 8888');
})