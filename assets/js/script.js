let passwordRegex = {
    lower: /[a-z]/,
    upper: /[A-Z]/,
    number: /[0-9]/,
    special: /[$&+,:;=?@#|'<>.^*()%!"{}[\]-]/,
    stringLength: /(.){8,}/
  };
  
  let conditions = ["lower", "upper", "number", "special","stringLength"];
  let passwordInput = document.getElementById("formPassword");
  let loginWord = document.getElementById("textPassWord");
  let scoreText = document.getElementById("passwordScore");
  
  passwordInput.addEventListener("input", () => {
    let score = 0;
  
    for (let c of conditions) {
      let li = document.getElementById(c);
  
      if (passwordRegex[c].test(passwordInput.value)) {
        li.style.color = "#F18F01";
        li.children[0].innerHTML = '<span class="material-symbols-outlined">mood</span>';
        li.children[1].innerHTML = "";
        score += 1;
      } else {
        li.style.color = "red";
        li.children[1].innerHTML = '<span class="material-symbols-outlined">sentiment_very_dissatisfied</span>';
        li.children[0].innerHTML = "";
      }
    }
  
    if (passwordInput.value.length < 8) {
      scoreText.innerHTML = "Password too short";
    } else if (score === conditions.length) {
      scoreText.innerHTML = "Strong password";
    } else {
      scoreText.innerHTML = "Weak password";
    }
  });
  
  passwordInput.addEventListener("focus", () => {
    loginWord.classList.remove("noBoxPass");
    loginWord.classList.add("boxPass");
  });
