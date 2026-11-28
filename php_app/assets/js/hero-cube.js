/**
 * ICAIESF 2027 — 3D Extruded Logo Refinement (Version 3)
 * Cohesive centered side-profile, consistent extrusion depth & smooth bevels,
 * rich emerald/deep-teal metallic-gloss materials, 3/4 default camera,
 * 360° horizontal rotation, and constrained vertical polar angle.
 */
import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
import { RoomEnvironment } from 'three/addons/environments/RoomEnvironment.js';

function createExtrudedPiece(points, material, { depth = 0.28, bevel = 0.04, zOffset = 0 } = {}) {
  const shape = new THREE.Shape();
  shape.moveTo(points[0][0], points[0][1]);
  for (let i = 1; i < points.length; i++) {
    shape.lineTo(points[i][0], points[i][1]);
  }
  shape.closePath();

  const geo = new THREE.ExtrudeGeometry(shape, {
    depth,
    bevelEnabled: true,
    bevelThickness: bevel,
    bevelSize: bevel * 0.85,
    bevelSegments: 10,
    curveSegments: 48,
  });
  geo.translate(0, 0, -depth / 2 + zOffset);
  return new THREE.Mesh(geo, material);
}

function createExtrudedBezier(shape, material, { depth = 0.26, bevel = 0.038, zOffset = 0 } = {}) {
  const geo = new THREE.ExtrudeGeometry(shape, {
    depth,
    bevelEnabled: true,
    bevelThickness: bevel,
    bevelSize: bevel * 0.85,
    bevelSegments: 10,
    curveSegments: 56,
  });
  geo.translate(0, 0, -depth / 2 + zOffset);
  return new THREE.Mesh(geo, material);
}

function createPolishedRod(p1, p2, radius, material) {
  const dir = new THREE.Vector3().subVectors(p2, p1);
  const len = dir.length();
  const geo = new THREE.CylinderGeometry(radius, radius, len, 28, 1);
  const mesh = new THREE.Mesh(geo, material);
  mesh.position.copy(p1).addScaledVector(dir, 0.5);
  mesh.quaternion.setFromUnitVectors(new THREE.Vector3(0, 1, 0), dir.normalize());
  return mesh;
}

function build3DLogo() {
  const model = new THREE.Group();

  // Rich deep-teal to emerald glossy metallic palette
  const deepTealMat = new THREE.MeshPhysicalMaterial({
    color: 0x0e635a,
    roughness: 0.18,
    metalness: 0.36,
    clearcoat: 1.0,
    clearcoatRoughness: 0.07,
    envMapIntensity: 1.3,
  });

  const midTealMat = new THREE.MeshPhysicalMaterial({
    color: 0x12786d,
    roughness: 0.17,
    metalness: 0.34,
    clearcoat: 1.0,
    clearcoatRoughness: 0.07,
    envMapIntensity: 1.3,
  });

  const emeraldMat = new THREE.MeshPhysicalMaterial({
    color: 0x1bb886,
    roughness: 0.16,
    metalness: 0.30,
    clearcoat: 1.0,
    clearcoatRoughness: 0.06,
    envMapIntensity: 1.35,
  });

  const brightEmeraldMat = new THREE.MeshPhysicalMaterial({
    color: 0x26d19a,
    roughness: 0.15,
    metalness: 0.30,
    clearcoat: 1.0,
    clearcoatRoughness: 0.06,
    envMapIntensity: 1.35,
  });

  // 1. Upper-Left Emerald Hexagonal Ribbon
  const upperLeftEmerald = [
    [-0.04,  0.98],
    [-0.86,  0.50],
    [-0.86, -0.14],
    [-0.64, -0.02],
    [-0.64,  0.38],
    [-0.04,  0.73],
  ];
  model.add(createExtrudedPiece(upperLeftEmerald, emeraldMat, { depth: 0.28, bevel: 0.04, zOffset: 0 }));

  // 2. Upper-Right Deep Teal Gear-Toothed Hexagonal Segment
  const upperRightGear = [
    [ 0.04,  0.98],
    [ 0.26,  0.85],
    [ 0.34,  0.97],
    [ 0.48,  0.89],
    [ 0.40,  0.77],
    [ 0.56,  0.68],
    [ 0.67,  0.78],
    [ 0.80,  0.66],
    [ 0.70,  0.56],
    [ 0.86,  0.46],
    [ 0.86,  0.32],
    [ 1.00,  0.32],
    [ 1.00,  0.16],
    [ 0.86,  0.16],
    [ 0.86, -0.06],
    [ 0.62,  0.04],
    [ 0.62,  0.38],
    [ 0.04,  0.73],
  ];
  model.add(createExtrudedPiece(upperRightGear, deepTealMat, { depth: 0.28, bevel: 0.04, zOffset: 0 }));

  // 3. Lower-Left Deep Teal Angular Geometric Segments
  const lowerLeftOuter = [
    [-0.86, -0.24],
    [-0.86, -0.50],
    [-0.06, -0.97],
    [ 0.02, -0.82],
    [-0.60, -0.46],
    [-0.36, -0.32],
    [-0.48, -0.14],
    [-0.66, -0.24],
    [-0.66, -0.14],
  ];
  model.add(createExtrudedPiece(lowerLeftOuter, deepTealMat, { depth: 0.28, bevel: 0.04, zOffset: 0 }));

  const lowerLeftInnerBar = [
    [-0.48, -0.54],
    [-0.04, -0.80],
    [-0.14, -0.95],
    [-0.58, -0.69],
  ];
  model.add(createExtrudedPiece(lowerLeftInnerBar, midTealMat, { depth: 0.26, bevel: 0.038, zOffset: 0 }));

  // 4. Lower-Right Curved Emerald Leaf (smooth curvature, unified thickness)
  const leafUpperShape = new THREE.Shape();
  leafUpperShape.moveTo(0.06, -0.78);
  leafUpperShape.bezierCurveTo(0.18, -0.36, 0.48, -0.16, 0.86, -0.16);
  leafUpperShape.bezierCurveTo(0.68, -0.42, 0.36, -0.58, 0.14, -0.70);
  leafUpperShape.closePath();
  model.add(createExtrudedBezier(leafUpperShape, brightEmeraldMat, { depth: 0.26, bevel: 0.038, zOffset: 0 }));

  const leafLowerShape = new THREE.Shape();
  leafLowerShape.moveTo(0.04, -0.90);
  leafLowerShape.bezierCurveTo(0.36, -0.86, 0.72, -0.64, 0.86, -0.22);
  leafLowerShape.bezierCurveTo(0.64, -0.48, 0.34, -0.64, 0.10, -0.78);
  leafLowerShape.closePath();
  model.add(createExtrudedBezier(leafLowerShape, emeraldMat, { depth: 0.26, bevel: 0.038, zOffset: 0 }));

  // 5. Central Molecular Network (centered on z = 0 for cohesive front, side, rear & 3/4 views)
  const nodes = [
    new THREE.Vector3( 0.00,  0.40, 0), // 0: top
    new THREE.Vector3(-0.32,  0.14, 0), // 1: mid-left
    new THREE.Vector3( 0.30,  0.14, 0), // 2: mid-right
    new THREE.Vector3( 0.00, -0.10, 0), // 3: center-lower
    new THREE.Vector3( 0.30, -0.16, 0), // 4: right-lower
    new THREE.Vector3( 0.00, -0.44, 0), // 5: bottom stem
  ];

  const nodeGeo = new THREE.SphereGeometry(0.104, 36, 36);
  nodes.forEach((pos, idx) => {
    const mat = idx === 0 || idx === 3 ? midTealMat : deepTealMat;
    const node = new THREE.Mesh(nodeGeo, mat);
    node.position.copy(pos);
    model.add(node);
  });

  const bonds = [
    [0, 1],
    [0, 2],
    [1, 3],
    [2, 3],
    [2, 4],
    [3, 5],
  ];

  bonds.forEach(([a, b]) => {
    model.add(createPolishedRod(nodes[a], nodes[b], 0.038, midTealMat));
  });

  // Center pivot at exact geometric bounding-box centre
  model.scale.setScalar(1.18);
  const box = new THREE.Box3().setFromObject(model);
  const center = new THREE.Vector3();
  box.getCenter(center);
  model.position.sub(center);

  const pivot = new THREE.Group();
  pivot.add(model);
  return pivot;
}

function initHeroCube() {
  const container = document.getElementById('cube-viewer');
  if (!container) return;

  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(34, 1, 0.1, 100);
  // 3/4 default viewing angle showcasing extrusion depth & bevels
  camera.position.set(1.55, 0.62, 4.15);

  const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
  renderer.outputColorSpace = THREE.SRGBColorSpace;
  renderer.toneMapping = THREE.ACESFilmicToneMapping;
  renderer.toneMappingExposure = 1.2;
  container.appendChild(renderer.domElement);

  // Studio environment reflections
  const pmremGenerator = new THREE.PMREMGenerator(renderer);
  scene.environment = pmremGenerator.fromScene(new RoomEnvironment(), 0.04).texture;

  // Emerald key light, subtle cyan rim light, soft fill light
  scene.add(new THREE.HemisphereLight(0xdffef4, 0x0b524c, 1.4));

  const emeraldKey = new THREE.DirectionalLight(0xdffef4, 2.6);
  emeraldKey.position.set(4, 5.5, 5);
  scene.add(emeraldKey);

  const cyanRim = new THREE.DirectionalLight(0x38f2d8, 2.0);
  cyanRim.position.set(-4.5, 2, -3.5);
  scene.add(cyanRim);

  const softFill = new THREE.DirectionalLight(0x148f82, 1.4);
  softFill.position.set(0.5, -2.5, -4.5);
  scene.add(softFill);

  const logoPivot = build3DLogo();
  scene.add(logoPivot);

  // Smooth 360° horizontal rotation, constrained vertical polar angle
  const controls = new OrbitControls(camera, renderer.domElement);
  controls.target.set(0, 0, 0);
  controls.enableDamping = true;
  controls.dampingFactor = 0.06;
  controls.enablePan = false;
  controls.enableZoom = false;
  controls.rotateSpeed = 0.68;
  controls.minPolarAngle = Math.PI * 0.32;
  controls.maxPolarAngle = Math.PI * 0.68;
  controls.autoRotate = true;
  controls.autoRotateSpeed = 0.75;

  let isInteracting = false;
  controls.addEventListener('start', () => {
    isInteracting = true;
    controls.autoRotate = false;
  });
  controls.addEventListener('end', () => {
    isInteracting = false;
    controls.autoRotate = true;
  });

  function resize() {
    const w = container.clientWidth || 380;
    const h = container.clientHeight || 360;
    camera.aspect = w / h;
    camera.updateProjectionMatrix();
    renderer.setSize(w, h, false);
  }

  if (typeof ResizeObserver !== 'undefined') {
    new ResizeObserver(resize).observe(container);
  } else {
    window.addEventListener('resize', resize, { passive: true });
  }
  resize();

  const clock = new THREE.Clock();
  renderer.setAnimationLoop(() => {
    const elapsed = clock.getElapsedTime();
    if (!isInteracting) {
      logoPivot.position.y = Math.sin(elapsed * 1.35) * 0.06;
    }
    controls.update();
    renderer.render(scene, camera);
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initHeroCube);
} else {
  initHeroCube();
}
