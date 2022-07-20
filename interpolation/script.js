var contextScale  = createContext("scale");
var contextSample = createContext("sample");

drawPixels(contextScale, [0, 100, 50, 20, 80]);
drawPixels(contextSample, [0, 100, 50, 20, 80]);

var scaleX = 1;
var originalPixels = contextSample.getImageData(0, 0, contextSample.canvas.width, contextSample.canvas.height);

function resample() {
    
    var widthScaled = Math.round(originalPixels.width * scaleX);
    
    var scaledPixels  = contextSample.createImageData(widthScaled, originalPixels.height);
    var sampledPixels = contextSample.createImageData(scaledPixels);
    
    var lastOrigPixel = null;
    
    for (var i = 0; i < sampledPixels.data.length; i+=4) {
        
        var position  = index2pos(sampledPixels, i);
        var origPosX  = Math.floor(position.x / scaleX);
        var origColor = getPixel(originalPixels, origPosX, position.y);
        
        if (lastOrigPixel != origPosX) {
            setPixel(scaledPixels, position.x, position.y, origColor);
            lastOrigPixel = origPosX;
        }
        
        setPixel(sampledPixels, position.x, position.y, origColor);
    }
    
    loadImage(contextScale, scaledPixels);
    loadImage(contextSample, sampledPixels);
}

/* ==================== IMAGE TO SCALE ==================== */
//draws the pixel taking in a object and a color array
function drawPixels(context, colors) {
    context.canvas.width  = colors.length*4;                    //this takes the length and uses it as the canvas width
    context.canvas.height = 5*4;                                //this takes the height and sets it to 5
    for (var i = 0; i < colors.length; i++) {
        context.beginPath();
        context.rect(i, 0, 100, 100);
        context.fillStyle = "hsl(0, 0%, " + colors[i] + "%)";
        context.fill();
    }
}

/* ==================== UI ==================== */

document.getElementById("scaleX-slider").addEventListener("input", function () {
    var value = parseFloat(this.value, 10);
    document.getElementById("scaleX-value").innerText = value.toFixed(2);
    scaleX = value;
    
    Array.from(document.getElementsByClassName("container")).forEach(function (div) {
        div.style.width = Math.round(originalPixels.width * scaleX) * 50 + "px";
    });
    
    resample();
});

/* ==================== CANVAS HELPER FUNCTIONS ==================== */

function createContext(id) {
    var canvas  = document.getElementById(id);
    var context = canvas.getContext("2d");
    return context;
}

function loadImage(context, image) {
    if (typeof image == "string") {
        var image = document.getElementById(image);
        context.canvas.width  = image.width;
        context.canvas.height = image.height;
        context.drawImage(image, 0, 0);
    }
    else if (typeof image == "object" && image instanceof ImageData) {
        context.canvas.width  = image.width;
        context.canvas.height = image.height;
        context.putImageData(image, 0, 0);
    }
}

/* ==================== PIXEL MANIPULATION FUNCTIONS ==================== */

function pos2index(imageData, x, y) {
    return 4 * (y * imageData.width + x);
}

function index2pos(imageData, index) {
    index /= 4;
    return {
        x : index % imageData.width,
        y : Math.floor(index / imageData.width),
    }
}

function getPixel(imageData, x, y) {
    return getPixelByIndex(imageData, pos2index(imageData, x, y));
}

function setPixel(imageData, x, y, rgbaArray) {
    setPixelByIndex(imageData, pos2index(imageData, x, y), rgbaArray);
}

function getPixelByIndex(imageData, index) {
    return [
        imageData.data[index],
        imageData.data[index + 1],
        imageData.data[index + 2],
        imageData.data[index + 3],
    ];
}

function setPixelByIndex(imageData, index, rgbaArray) {
    imageData.data[index]     = rgbaArray[0];
    imageData.data[index + 1] = rgbaArray[1];
    imageData.data[index + 2] = rgbaArray[2];
    imageData.data[index + 3] = rgbaArray[3];
}