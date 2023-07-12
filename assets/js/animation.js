
//on fait display none le champ avec offAauthor
//on fait aparettre le champ avec onAuthor
const option = document.getElementById('author'); // Récupère l'élément de sélection par son ID
const divAuthor = document.getElementById('newAuthor'); // Récupère l'élément DIV par son ID
option.addEventListener("change", () => { // Ajoute un événement de changement à l'élément de sélection
    let optionValue = option.value; // Récupère la valeur de l'option sélectionnée
    if(optionValue !== 'inputAuthor') { // Si la valeur est différente de 'inputAuthor'
        divAuthor.classList.remove("onAuthor"); // Retire la classe 'onAuthor' de l'élément DIV
        divAuthor.classList.add("offAuthor"); // Ajoute la classe 'offAuthor' à l'élément DIV
    } else { // Sinon (si la valeur est 'inputAuthor')
        divAuthor.classList.remove("offAuthor"); // Retire la classe 'offAuthor' de l'élément DIV
        divAuthor.classList.add("onAuthor"); // Ajoute la classe 'onAuthor' à l'élément DIV
    }
});

  const selectElement = document.getElementById('selectElement');//select
  const nameType = document.getElementById('nameType');//div
  selectElement.addEventListener("change", () => {
      let selectElementValue = selectElement.value;

      if(selectElementValue !== 'inputType'){
        nameType.classList.remove("onType");
        nameType.classList.add("offType");
      }else{
        nameType.classList.remove("offType");
        nameType.classList.add("onType");
      }
    });

