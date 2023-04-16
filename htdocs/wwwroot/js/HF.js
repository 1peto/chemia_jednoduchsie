var camera, scene, renderer, controls;
var cube, H2S;
var spotlight;

function addLights() {
  ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
  scene.add(ambientLight);

  var pointLight1 = new THREE.PointLight(0xffffff, 1, 5);
  pointLight1.position.set(3, 2, 3);
  pointLight1.castShadow = true;
  scene.add(pointLight1);

  var pointLight2 = new THREE.PointLight(0xffffff, 1, 20);
  pointLight2.position.set(-5, -2, 3);
  pointLight2.castShadow = true;
  scene.add(pointLight2);

  var pointLight3 = new THREE.PointLight(0xffffff, 1, 10);
  pointLight3.position.set(-1,1,-5);
  pointLight3.castShadow = true;
  scene.add(pointLight3);

  // var helper1 = new THREE.PointLightHelper(pointLight1,1);
  // scene.add(helper1)
  // var helper2 = new THREE.PointLightHelper(pointLight2,1);
  // scene.add(helper2)
  // var helper3 = new THREE.PointLightHelper(pointLight3,1);
  // scene.add(helper3)
}

function addH2S() {
  const loader = new THREE.GLTFLoader();
  loader.load("/htdocs/models/anorganicke/H2S.glb", function (imported_model) {
    scene.add(imported_model.scene);
    H2S = imported_model.scene;
    H2S.position.set(0, -1, 0);
    H2S.rotation.set(0, 4.75, 0)
    H2S.castShadow = true;
  });
}

function addSphere() {
  var geometry = new THREE.SphereGeometry(50, 50, 50);
  var material = new THREE.MeshPhongMaterial({
    color: 0x2f3e61,
    side: THREE.DoubleSide,
    reflectivity: 0.12,
    shininess: 0.65,
  });
  sphere = new THREE.Mesh(geometry, material);
  sphere.recieveShadow = true;
  scene.add(sphere);
}

function init() {
  camera = new THREE.PerspectiveCamera(
    70,
    window.innerWidth / window.innerHeight,
    0.01,
    1000
  );
  camera.position.set(0, 0, 5);

  renderer = new THREE.WebGLRenderer({ antialias: true });
  renderer.setSize(window.innerWidth, window.innerHeight);
  renderer.shadowMap.enabled = true;
  renderer.shadowMap.type = THREE.PCFSoftShadowMap;
  document.body.appendChild(renderer.domElement);

  scene = new THREE.Scene();
  addLights();
  addSphere()
  addH2S();

  controls = new THREE.OrbitControls(camera, renderer.domElement);
}

function render() {
  requestAnimationFrame(render);

  renderer.render(scene, camera);
  camera.lookAt(scene.position);
}


init();
render();