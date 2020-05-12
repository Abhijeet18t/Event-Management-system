//MODAL TRIGGER VARS,FUNCTIONS

const loginBtn = document.getElementById("login-btn")

const signupBtn = document.getElementById("signup-btn")

//MODAL TRIGGER VARS

//MODAL DISPLAY VARS

const loginModal = document.getElementById("login-pop")

const signupModal = document.getElementById("signup-pop")

const signupCard1 = document.getElementById("signup-card-1")

const signupCard2 = document.getElementById("signup-card-2")

const signupCard3 = document.getElementById("signup-card-3")

signupBtn.onclick = function () {
	signupModal.style.display = "block"
	signupCard1.style.display = "block"
}

loginBtn.onclick = function () {
	loginModal.style.display = "block"
}

//MODAL DISPLAY VARS

//MODAL CLOSE VARS,FUNCTIONS

const closeBtnLogin = document.getElementById("close-login")

const closeBtnSignupc1 = document.getElementById("close-signupc1")

const closeBtnSignupc2 = document.getElementById("close-signupc2")

const closeBtnSignupc3 = document.getElementById("close-signupc3")

closeBtnLogin.onclick = function () {
	loginModal.style.display = "none"
}

closeBtnSignupc1.onclick = function () {
	signupModal.style.display = "none"
	signupCard1.style.display = "none"
}

closeBtnSignupc2.onclick = function () {
	signupModal.style.display = "none"
	signupCard2.style.display = "none"
}

closeBtnSignupc3.onclick = function () {
	signupModal.style.display = "none"
	signupCard3.style.display = "none"
}

//MODAL CLOSE VARS

//NEXT PAGE SIGNUP MODAL

const next1 = document.getElementById("next")

const next2 = document.getElementById("next2")

next1.onclick = function () {
	signupCard1.style.display = "none"
	signupCard2.style.display = "block"
}

next2.onclick = function () {
	signupCard2.style.display = "none"
	signupCard3.style.display = "block"
}

//NEXT PAGE SIGNUP MODAL

//REDIRECT TO LOGIN/SIGNUP

const haveSignup = document.getElementById("have-signup-btn")

const haveLogin1 = document.getElementById("have-login-btn1")

const haveLogin2 = document.getElementById("have-login-btn2")

const haveLogin3 = document.getElementById("have-login-btn3")

haveSignup.onclick = function () {
	loginModal.style.display = "none"
	signupModal.style.display = "block"
	signupCard1.style.display = "block"
}

haveLogin1.onclick = function () {
	signupModal.style.display = "none"
	signupCard1.style.display = "none"
	loginModal.style.display = "block"
}

haveLogin2.onclick = function () {
	signupModal.style.display = "none"
	signupCard1.style.display = "none"
	signupCard2.style.display = "none"
	loginModal.style.display = "block"
}

haveLogin3.onclick = function () {
	signupModal.style.display = "none"
	signupCard1.style.display = "none"
	signupCard2.style.display = "none"
	signupCard3.style.display = "none"
	loginModal.style.display = "block"
}

//REDIRECT TO LOGIN/SIGNUP

//PAGE1-NUMBERS

const pageOne1 = document.getElementById("one1")
const pageOne2 = document.getElementById("two1")
const pageOne3 = document.getElementById("three1")

pageOne2.onclick = function () {
	signupCard1.style.display = "none"
	signupCard2.style.display = "block"
}

pageOne3.onclick = function () {
	signupCard1.style.display = "none"
	signupCard3.style.display = "block"
}

//PAGE1-NUMBERS

//PAGE2-NUMBERS

const pageTwo1 = document.getElementById("one2")
const pageTwo2 = document.getElementById("two2")
const pageTwo3 = document.getElementById("three2")

pageTwo1.onclick = function () {
	signupCard2.style.display = "none"
	signupCard1.style.display = "block"
}

pageTwo3.onclick = function () {
	signupCard2.style.display = "none"
	signupCard3.style.display = "block"
}

//PAGE2-NUMBERS

//PAGE3-NUMBERS

const pageThree1 = document.getElementById("one3")
const pageThree2 = document.getElementById("two3")
const pageThree3 = document.getElementById("three3")

pageThree1.onclick = function () {
	signupCard3.style.display = "none"
	signupCard1.style.display = "block"
}

pageThree2.onclick = function () {
	signupCard3.style.display = "none"
	signupCard2.style.display = "block"
}

//PAGE3-NUMBERS
