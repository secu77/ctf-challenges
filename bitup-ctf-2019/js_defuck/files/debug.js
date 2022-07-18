function _$(key, str) {
	var s = [], j = 0, x, res = '';
	for (var i = 0; i < 256; i++) {
		s[i] = i;
	}
	for (i = 0; i < 256; i++) {
		j = (j + s[i] + key.charCodeAt(i % key.length)) % 256;
		x = s[i];
		s[i] = s[j];
		s[j] = x;
	}
	i = 0;
	j = 0;
	for (var y = 0; y < str.length; y++) {
		i = (i + 1) % 256;
		j = (j + s[i]) % 256;
		x = s[i];
		s[i] = s[j];
		s[j] = x;
		res += String.fromCharCode(str.charCodeAt(y) ^ s[(s[i] + s[j]) % 256]);
	}
	return res;
}

function __$(xXxXx) {
  var __ = [107,110,113,106];
  var _ = [120,120,106,113];
  _ = _.reverse();
  _.map(___ => __.push(___))
  var ____ = __.map(_____ => _____-=5);
  var _____ = String.fromCharCode(...____);
  var ______ = _$(_____,atob("HU01VeDYcrv1uU6e4t5pQq5cjkh2zqGmujsrSOL6RH1PvWmlpCg="));
  //console.log(______);
  ____ = _$(_____,btoa(xXxXx));
  //console.log(____);
  return (______==xXxXx);
}

var flag = prompt('Ingrese la flag: ')

if(__$(flag)) {
  alert('La Flag es correcta!!');
} else {
  alert('OHHHH! La Flag NO es correcta!!');
}