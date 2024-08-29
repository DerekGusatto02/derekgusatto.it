function insertButton() {
    var divTornaSu = document.getElementById("TornaSu");
  
    if (divTornaSu) {
      divTornaSu.style.display = "none";
  
      window.onscroll = function() {
        let hasScrolled = window.scrollY > 0;
        if (hasScrolled) {
          divTornaSu.style.display = "block";
        } else {
          divTornaSu.style.display = "none";
        }
      }
    }
  }
  
  function ToTopFunction() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
  
  window.addEventListener('load', function () {
    insertButton();
  });
  
  window.addEventListener('onresize', function () {
    insertButton();
  });


