///LOgin

function sendloginrequest() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  const checkbox = document.getElementById("myCheckbox");
  var remmberme = 0;
  if (checkbox.checked) {
    remmberme = 1;
  } else {
    remmberme = 0;
  }

  var jsRequestObject = {
    email: email,
    password: password,
    remmberme: remmberme,
  };
  var jsonreqesttext = JSON.stringify(jsRequestObject);
  var formData = new FormData();
  formData.append("jsonreqesttext", jsonreqesttext);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      var JS_object = JSON.parse(response);
      if (JS_object.msg == "success") {
        window.location.href = "index.php";
      } else {
        document.getElementById("form-message").innerHTML = JS_object.msg;
      }
    }
  };

  request.open("POST", "signin.php", true);
  request.send(formData);
}
//Login Finished

//register
function sendRegisterrequest() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  const checkbox = document.getElementById("myCheckbox");
  var remmberme = checkbox.checked ? 1 : 0;

  var jsRequestObject = {
    email: email,
    password: password,
    remmberme: remmberme,
  };
  var jsonreqesttext = JSON.stringify(jsRequestObject);
  var formData = new FormData();
  formData.append("jsonreqesttext", jsonreqesttext);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      var JS_object = JSON.parse(response);
      if (JS_object.msg == "success") {
        window.location.href = "login.php";
      } else {
        document.getElementById("form-message").innerHTML = JS_object.msg;
      }
    }
  };

  request.open("POST", "signup.php", true);
  request.send(formData);
}
//registerfinishe

function handleCredentialResponse(response) {
  // Post JWT token to server-side
  fetch("auth_init.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      request_type: "user_auth",
      credential: response.credential,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status == 1) {
        window.location.href = "index.php";
      }
    })
    .catch(console.error);
}

// Sign out the user
function signOut(authID) {
  document.getElementsByClassName("pro-data")[0].innerHTML = "";
  document.querySelector("#btnWrap").classList.remove("hidden");
  document.querySelector(".pro-data").classList.add("hidden");
}
