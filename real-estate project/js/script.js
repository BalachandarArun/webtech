function targetHover(){
    var doc = document.getElementById("submission");
    doc.style.borderColor='rgba(22, 162, 73, 1)';
    doc.style.backgroundColor='rgba(22, 162, 73, 1)'
    doc.style.color='white';
    doc.style.cursor='pointer';
    doc.style.transitionDelay='.5s';
    doc.style.animationFillMode="both";
}

function targetRelease() {
    var doc = document.getElementById("submission");
    doc.style.borderColor='rgba(22, 162, 73, 0.7)';
    doc.style.backgroundColor='white'
    doc.style.color='black';    
}

function validate() {
    try {
        var sqrft = parseInt(document.getElementById("sqrft").value)
        if (isNaN(sqrft)) {
            throw new Error("Pass correct value");  
        }
    } catch (error) {
        alert(error);
    }
}