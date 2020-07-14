//EVENT NAV BUTTONS
const CreateBtn = document.getElementById("create_btn")
const MyEventBtn = document.getElementById("myevent_btn")
const OngoingBtn = document.getElementById("ongoing_btn")
const EnrolledBtn = document.getElementById("enrolled_btn")
//EVENT NAV BUTTONS

//EVENT CONTAINERS
const CreateContainer = document.getElementById("create")
const MyContainer = document.getElementById("myevent")
const OngoingContainer = document.getElementById("ongoing")
const EnrolledContainer = document.getElementById("enrolled")
//EVENT CONTAINERS

//EVENT SIDEBAR CONTAINERS
const UpcomingEvent = document.getElementById("upcoming")
const EventReq = document.getElementById("eve-req")
const PendingReq = document.getElementById("pending")
//EVENT SIDEBAR CONTAINERS

//VIEW EVENT MODAL
const ViewBtn = document.getElementById("view")
const EventModal = document.getElementById("event_modal")
const CloseModal = document.getElementById("close")
//VIEW EVENT MODAL

//EVENT NAV FUNCTIONS
CreateBtn.onclick = function () {
	CreateContainer.style.display = "block"
	UpcomingEvent.style.display = "block"
	//none
	MyContainer.style.display = "none"
	OngoingContainer.style.display = "none"
	EnrolledContainer.style.display = "none"
	EventReq.style.display = "none"
	PendingReq.style.display = "none"
}

MyEventBtn.onclick = function () {
	MyContainer.style.display = "block"
	EventReq.style.display = "block"
	//none
	CreateContainer.style.display = "none"
	OngoingContainer.style.display = "none"
	EnrolledContainer.style.display = "none"
	PendingReq.style.display = "none"
	UpcomingEvent.style.display = "none"
}

OngoingBtn.onclick = function () {
	OngoingContainer.style.display = "block"
	PendingReq.style.display = "block"
	//none
	CreateContainer.style.display = "none"
	MyContainer.style.display = "none"
	EnrolledContainer.style.display = "none"
	UpcomingEvent.style.display = "none"
	EventReq.style.display = "none"
}

EnrolledBtn.onclick = function () {
	EnrolledContainer.style.display = "block"
	PendingReq.style.display = "block"
	//none
	CreateContainer.style.display = "none"
	MyContainer.style.display = "none"
	OngoingContainer.style.display = "none"
	UpcomingEvent.style.display = "none"
	EventReq.style.display = "none"
}
//EVENT NAV FUNCTIONS

//VIEW EVENT MODAL FUNCTION
ViewBtn.onclick = function () {
	EventModal.style.display = "block"
}

CloseModal.onclick = function () {
	EventModal.style.display = "none"
}
//VIEW EVENT MODAL FUNCTION
