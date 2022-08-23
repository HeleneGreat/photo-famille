let picture = document.getElementById("picture");

let mousedown = false;
let x1;
let y1;
let x2;
let y2;
let canvas = document.getElementById("canvas")
let context = canvas.getContext("2d");
context.canvas.width = picture.clientWidth;
context.canvas.height = picture.clientHeight;

canvas.onmousedown = function(e) {
	canvas.style.cursor = "crosshair";		
    mousedown = true;
    x1 = e.offsetX;
    y1 = e.offsetY;
}
canvas.onmouseup = function(e){
    mousedown = false;
	canvas.style.cursor = "default";
}
canvas.onmousemove = function(e) {
    if (mousedown) {
        x2 = e.offsetX;
        y2 = e.offsetY;
        redraw()
    }
}
function redraw() {
    context.clearRect(0, 0, 800, 600);
    context.beginPath();
	const squareSize = Math.abs(Math.min(x1 - x2, y1 - y2));
	context.rect(
		x1,
		y1,
		Math.sign(x2 - x1) * squareSize,
		Math.sign(y2 - y1) * squareSize
	);
    context.stroke();
}
  