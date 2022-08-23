
// let picture = document.getElementById("picture");


// let isDrawing = false;

// let canvas = document.getElementById("canvas");

// let ctx = canvas.getContext("2d");
// // canvas.style.width = picture.clientWidth + "px";
// // canvas.style.height = picture.clientHeight + "px";
// ctx.canvas.width = picture.clientWidth;
// ctx.canvas.height = picture.clientHeight;


// let offsetX = canvas.offsetLeft;
// let offsetY = canvas.offsetTop;

// canvas.addEventListener('mousedown', function (e) {
//     handleMouseDown(e);
// })

// canvas.addEventListener('mouseup', function(e) {
//     handleMouseUp();
// })

// canvas.addEventListener('mousemove', function(e) {
//     handleMouseMove(e);
// });


// let startX = 0;
// let startY = 0;

// function handleMouseUp() {
// 	isDrawing = false;
// 	canvas.style.cursor = "default";	
// }

// function handleMouseMove(e) {
// 	if (isDrawing) {
    
// 		let mouseX = parseInt(e.clientX - offsetX);
// 		let mouseY = parseInt(e.clientY - offsetY);				
		
// 		ctx.clearRect(0, 0, canvas.width, canvas.height);
// 		ctx.beginPath();
// 		ctx.strokeStyle = "purple";
// 		ctx.strokeRect(startX, startY, mouseX - startX, mouseY - startY);
// 		// const squareSize = Math.abs(Math.min(mouseX - startX, mouseY - startY));
// 		// ctx.strokeRect(
// 		// startX,
// 		// startY,
// 		// Math.sign(mouseX - startX) * squareSize,
// 		// Math.sign(mouseY - startY) * squareSize
// 		// );
// 		ctx.stroke();
		
// 	}
// }

// function handleMouseDown(e) {
// 	canvas.style.cursor = "crosshair";		
// 	isDrawing = true;
// 	startX = parseInt(e.clientX - offsetX);
// 	startY = parseInt(e.clientY - offsetY);
// }

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
    // context.rect(x1, y1, (x2 - x1), (y2 - y1));
    context.stroke();
}
  