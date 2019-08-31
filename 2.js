const usernameValidation = data => {
  let username = data;
  //regexp
  const regExp = /^^(?![0-9" !"#$%&'()*+,-.\/:;<=>?@[\]^_`{|}~"])\w+.{5,9}$/;

  //Check validasi username
  if (username.match(regExp)) {
    return true;
  } else {
    return false;
  }
};

const passwordValidation = data => {
  let password = data;
  const regExp = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9=!@#$%^&*()-_+'"<>,./]+)$/;

  if (
    password.match(regExp) &&
    (password.includes('=') && password.length >= 8)
  ) {
    return true;
  } else {
    return false;
  }
};

//Username validation test
console.log(usernameValidation('IyanSR1997')); //True
console.log(usernameValidation('1997IyanSR')); //False

//Password Validation test
console.log(passwordValidation('iyansR0rrrr=')); //True
console.log(passwordValidation('IyanSR123!#')); //False
