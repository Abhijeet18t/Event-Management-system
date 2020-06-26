// Create Modals
const CreateEvent = document.getElementById("create_e")

const MyEvent = document.getElementById("my_e")

const OngoingEvent = document.getElementById("ongoing_e")

const JoinedEvent = document.getElementById("joined_e")
// Create Modals

//Event Buttons

const CreateBtn = document.getElementById("create_b")

const MyBtn = document.getElementById("my_b")

const OngoingBtn = document.getElementById("ongoing_b")

const JoinedBtn = document.getElementById("joined_b")

//Event Buttons

CreateBtn.onclick = function () {
	MyEvent.style.display = "none"
	OngoingEvent.style.display = "none"
	JoinedEvent.style.display = "none"
	CreateEvent.style.display = "flex"
}

MyBtn.onclick = function () {
	OngoingEvent.style.display = "none"
	JoinedEvent.style.display = "none"
	CreateEvent.style.display = "none"
	MyEvent.style.display = "block"
}

OngoingBtn.onclick = function () {
	JoinedEvent.style.display = "none"
	CreateEvent.style.display = "none"
	MyEvent.style.display = "none"
	OngoingEvent.style.display = "block"
}

JoinedBtn.onclick = function () {
	OngoingEvent.style.display = "none"
	CreateEvent.style.display = "none"
	MyEvent.style.display = "none"
	JoinedEvent.style.display = "block"
}
