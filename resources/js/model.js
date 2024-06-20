import * as THREE from "three";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
import { GLTFLoader } from "three/addons/loaders/GLTFLoader.js";
import { DRACOLoader } from "three/addons/loaders/DRACOLoader.js";

const container = document.querySelector("#nikaModel");
const scene = new THREE.Scene();
scene.background = new THREE.Color("#FFFFFF");

const fov = 35;
const aspect = container.clientWidth / container.clientHeight;
const near = 1;
const far = 1000;
const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
// Set the camera position and look at the center of the scene
camera.position.set(-100, 10, 150); // Adjust the distance from the scene

const renderer = new THREE.WebGLRenderer({ alpha: true });
renderer.setSize(container.clientWidth, container.clientHeight);
renderer.setPixelRatio(window.devicePixelRatio);
container.append(renderer.domElement);

const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true; // Enable damping for smoother control
controls.dampingFactor = 0.1; // Adjust damping factor for smoother control
controls.target.set(0, 0, 0);

function render() {
    requestAnimationFrame(render);
    controls.update();
    renderer.render(scene, camera);
}
function load(file, scale) {
    const loader = new GLTFLoader();

    // Optional: Provide a DRACOLoader instance for compressed mesh data
    const dracoLoader = new DRACOLoader();
    dracoLoader.setDecoderPath(""); // Set the correct decoder path if needed
    loader.setDRACOLoader(dracoLoader);

    loader.load(
        file,
        (gltf) => {
            const bbox = new THREE.Box3().setFromObject(gltf.scene);
            const center = bbox.getCenter(new THREE.Vector3());
            gltf.scene.position.sub(center);

            // Scale the model
            gltf.scene.scale.set(scale, scale, scale);
            // Traverse the scene and check material properties
            gltf.scene.traverse((node) => {
                if (node.isMesh) {
                    const material = node.material;

                    // Check if textures are loaded correctly
                    if (material.map) {
                        console.log("Texture:", material.map.image);
                    }
                }
            });

            scene.add(gltf.scene);
        },
        (xhr) => {
            console.log((xhr.loaded / xhr.total) * 100 + "% loaded");
        },
        (error) => {
            console.log("An error happened", error);
        }
    );
}

function addDirectionalLights(scene) {
    const directions = [
        { position: new THREE.Vector3(0, 0, -1), name: "North" },
        { position: new THREE.Vector3(0, 0, 1), name: "South" },
        { position: new THREE.Vector3(1, 0, 0), name: "East" },
        { position: new THREE.Vector3(-1, 0, 0), name: "West" },
        { position: new THREE.Vector3(0, 1, 0), name: "Up" },
        { position: new THREE.Vector3(0, -1, 0), name: "Down" },
    ];

    for (const dir of directions) {
        const light = new THREE.DirectionalLight(0xffffff, 2);
        light.position.copy(dir.position);
        scene.add(light);
    }
}

// Call the function to add directional lights to the scene
addDirectionalLights(scene);

const hemisphereLight = new THREE.HemisphereLight(0xffffff, 0x000000, 3);
scene.add(hemisphereLight);
render();

// Load the OBJ model with its associated MTL file
const objFile = document
    .querySelector("#nikaModel")
    .getAttribute("data-src-obj");

load(objFile, 1);
