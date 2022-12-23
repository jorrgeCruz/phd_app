import { CanvasLocal } from './canvasLocal.js';
let canvas;
let graphics;
let tags=[];
let values=[]
let data;

function graficar(evt) {
    evt.preventDefault();
    data  = Array.from(document.getElementById("datos").children);
    data.map(elem => tags.push(elem.children[2].innerHTML));
    data.map(elem => values.push(parseInt(elem.children[3].innerHTML)));
    console.log(tags)
    console.log(values)
    canvas = document.getElementById('circlechart');
    graphics = canvas.getContext('2d');
    const miCanvas = new CanvasLocal(graphics, canvas, tags, values);;
    miCanvas.paint();
}

document.getElementById("graficar").addEventListener("click", graficar, false);
