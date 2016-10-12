var canvas;
var context;
var list = new Array();
var timer;
var mouseX;
var mouseY;

canvas = document.getElementById("canvas");
context = canvas.getContext("2d");
document.addEventListener("mousedown",mouseDown,false);
document.addEventListener("mouseup",mouseUp,false);
document.addEventListener("mousemove",mouseMove,false);
document.addEventListener("touchstart", touchDown, false);
document.addEventListener("touchmove", touchMove, false);
setInterval(update, 10);

function mouseDown(e){
	mouseX = e.pageX;
	mouseY = e.pageY;
	timer = setInterval(loop, 10);
}

function mouseUp(e){
	clearInterval(timer);
}

function mouseMove(e){
	mouseX = e.pageX;
	mouseY = e.pageY;
}

function loop(){
	createObj(mouseX,mouseY);
}

function touchDown(e) {
     createObj(e.touches[0].pageX, e.touches[0].pageY);
}

function touchMove(e) {
 	createObj(e.touches[0].pageX, e.touches[0].pageY);
}

function createObj(x, y){
	var obj = new Object();
	obj.x = x;
	obj.y = y;
	obj.r = Math.ceil(Math.random()*255);
	obj.g = Math.ceil(Math.random()*255);
	obj.b = Math.ceil(Math.random()*255);
	obj.radius = Math.ceil(Math.random()*40);
	obj.vx = 8.0*Math.random()-4.0;
    obj.vy = 8.0*Math.random()-4.0;
    obj.count = 0;
	list.push(obj);	
}

function update(){
	context.clearRect(0,0,canvas.width,canvas.height);
	context.globalCompositeOperation = "lighter";
	for (var i = 0; i < list.length; i++) {
		var obj = list[i];
		obj.x += obj.vx *(0.05*obj.count);
		obj.y += obj.vy *(0.05*obj.count);
		obj.radius -= 0.4;
		obj.count ++;
		if(obj.radius >0) {
			context.save();
			context.beginPath();
			var rgbColor = "rgba("+obj.r+","+obj.g+","+obj.b+",1)";
			context.fillStyle = rgbColor;
			context.globalAlpha  = 0.3;
			context.arc(obj.x,obj.y,obj.radius,0,Math.PI*2,true);
            addShadow(context,5,rgbColor,0,0);
			context.fill();
			context.restore();
		}else{
    		delete obj;
			list.splice(i,1);
			i--;
		}
	}	
}

function addShadow(context, blur, color, offsetX, offsetY ){
	context.shadowBlur = blur;
	context.shadowColor  = color;
	context.shadowOffsetX = offsetX;
	context.shadowOffsetY = offsetY;
}

