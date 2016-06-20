window.onload=Heart();
var colorNumber = 10;
var color = 10;
var framerate = 50;
var cor = "#fff";
var direction = true;
var cor2 = 50;
var direction2 = true;
function Heart(){
    canvas = document.getElementById("Heart");
    var context = canvas.getContext("2d");
	context.save();
	context.clearRect(0, 0, 400, 400);
	//context.fillRect(0,0, 400, 400);
    canvas.x = 150;
    canvas.y = 150;
    var w = 200, h = 200;
	
	
	var strokeGradient = context.createLinearGradient(170,0, 0, 0);
	if (colorNumber == undefined){colorNumber = 10;}
	color = colorNumber;
	cor = '#' + color + '0000';
	strokeGradient.addColorStop(0, cor);
	cor = '#' + color + '1a8b';
	strokeGradient.addColorStop(1, cor);
    context.strokeStyle = strokeGradient;
    context.strokeWeight = 3;
    context.shadowOffsetX = 4.0;
    context.shadowOffsetY = 4.0;
    context.lineWidth = 10.0;
	var gradient = context.createLinearGradient(0,0, 0, 170);
	if (cor2 == undefined){cor2 = 10;}
	cor = '#' + color + '1a' + cor2;
	gradient.addColorStop(0, 'red');
	cor = '#' + color + '1a8b';
	gradient.addColorStop(1, cor);
    context.fillStyle = gradient;
    var d = Math.min(w, h);
    var k = 10;
    context.moveTo(k, k + d / 4);
    context.quadraticCurveTo(k, k, k + d / 4, k);
    context.quadraticCurveTo(k + d / 2, k, k + d / 2, k + d / 4);
    context.quadraticCurveTo(k + d / 2, k, k + d * 3/4, k);
    context.quadraticCurveTo(k + d, k, k + d, k + d / 4);
    context.quadraticCurveTo(k + d, k + d / 2, k + d * 3/4, k + d * 3/4);
    context.lineTo(k + d / 2, k + d);
    context.lineTo(k + d / 4, k + d * 3/4);
    context.quadraticCurveTo(k, k + d / 2, k, k + d / 4);
	
    context.stroke();
    context.fill();
	
	context.font = "20px Verdana";
	var Textgradient = context.createLinearGradient(0,0,170, 0);
	Textgradient.addColorStop(0, "#00FFFF");
	Textgradient.addColorStop(1, "green");
	context.fillStyle = Textgradient;
	context.fillText("Maise & Vinícius",30, 100);
	context.restore();
	if (direction2 == 'undefined'){direction2 = true;}
	if(colorNumber<99 & direction)
	{
		colorNumber++;
	}else {direction = false;}
	if (colorNumber >10 & !direction)
	{
		colorNumber--;
	}else {direction = true;}
	
	if(cor2<20 & direction2)
	{
		cor2++;
	}else {direction2 = false;}
	if (cor2 >10 & !direction2)
	{
		cor2--;
	}else {direction2 = true;}
	
	
}
setInterval(Heart, framerate)
