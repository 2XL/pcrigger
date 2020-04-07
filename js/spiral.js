/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function printSpiral(type){


        var c=document.getElementById("myCanvas");
        var cxt=c.getContext("2d");
        var centerX = 500;
        var centerY = 500;
        cxt.moveTo(centerX, centerY);

        var STEPS_PER_ROTATION = 60;
        var increment = 2*Math.PI/STEPS_PER_ROTATION;       
        var theta = increment;
        var i=0;
        while( theta < 250*Math.PI) {
          var newX = centerX + theta * Math.cos(theta); 
          var newY = centerY + theta * Math.sin(theta); 
          cxt.lineTo(newX, newY);
          theta = theta + increment +1;
          i++;
        }
        cxt.stroke();

/*
if(type){
    for (i=0; i< 720; i++) {
        angle = 0.1 * i;
        x=(1+angle)*Math.cos(angle);
        y=(1+angle)*Math.sin(angle);
        context.lineTo(x, y);
    }

}*/

}
window.addEventListener('click', printSpiral(1), false);


