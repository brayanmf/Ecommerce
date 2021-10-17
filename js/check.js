document.addEventListener('DOMContentLoaded', function () {
var $a=document.getElementById("check")

function validar(f){
	var $b = document.getElementById("valores");
  
	if(f.checked==true){
        $b.disabled= false;
	
	}else{
        $b.disabled = true;
	
	}
}
$a.addEventListener("click", (e)=>{
  validar($a)
})


})