import * as THREE from "three";

import { OrbitControls } from "three/addons/controls/OrbitControls.js";
import { OBJLoader } from "three/addons/loaders/OBJLoader.js";

const container = document.querySelector("#nikaModel");

// create a Scene
const scene = new THREE.Scene();

// Set the background color
scene.background = new THREE.Color("#FFFFFF");

// Create a camera
const fov = 35; // AKA Field of View
const aspect = container.clientWidth / container.clientHeight;
const near = 0.1; // the near clipping plane
const far = 100; // the far clipping plane

const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);

// every object is initially created at ( 0, 0, 0 )
// move the camera back so we can view the scene
camera.position.set(0, 0, 10);

// create a geometry
const geometry = new THREE.BoxGeometry(2, 2, 2);

// create a default (white) Basic material
const material = new THREE.MeshBasicMaterial({
    color: 0xffffff,
    wireframe: true,
});
// const ambientLight = new THREE.AmbientLight( 0xffffff );
// 			scene.add( ambientLight );

const light1 = new THREE.PointLight(0xffffff, 0.5, 0);
light1.position.set(0, 50, 0);
scene.add(light1);

const light2 = new THREE.PointLight(0xffffff, 0.5, 0);
light2.position.set(50, 75, 50);
scene.add(light2);

const light3 = new THREE.PointLight(0xffffff, 0.5, 0);
light3.position.set(-25, -50, -25);
scene.add(light3);
// create a Mesh containing the geometry and material
// const cube = new THREE.Mesh(geometry, material);

// add the mesh to the scene
// scene.add(cube);

// create the renderer
const renderer = new THREE.WebGLRenderer({ alpha: false });

// next, set the renderer to the same size as our container element
renderer.setSize(container.clientWidth, container.clientHeight);

// finally, set the pixel ratio so that our scene will look good on HiDPI displays
renderer.setPixelRatio(window.devicePixelRatio);

// add the automatically created <canvas> element to the page
container.append(renderer.domElement);

// render, or 'create a still image', of the scene
renderer.setClearColor(0x000000, 1);
renderer.render(scene, camera);
const controls = new OrbitControls(camera, renderer.domElement);
// camera.position.set( 0, 20, 100 );
controls.update();
function animate() {
    render();
}
animate();

function render() {
    // camera.position.x += ( mouseX - camera.position.x ) * .05;
    // camera.position.y += ( - mouseY - camera.position.y ) * .05;

    // camera.lookAt( scene.position );
    // console.log(camera.position);
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
}
var loader = new OBJLoader();

// var loader = new VRMLLoader();

const fileRef = document.querySelector("#nikaModel");
const dataScrValue = fileRef.getAttribute("data-srс");
console.log(fileRef);
console.log(dataScrValue);

function load(src = dataScrValue) {
    loader.load(src, function (object) {
        object.traverse(function (child) {
            if (child instanceof THREE.Mesh) {
                console.log("instanceoff");
                console.log(child.material.color);
                // child.material.color.setHex(0xd3d3d3);
            }
        });
        // OBJBoundingBox.center(object.position);
        // object.position.multiplyScalar(-1);
        // object.position.x = -0.1;
        // object.position.y = 0;
        // object.position.z = -4;
        scene.add(object);
        console.log(object);
        controls.target = getCenterPoint(object.children[0]);
        controls.update();
    });
}
load();
function getCenterPoint(mesh) {
    var middle = new THREE.Vector3();
    var geometry = mesh.geometry;

    geometry.computeBoundingBox();

    middle.x = (geometry.boundingBox.max.x + geometry.boundingBox.min.x) / 2;
    middle.y = (geometry.boundingBox.max.y + geometry.boundingBox.min.y) / 2;
    middle.z = (geometry.boundingBox.max.z + geometry.boundingBox.min.z) / 2;

    mesh.localToWorld(middle);
    return middle;
}

window.camera = camera;
window.scene = scene;
window.laodObj = load;
