var greet=[ 
	"You look \nAwesome !" , 
	"This one's a \nKiller !" ,
	"That's an\nAmazing picture !",
	"You are looking \nGreat !"

]
console.log(greet);
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
function displayMessage() {
	var i=getRandomInt(0,greet.length-1);
	var greeting=greet[i];
	console.log(greet);
	document.getElementById('greeting').innerHTML=greeting;
	document.getElementById('supplement').innerHTML="Share your new IPL_fie and make everyone envious";
}