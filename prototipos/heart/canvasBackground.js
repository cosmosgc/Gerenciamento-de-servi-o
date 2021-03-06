var container = document.getElementById('container'),
	renderer = new FSS.CanvasRenderer(),
	scene = new FSS.Scene(),
	light = new FSS.Light('#111122', '#FF0022'),
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