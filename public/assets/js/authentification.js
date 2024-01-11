"use strict";

const toast = new bootstrap.Toast(document.getElementById("info-toast"));
const toastBody = document.querySelector(".toast-body");

// GET HTML ELEMENTS :
const getHTMLElements = () => {
  const smallTags = document.querySelectorAll("small");
  smallTags.forEach((item) => item.classList.add("hidden"));

  const username = document.getElementById("username")?.value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const passwordComfirm = document
    .getElementById("password_comfirm")
    ?.value.trim();

  return {
    username,
    email,
    password,
    passwordComfirm,
    smallTags,
  };
};

// Form Validation with REGEX :
const validateForm = (email, password, passwordComfirm = "") => {
  const errors = { nb: 0, err: [false, false, false] };

  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const passwordRegex =
    /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

  if (!email.match(emailRegex)) {
    errors.nb += 1;
    errors.err[0] = true;
  }
  if (!password.match(passwordRegex)) {
    errors.nb += 1;
    errors.err[1] = true;
  }
  if (passwordComfirm && password !== passwordComfirm) {
    errors.nb += 1;
    errors.err[2] = true;
  }

  return errors;
};

// Send Login Data to Server :
async function sendData(path, data) {
  const req = await fetch(path, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  });
  const res = await req.json();
  if (res.msg === "ok")
    window.location.href = path === "/register" ? "/login" : "/";
  else {
    toastBody.textContent = res.msg;
    toast.show();
  }
}

// Get Form Data :
function login() {
  const { smallTags, email, password } = getHTMLElements();

  const result = validateForm(email, password);

  if (result.nb == 0) {
    sendData("/login", { email, password });
  } else {
    result.err.forEach((item, indx) => {
      if (item) smallTags[indx].classList.remove("hidden");
    });
  }
}

function register() {
  const { smallTags, username, email, password, passwordComfirm } =
    getHTMLElements();

  const result = validateForm(email, password, passwordComfirm);

  if (result.nb == 0) {
    sendData("/register", { username, email, password });
  } else {
    result.err.forEach((item, indx) => {
      if (item) smallTags[indx].classList.remove("hidden");
    });
  }
}

// Listen to Input clicks :
const inputClicked = (e) => {
  if (e.key === "Enter") {
    if (e.currentTarget.closest(".login-box").id === "login") login();
    else register();
  }
};
