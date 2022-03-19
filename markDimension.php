<style>
@import url("galleryStyle.css");

.dimemnsions_list {
    margin-top: 13px;
    height: 40px;
    width: 250px;
    float: left;
    padding: 13px;
    padding-top: 12px;
    display: block;
    margin-bottom: 10px;
}

.dimensions_list>ol>li {
    display: inline-block;
    padding: 16px;
}

.rooms_list {
    margin-top: 20px;
    margin-left: 50px;
}
</style>
<script src="fabric.js"></script>
<?php

include "processor/connector.php";
$record = mysqli_query($con, "SELECT layout_image FROM `layouts` ORDER BY layout_id DESC LIMIT 1");
//$last_id=mysqli_insert_id();
//$record= mysqli_query($con,"select * from photo where photo_id =(SELECT MAX(photo_id))");
if (!$record) {
    echo "error occured while fetching image!";
    printf("Error: %s\n", mysqli_error($con));
    exit();
} else {
    // echo "query ok..";
}
while ($data = mysqli_fetch_array($record)) {
    ?>
<div class="singlePiece-container">
    <h2><span>Add dimensions</span></h2>
    <p>Use your Mouse to draw dimensions of your wall</p>
    <!--
    <img id="myImg" src="data:image/jpg;charset=utf8;base64,<?php //echo base64_encode($data['photo_image']); ?>"
        alt="Layout" style="width:100%;max-width:400px" />
       
    wall-1:<input type="text" id="wall-1" value="" placeHolder="123" />
    wall-2:<input type="text" id="wall-1" value="" disabled />
    wall-3<input type="text" id="wall-1" value="" disabled />
    wall-4<input type="text" id="wall-1" value="" disabled /> --->
    <div id="ulist" class="dimemnsions_list">.</div>
    <div id="rooms" class="rooms_list">.</div>
    <canvas id="canvas" style="border:1px solid #fff" width="1000" height="500"></canvas>
    <button class="block-button" onClick="gotoPage()">Select Items</button>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <br>
    <script>
    var canvas = new fabric.Canvas('canvas', {
        selection: false,
        preserveObjectStacking: true
    });
    canvas.hoverCursor = 'hand';

    //MAKING image object ==for background
    //its querried from the DB
    myImage = new Image();
    myImage.onload = function() {
        var canvas_center = canvas.getCenter();
        var temp_image = new fabric.Image(myImage);
        canvas.setBackgroundImage(temp_image, canvas.renderAll.bind(canvas), {
            backgroungImageStretch: false,
            scaleX: 1,
            scaleY: 0.9,
            top: canvas_center.top + 20,
            left: canvas_center.left + 90,
            originX: 'center',
            originY: 'center'
        });
        canvas.renderAll();
    }
    var imageUrl = "data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['layout_image']); ?>";
    myImage.src = imageUrl;

    var line, isDown, background;
    //varibles-global
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
    var px;
    var dim;
    var dimensions = new Array();
    var rooms = new Array();
    var temparray = new Array();
    var wall_text;
    var dim;
    canvas.on('mouse:down', function(o) {
        if (trigger == "1") {
            isDown = true;
            var pointer = canvas.getPointer(o.e);

            var points = [pointer.x, pointer.y, pointer.x, pointer.y];
            startx[temp] = pointer.x;
            starty[temp] = pointer.y;
            line = new fabric.Line(points, {
                strokeWidth: 16,
                stroke: 'white',
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
        canvas.remove(wall_text);
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
            // dim = Calc.midLine(startx[temp], starty[temp], endx[temp], endy[temp]).toFixed(4);

            //prepare the text that indicates the dimensions of the wall
            text = new fabric.Text('Length ' + px + ' mm', {
                left: 480,
                top: 20,
                fill: '#32ee21',
                fontSize: 20,
                width: 200,
                height: 400,
                'selectable': false,
                'evented': false
            });
            canvas.add(text);

            //making the TextBox
            dim = midLine(startx[temp], starty[temp], endx[temp], endy[temp]);
            wall_text= new fabric.Textbox("",{
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
            
        }


        // canvas.add(text);
        canvas.add(wall_text)
        canvas.renderAll();
        for (var i = 0; i <= dimensions.length; i++) {
            //   console.log(dimensions[i]);
        }
    });

    canvas.on('mouse:up', function(o) {
        var pointer = canvas.getPointer(o.e);
        isDown = false;
        text.set(px);
        canvas.add(text);
        dimensions.push(px);


        wall_text= new fabric.Textbox("wall #number",{
                width:300,
                height:10,
                fontSize:20,
                left:dim[0],
                top:dim[1]-10,
                fill: '#16fc02',
                backgroundColor:'blue',
                name:'wall_size'
    });

        for (var i = 0; i <= dimensions.length; i++) {
            console.log(dimensions[i]);

        }
        for (var i = 0; i <= rooms.length; i += 4) {
            console.log(rooms[i]);

        }
        console.log(dimensions);

        myFunction();
        readRooms();
        makeRooms();
       // canvas.add(wall_text);
        canvas.renderAll();
    });

    canvas.on('mouse:out', function(e) {
       // canvas.clear(text);
        isDown = true;
        canvas.renderAll();

    });

    canvas.on('mouse:over', function(o) {
        isDown = false;
        o.target.setStroke('blue');
       canvas.renderAll();

        if (!trigger == "1") {
            px = Calculate.lineLength(startx[temp], starty[temp], endx[temp], endy[temp]).toFixed(3);
            text = new fabric.Text('Length =' + px, {
                left: 90,
                top: 60,
                fill: 'red',
                fontSize: 30,
            });

        }
        canvas.add(text);
        canvas.renderAll();

    });

    //calculate distance covered by the drawn line
    var Calculate = {
        lineLength: function(x1, y1, x2, y2) {
            console.log(x1 + ", " + y1 + ", " + x2 + ", " + y2);
            // clearRect(x2, y2);
            var points_length= Math.sqrt(Math.pow(x2 * 1 - x1 * 1, 2) + Math.pow(y2 * 1 - y1 * 1, 2));
           //1mm=2.83465 computer points==>(points_length*2.83465) 
           //points to centimeters points_length*28.3465 {0.035277777777778}
           //
            return (points_length * 2.83465);
        }
    }
//calculate for mid-point of the line coordinates
    var Cal = {
        mid_length: function(x1, y1, x2, y2) {
            console.log(x1 + ", " + y1 + ", " + x2 + ", " + y2);
            // clearRect(x2, y2);
            var mid_points= ((x1+x2),(y1+y2));
           //1mm=2.83465 computer points==>(points_length*2.83465) 
           //points to centimeters points_length*28.3465 {0.035277777777778}
           //
            return mid_points;
        }
    }
    var midLine= function(x1, y1, x2, y2) {
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
        var str = "<ol>";
        dimensions.forEach(myFunction);
        document.getElementById("ulist").innerHTML = str;

        function myFunction(item, index) {
            var ind = index + 1;
            str += "<li>Wall " + ind + "=> " + item + "mm</li>";
        }
    }

    function readRooms() {

        var room_size = temparray.length;
        for (index = 0; index < room_size; index++) {

        }
    }

    function makeRooms() {
        var str = "<ol><h3> New Room </h3>";
        var index, next, chunk = 4;
        for (index = 0, next = dimensions.length; index < next; index += chunk) {
            temparray = dimensions.slice(index, index + chunk);
            console.log("Room " + temparray);
            var simple = myJoin(temparray,separator = '*')
            document.getElementById("rooms").innerHTML = "Room dimensions: " + simple;

        }
        rooms.push(temparray);
        // console.log(temparray);
        // console.log( rooms);



    }

    function myJoin(array, separator = ',') {
        let str = '';
        for (let i = 0; i < array.length; i++) {
            if (array[i] !== null && array[i] !== undefined)
                str += array[i];
            if (i < array.length - 1)
                str += separator;
        }

        return str;
    }
    //ordering objects

    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    //  img.onclick = function() {
    //      modal.style.display = "block";
    //      modalImg.src = this.src;
    //       captionText.innerHTML = this.alt;
    //   }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    function gotoPage() {
        location.replace("index.php?page=artPiece.php");
    }
    </script>
    <?php
} //closing the while loop

close_connection($con);

?>
    <!-- The Modal -->


    <script>
    // Get the modal
    </script>
</div>