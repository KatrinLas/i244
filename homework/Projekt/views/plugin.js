var date = new Date();
var n = date.toDateString();
var time = date.toLocaleTimeString();

console.log(n + ' ' + time);

document.getElementById("kuupaev").innerHTML = date;