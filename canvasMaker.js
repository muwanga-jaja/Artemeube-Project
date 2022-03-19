//importing fabric.js file to support fabric methods functionality
document.writeln("<script  type='text/javascript' src='fabric.js'></script>");
//end of imports

var canvas = document.getElementById("canvas"),
    ctx = canvas.getContext("2d");

canvas.width = 700;
canvas.height = 500;

var background = new Image();
background.src = "";
background.onload = function() {
    ctx.drawImage(background, 0, 0);
}

var line, isDown;
var arr = new Array();
var startx = new Array();
var endx = new Array();
var starty = new Array();
var endy = new Array();
var temp = 0;
var graphtype;
trigger = "1";
var text;

var canvas = this.__canvas = new fabric.Canvas('canvas', { hoverCursor: 'pointer', selection: false });
fabric.Object.prototype.transparentCorners = false;

canvas.on('mouse:down', function(o) {
    if (trigger == "1") {
        isDown = true;
        var pointer = canvas.getPointer(o.e);

        var points = [pointer.x, pointer.y, pointer.x, pointer.y];
        startx[temp] = pointer.x;
        starty[temp] = pointer.y;
        line = new fabric.Line(points, {
            strokeWidth: 2,
            stroke: 'red',
            originX: 'center',
            originY: 'center'
        });
        canvas.add(line);
    } else {
        canvas.forEachObject(function(o) {
            o.setCoords();

        });
    }
});

canvas.on('mouse:move', function(o) {
    canvas.remove(text);
    canvas.renderAll();
    if (!isDown) return;
    var pointer = canvas.getPointer(o.e);
    line.set({ x2: pointer.x, y2: pointer.y });

    endx[temp] = pointer.x;
    endy[temp] = pointer.y;



    if (trigger == "1") {
        var px = Calculate.lineLength(startx[temp], starty[temp], endx[temp], endy[temp]).toFixed(2);
        text = new fabric.Text('Length ' + px, { left: endx[temp], top: endy[temp], fontSize: 12 });
        canvas.add(text);
    }

    canvas.renderAll();
});


canvas.on('mouse:up', function(o) {
    var pointer = canvas.getPointer(o.e);
    isDown = false;

});

canvas.on('mouse:over', function(e) {
    e.target.setStroke('blue');
    canvas.renderAll();
});

canvas.on('mouse:out', function(e) {
    e.target.setStroke('red');
    canvas.renderAll();
});

var Calculate = {
    lineLength: function(x1, y1, x2, y2) { //线长    
        //console.log(x1 + ", "+ y1 +", " + x2 + ", " + y2);
        //clearRect(x2, y2);
        return Math.sqrt(Math.pow(x2 * 1 - x1 * 1, 2) + Math.pow(y2 * 1 - y1 * 1, 2));
    }
}