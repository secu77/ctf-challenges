var express = require('express');
var axios = require('axios');
var router = express.Router();


router.get('/', (req,res) => {
    res.render('./index');
});

router.get('/robots.txt', (req,res) => {
    res.render('./robots');
});

router.get('/work-to-do', (req,res) => {
    res.render('./troll');
});


/** Routes for login. */
router.get('/l', (req,res) => {
    res.render('./login');
});
router.post('/l', (req,res,next) => {
    
    if(req.body.username && req.body.password) {
        next();
    } else {
        return res.redirect('/l');
    }

}, (req,res,next) => {
    if (/[\'\"\\\;\{\}]/.test(req.body.password)) {
        return res.redirect('/');
    } else {
        next();
    }

}, (req,res,next) => {
    if (/d4rkS0ul\d{7}/.test(req.body.password)) {
        next();
    } else {
        return res.redirect('/l');
    }

}, (req,res,next) => {
    if (req.body.password=='d4rkS0ul7777777') {
        next();
    } else {
        return res.redirect('/l');
    }

}, (req,res) => {
    req.session.name = "kira";
    req.session.save();
    res.redirect('/death-note');
});


/** Routes for register. */
router.get('/r', (req,res) => {
    res.render('./register');
});
router.post('/r', (req,res) => {
    res.send('You are not allowed to register. Maybe you want try to login');
});


/** Routes for death-notebook. */
router.get('/death-note', (req,res,next) => {

    if(req.session.name && req.session.name == 'kira') {
        next();
    } else {
        return res.redirect('/');
    }

}, (req,res) => {
    res.render('./note', {
        output : "",
        show : false,
        errs: req.session.errs
    });
});
router.post('/death-note', (req,res,next) => {
    if(req.body.u) {
        next();
    } else {
        req.session.errs = 1;
        return res.redirect('/death-note');
    }
}, (req,res,next) => {

    if (/(^(http|https):\/\/(www\.|)\w+\.(com|es|org))/.test(req.body.u)) {
        next();
    } else {
        req.session.errs = 2;
        return res.redirect('/death-note');
    }

}, (req,res) => {

    try {
        req.session.errs = 0;
        axios.get(req.body.u)
        .then(function(response){
          res.render('./note',{
            output : response.data,
            show : true,
            errs: req.session.errs
          });
        });
    } catch(error) {
        console.error(error);
        res.send('Exception Catched!');
    }
});


module.exports = router;