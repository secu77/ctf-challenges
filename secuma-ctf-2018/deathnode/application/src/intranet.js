/**
 * Intranet Nodejs App
 */
const express = require('express');
const path = require('path');
const app = express();
const bodyParser = require('body-parser');
const morgan = require('morgan');
const helmet = require('helmet');


app.set('port', process.env.PORT || 1999);
app.set('view engine','ejs');
app.set('views', path.join(__dirname, 'views'));


// middlewares.
app.use(morgan('dev'))
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:false}));

app.use(helmet());
app.disable('x-powered-by');


app.use(express.static(path.join(__dirname, 'public')));


app.get('/', (req,res) => {
    res.render('./intranet');
});


app.listen(app.get('port'), () =>{
    console.log('Intranet listen on port 1999');
})