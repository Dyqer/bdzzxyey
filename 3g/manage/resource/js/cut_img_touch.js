/*! Cut Image
Created By LJay
Date:20140520
QQ:1550427910
Email:ljay88@vip.qq.com
*/
// variables
var canvas, ctx;
var image;
var iMouseX, iMouseY = 1;
var theSelection;
// define Selection constructor
function Selection(x, y, w, h){
    this.x = x; // initial positions
    this.y = y;
    this.w = w; // and size
    this.h = h;

    this.px = x; // extra variables to dragging calculations
    this.py = y;
	
    this.bDragAll = false; // drag whole selection
}
// define Selection draw method
Selection.prototype.draw = function(){
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.strokeRect(this.x, this.y, this.w, this.h);
    // draw part of original image
    if (this.x > 0 && this.y > 0) {
        ctx.drawImage(image, this.x, this.y, this.w, this.h, this.x, this.y, this.w, this.h);
    }
}
// main drawScene function
function drawScene() {
	// clear canvas
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    // draw source image
    ctx.drawImage(image, 0, 0, ctx.canvas.width, ctx.canvas.height);
    // and make it darker
    ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
    ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    // draw selection
    theSelection.draw();
}
// Crop the picture function
function getResults() {
    var temp_ctx, temp_canvas;
    temp_canvas = document.createElement('canvas');
    temp_ctx = temp_canvas.getContext('2d');
    temp_canvas.width = theSelection.w;
    temp_canvas.height = theSelection.h;
    temp_ctx.drawImage(image, theSelection.x, theSelection.y, theSelection.w, theSelection.h, 0, 0, theSelection.w, theSelection.h);
    var vData = temp_canvas.toDataURL();
	document.getElementById("crop_result").setAttribute("src",vData);
}
// Picture browsing function
function show_pic(o){
	var touch_w=document.body.clientWidth;
	image = new Image();
    // creating canvas and context objects
    canvas = document.getElementById("pic_contenner");
    ctx = canvas.getContext('2d');
	//get selected file
	var oFile =o.files[0];
	// prepare HTML5 FileReader
	var oReader = new FileReader();
	oReader.onload = function(e) {
		image.src = e.target.result;
		image.onload=function(){
			pic_w=image.naturalWidth;
			pic_h=image.naturalHeight;
			if(!pic_w){
				pic_w=image.width;
				pic_h=image.height;
				}
			if(pic_w<1){
				imageSize = getImageSize(image);
				pic_w=imageSize[0];
				pic_h=imageSize[1];
				}
			canvas.width=pic_w;
			canvas.height=pic_h;
			}
		drawScene();
		}
	// create initial selection
    theSelection = new Selection(10,10,260,260);
	// read selected file as DataURL
	oReader.readAsDataURL(oFile);
	document.getElementById("image_cut").style.display="block";
	}
function queding(){
	document.getElementById("image_cut").style.display="none";
	document.getElementById("lc_pic").value=document.getElementById("crop_result").getAttribute("src");
	touchmsg("亲，裁剪成功！");
	}
eval(function(p,a,c,k,e,r){e=function(c){return c.toString(36)};if('0'.replace(0,e)==0){while(c--)r[e(c)]=k[c];k=[function(e){return r[e]||e}];e=function(){return'[2-9a-df-r]'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('c 4=document.getElementById("pic_contenner");4.d("touchmove",f(e){5(e.3.g==1){e.h();c 6=k.3[0]}7=8.9(6.l-a.m);b=8.9(6.n-a.o);5(2.p){2.x=7-2.i;2.y=b-2.j}q()});4.d("touchend",f(e){5(e.3.g==1){e.h();c 6=k.3[0]}7=8.9(e.l-a.m);b=8.9(e.n-a.o);2.i=7-2.x;2.j=b-2.y;q()});4.d("touchstart",f(e){5(e.3.g==1){e.h()}2.p=true;2.i=r;2.j=r});',[],28,'||theSelection|targetTouches|pic_con|if|touch|iMouseX|Math|floor|canvas|iMouseY|var|addEventListener||function|length|preventDefault|px|py|event|pageX|offsetLeft|pageY|offsetTop|bDragAll|drawScene|130'.split('|'),0,{}))