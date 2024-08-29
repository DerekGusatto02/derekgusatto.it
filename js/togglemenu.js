function toggleMenu(){
    if(document.getElementById("menu").className=="tmenushow"){
        document.getElementById("menu").className="tmenuhidden";
        document.getElementById("togglemenu").innerHTML="Apri menù";
    }
    else{
        document.getElementById("menu").className="tmenushow";
        document.getElementById("togglemenu").innerHTML="Chiudi menù";
    }
}