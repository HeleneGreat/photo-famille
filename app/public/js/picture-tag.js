
let tagForm = document.getElementById('tag-form');
let closing = document.getElementById('close');

closing.addEventListener('click', function(){
    tagForm.classList.add('display-none');
});

/* ********************************** */
// Draw a square when the user click 
// with his mouse on the picture / canvas
/* ********************************** */

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
    let beguinningCoordinates = coordinates();

    canvas.onmouseup = function(e){
        mousedown = false;
        canvas.style.cursor = "default";
        let endCoordinates = coordinates();
        newTagCoordinates(beguinningCoordinates, endCoordinates);
    }
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
    let tagForm = document.getElementById('tag-form');
    tagForm.classList.remove("display-none");
    console.log(x1 +  "||" + y1 +  "||" + Math.sign(x2 - x1) * squareSize +  "||" + Math.sign(y2 - y1) * squareSize);
    
}



/* **************** */
// Mouse position
/* **************** */

let xMousePos = 0;
let yMousePos = 0;
document.onmousemove = function(e){
    xMousePos = e.clientX + window.pageXOffset;
    yMousePos = e.clientY + window.pageYOffset;
}


// Gets cursor position in % relative to top-left of the canvas OK
function coordinates(e){
    let x = xMousePos - canvas.offsetLeft;
    let y = yMousePos - canvas.offsetTop;
    rect = canvas.getBoundingClientRect();
    xPos = x - rect.left;
    yPos = y - rect.top;
    w = canvas.width;
    h = canvas.height;
    let xPercent = Math.round(xPos * 100 / w * 100) / 100;
    let yPercent = Math.round(yPos * 100 / h * 100) / 100;
    console.log(xPercent + " || " + yPercent);
    let coordinates = [xPercent, yPercent];
    return coordinates;
}

/* **************** */
// Set a new tag
/* **************** */
function newTagCoordinates(beguinningCoordinates, endCoordinates){
    let tagCoordinates = [
        beguinningCoordinates[0],
        beguinningCoordinates[1],
        endCoordinates[0],
        endCoordinates[1],
        endCoordinates[0] - beguinningCoordinates[0],
        endCoordinates[1] - beguinningCoordinates[1]
        ]
        
    document.getElementById('xPercent').value = beguinningCoordinates[0];
    document.getElementById('yPercent').value = beguinningCoordinates[1];
    document.getElementById('widthPercent').value = endCoordinates[0] - beguinningCoordinates[0];
    document.getElementById('heightPercent').value = endCoordinates[1] - beguinningCoordinates[1];
}