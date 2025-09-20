  document.querySelector("form").addEventListener("submit", function(e){
      const frase = document.querySelector("input[name='frase']").value.trim();
      if(frase.length === 0){
        e.preventDefault();
        alert("Por favor escribe una frase.");
      }
    });