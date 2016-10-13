<html>
    <head>
		<meta charset="UTF-8">
		
        <style>
		/*custom font*/
@import url(http://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0;}

.shader {
			      position: absolute;
			      height: 100%;
			      width: 100%;
				z-index = -100;
				top:0;
				bottom:0;
			    }

body {
	font-family: montserrat, arial, verdana;
	margin: 0;
			padding:0 px;
			padding-left:0px;
			padding-right:0px;
}
/*form styles*/
#msform {
	width: 400px;
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: white;
	text-transform: uppercase;
	font-size: 9px;
	width: 33.33%;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}
        </style>	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	</head>
    <body>
	<script src="fss.js"></script>
	
	<div id="container" class="shader"></div>
	<script>
		var container = document.getElementById('container'),
			renderer = new FSS.CanvasRenderer(),
			scene = new FSS.Scene(),
			light = new FSS.Light('#BBBBBB', '#FFFFFF'),
			geometry = new FSS.Plane(container.offsetWidth, container.offsetHeight, 6, 4),
			material = new FSS.Material('#FFFFFF', '#FFFFFF'),
			mesh = new FSS.Mesh(geometry, material),
			now, start = Date.now();
		
		function initialise() {
			scene.add(mesh);
			scene.add(light);
		
			container.appendChild(renderer.element);
		
			window.addEventListener('resize', resize);
		}
		
		function resize() {
			var width = container.offsetWidth, 
				height = container.offsetHeight;
		
			renderer.setSize(width, height);
		
			scene.remove(mesh); // Remove o mesh e limpa o canvas
			renderer.clear();
			
			geometry = new FSS.Plane(width, height, 6, 4); // recria o plano e o mesh
			mesh = new FSS.Mesh(geometry, material);
			
			scene.add(mesh); // adiciona o mesh
		}
		
		function animate() {
			now = Date.now() - start;
		
			light.setPosition(300 * Math.sin(now * 0.001), 200 * Math.cos(now * 0.0005), 60);
		
			renderer.render(scene);
			requestAnimationFrame(animate);
		}
		
		initialise();
		resize();
		animate();
	</script>