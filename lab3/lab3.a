const registerForm = document.forms.registerForm;
const fullNameElement = registerForm.fullname;
const emailElement = registerForm.email;
const passwordElement = registerForm.password;
const confirmpasswordElement = registerForm.confirmpassword;

registerForm.addEventListener("submit", function (event) {
  event.preventDefault();

  let isValid = true;

  function showError(elementName, errorMsg) {
    const ErrorElement = document.getElementById(elementName + "ErrorText");
    ErrorElement.innerText = errorMsg;
    const element = registerForm[elementName];
    element.classList.add("error-input");
    isValid = false;
  }
  //Name Validation
  if (fullNameElement.value == "") {
    showError("fullname", "Name is required");
  }
  //Email Validation
  if (/^\w+@\w+\.\w{2,3}$/.test(emailElement.value) === false) {
    showError("email", "Email must be in valid format");
  }
  //Password Validation
  if (passwordElement.value == "") {
    showError("password", "Password is required");
  }
  if (confirmpasswordElement.value !== passwordElement.value) {
    showError("confirmpassword", "Password didnot match");
  }

  if (isValid) {
    registerForm.submit();
  }
});
