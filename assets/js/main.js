import * as THREE from 'three';

//Scene
const scene = new THREE.Scene();

//load model
const loader = new GLTFLoader()
loader.load("models/exterior.gltf", function(gltf) {
  console.log(gltf)
  const root = gltf.scene
  root.scale.set(0.20,0.20,0.20)
  root.position.y = -6
  root.rotation.y = 3

  scene.add(root)
})

// // Create a sphere
// const geometry = new THREE.SphereGeometry(3, 64, 64)
// const material = new THREE.MeshStandardMaterial({
//   color: '#00ff83',
// })
// const mesh = new THREE.Mesh(geometry, material)
// scene.add(mesh)

//Sizes
const sizes = {
    width: window.innerWidth,
    height: window.innerHeight,
  }

//Light
const light = new THREE.AmbientLight(0x404040, 10, 100)
scene.add(light)


//Camera
const camera = new THREE.PerspectiveCamera(45, sizes.width/sizes.height, 0.1, 100)
camera.position.z = 30
scene.add(camera)

//Renderer
const canvas = document.querySelector('.webgl')
const renderer = new THREE.WebGLRenderer({canvas})
renderer.setSize(sizes.width, sizes.height)
renderer.render(scene, camera)
renderer.setPixelRatio(2)