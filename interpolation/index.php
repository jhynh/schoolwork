<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<table id="controls">
    <tr>
        <td colspan="3">nearest neighbor</td>
    </tr>
    <tr>
        <td>scale-x:</td>
        <td>
            <input id="scaleX-slider" type="range" min="0.5" max="3" step="0.1" value="1" />
        </td>
        <td id="scaleX-value">1.00</td>
    </tr>
</table>

<div class="container">
    <canvas id="scale"></canvas>
</div>
<canvas id="sample"></canvas>
<!--if using js, include after the canvas is laid out-->
<script type="text/javascript" src="script.js"></script>
</html>