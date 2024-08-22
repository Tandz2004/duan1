function validateInput(inputElement) {
    var sl = parseInt(inputElement.value);
    if (sl < 1) {
      inputElement.value = 1;
    }
  }
  