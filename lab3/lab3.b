* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #dedee0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}
.container {
  width: 350px;
}
form {
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
}

form h2 {
  text-align: center;
  margin-bottom: 20px;
}
.form-group {
  margin-bottom: 10px;
}
label {
  font-size: 14px;
  display: block;
  margin-bottom: 6px;
}
input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 12px;
}
input:focus {
  outline: none;
  border-color: #4e4e4e;
}
.error-input {
  border-color: #bd0f0f;
}

.error-text {
  color: #bd0f0f;
  font-size: 12px;
  margin-top: 4px;
}
button {
  width: 100%;
  padding: 12px;
  border: none;
  background-color: rgb(245, 182, 203);
  margin-top: 10px;
  border-radius: 10px;
  color: black;
}
button:hover {
  cursor: pointer;
  background-color: palevioletred;
}

