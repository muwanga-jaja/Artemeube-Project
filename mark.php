<script src="fabric.js"></script>
<script src="jquery.js"></script>
<style>
.center-canvas {
    margin: 150px 200px;

}

.dimemnsions_list {
    margin-top:50px;
    margin-left:-40px;
    float:left;
    height:40px;
    width:1000px;
    padding: 20px;
    display:block;
    margin-bottom: 10px;
}
.dimensions_list>ol>li{
    display:inline-block;
    padding:16px;
    text-align:center;
}

</style>

<body>
    <div class="center-canvas">

        <p id="demo" style="color:white;height:10px;"> Dimensions List
        <button type="button" value="Add Doors" id="add_doors" style="float:right" onclick="addDoors()">Add DOors     </button>
        </p>
        <div id="door_list">

        </div>
        <div id="ulist" class="dimemnsions_list">.</div>
        <canvas id="canvas" width="800" height="400" style="border:1px solid #fff; color:white;"></canvas>

    </div>

</body>

<script>
var line, isDown;
var startx = new Array();
var endx = new Array();
var starty = new Array();
var endy = new Array();
var temp = 0;
var graphtype;
trigger = "1";
var text;
var px;
var dim;
var dimensions= new Array();
var splittedArray= new Array();
var wall_size;
var walls= new Array();
var wall_map= new Map();


var canvas = this.__canvas = new fabric.Canvas('canvas', {
    hoverCursor: 'hand',
    selection: false,
    selectionBorderColor: 'green',
    backgroundColor: null,
    top:-70,
    preserveObjectStacking: true
});
fabric.Object.prototype.transparentCorners = false;
//adding background image to canvas
var Image_url = "images/layout.png";
var canvas_center = canvas.getCenter();
canvas.setBackgroundImage(Image_url, canvas.renderAll.bind(canvas), {
    backgroungImageStretch: false,
    scaleX: 1.2,
    scaleY: 1.2,
    top: canvas_center.top,
    left: canvas_center.left + 90,
    originX: 'center',
    originY: 'center'
});



canvas.on("object:modified", function(e) {
    var activeObject = e.target;
    if (activeObject) {
      // canvas.sendToBack(activeObject);
       console.log("modified-->"+activeObject.text);
       var wall_dimension=activeObject.get('text');
       walls.push(wall_dimension);

       for(var index=1; index<=100; index++){
           var wa="WALL-";
           wa+=index;
            wall_map.set("WALL-",wall_dimension);

       }
    }
});
    //myFunction();
canvas.on("obejct:selected", function(e){
    var object_type= e.target.get('type');
    var object = e.target;

    if(object_type=='wall_size'){
        var len;
        var dimensions_prompt=("Enter Wall Dimensions","000 mm");
        if(dimensions_prompt=null || dimensions_prompt==""){
            len="Wall Dimension not entere";
        }else{
           for(var index=1; index<100; index++){
                len="WALL "+index+": "+dimensions_prompt + "mm";
           }
        }
        console.log("Wall Mappings:-->"+wall_map);
    }
    if(object){
        object.sendToFront();
        console.log("selected");
        alert("enter dimensions..");
    }
});
canvas.on("object:added", function(option){
    var obj_type=option.target.type;
});
canvas.on('mouse:down', function(o) {
    if(o.target)
            return;
    if (trigger == "1") {
        isDown = true;
        var pointer = canvas.getPointer(o.e);

        var points = [pointer.x, pointer.y, pointer.x, pointer.y];
        startx[temp] = pointer.x;
        starty[temp] = pointer.y;
        line = new fabric.Line(points, {
            strokeWidth: 2,
            stroke: 'black',
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
    canvas.remove(wall_size);
    canvas.renderAll();
    if (!isDown) return;
    var pointer = canvas.getPointer(o.e);
    line.set({
        x2: pointer.x,
        y2: pointer.y,
        stroke: 'red'
    });

    endx[temp] = pointer.x;
    endy[temp] = pointer.y;

    if (trigger == "1") {
        px = Calculate.lineLength(startx[temp], starty[temp], endx[temp], endy[temp]).toFixed(2);
        dim = midLine(startx[temp], starty[temp], endx[temp], endy[temp]);
        text = new fabric.Text('Length ' + px + 'mm', {
            left: dim[0],
            top: dim[1]-10,
            fill: '#16fc02',
            fontSize: 30,
            editable:true,
        });
      // canvas.add(text);
//canvas.renderAll();
       wall_size= new fabric.Textbox("",{
                width:100,
                height:10,
                fontSize:20,
                left:dim[0]-5,
                top:dim[1]-25,
                fill: '#16fc02',
                backgroundColor:'black',
                selectable:true,
                hasControls:false
                
    });


    //setting the width of textbox scal to fit text inside it
    while(wall_size.textLines.length>1){
        wall_size.set({width:wall_size.getScaledWidth()+1});
    }
       console.log("dim.x cordinate-->"+dim[0]);
       console.log("dim.y cordinate-->"+dim[1]);
    }
   // canvas.add(text);
   canvas.add(wall_size);
    canvas.renderAll();
   
});


canvas.on('mouse:up', function(o) {
    //  canvas.clear(text);
    var pointer = canvas.getPointer(o.e);
    isDown = false;
    text.set(px);
   // canvas.add(text);
    dimensions.push(px);

    dim = midLine(startx[temp], starty[temp], endx[temp], endy[temp]);

    wall_size= new fabric.Textbox("wall #number",{
                width:300,
                height:10,
                fontSize:20,
                left:dim[0],
                top:dim[1]-10,
                fill: '#16fc02',
                backgroundColor:'blue',
                name:'wall_size'
    });

   
    console.log(walls);
    console.log('wall size-->'+dim);
    for (var i = 0; i <= dimensions.length; i++) {
        console.log(dimensions[i]);
    }
    console.log(dimensions);
    myFunction();
   // Rooms();
  // canvas.add(wall_size);
  canvas
    canvas.renderAll();
});

canvas.on('mouse:over', function(o) {
    // e.target.setStroke('blue');
  
  //  canvas.add(text);
    canvas.renderAll();
});



var Calculate = {
    lineLength: function(x1, y1, x2, y2) {
        console.log(x1 + ", " + y1 + ", " + x2 + ", " + y2);
        //clearRect(x2, y2);
        var points_length= Math.sqrt(Math.pow(x2 * 1 - x1 * 1, 2) + Math.pow(y2 * 1 - y1 * 1, 2));
           //1mm=2.83465 computer points==>(points_length*2.83465)
           //points to centimeters points_length*28.3465 {0.035277777777778}
           //
            return (points_length * 2.83465);
    }
}

   
    var   midLine= function(x1, y1, x2, y2) {
            console.log(x1 + ", " + y1 + ", " + x2 + ", " + y2);
            // clearRect(x2, y2);
            mid_x=(x1+x2)/2;
            mid_y=(y1+y2)/2;
            var mid_points= [mid_x,mid_y];
           //1mm=2.83465 computer points==>(points_length*2.83465) 
           //points to centimeters points_length*28.3465 {0.035277777777778}
           //
            return mid_points;
        }
    

function myFunction() {
    //  for (index = 0; index < dimensions.length; index++) {
    //    var element = dimensions[index];
    //  var indx = index + 1;
    //document.getElementById("ulist").innerHTML = "Wall-" + indx + "=  " + element + '  m<br>';

    //   }

    var str="<ol>";
    dimensions.forEach(myFunction);
        document.getElementById("ulist").innerHTML=str;

        function myFunction(item,index){
            var ind=index+1;
            str+= "<li>Wall "+ ind + "=> " + item+" mm</li>";
        }
}

function Rooms(){
    var dimension_list= dimensions;
    var splittedArray=[];
    while(dimension_list.length>0){
      splittedArray.push(dimension_list.splice(0,4));
    }

}
function addDoors(){
  var canvo= document.getElementById("canvas");
  var newDiv=document.getElementById("door_list");
  canvo.style
}
</script>
