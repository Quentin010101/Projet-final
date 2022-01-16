function init() {

    const bPersonnal = document.getElementById('button-personnal')
    const bPreference = document.getElementById('button-preference')
    const bmessage = document.getElementById('button-message')
    const bRide = document.getElementById('button-ride')
    let arrButton = [bPersonnal, bPreference, bmessage, bRide]

    const sPersonnal = document.getElementById('personnalInformation')
    const sPreference = document.getElementById('preference')
    const smessage = document.getElementById('message')
    const sRide = document.getElementById('showRide')
    let arrSection = [sPersonnal, sPreference, smessage, sRide]

    const lPersonnal = document.getElementById('list-personnal')
    const lPreference = document.getElementById('list-preference')
    const lRide = document.getElementById('list-ride')
    const lMessage = document.getElementById('list-message')
    let arrList = [lPersonnal, lPreference, lMessage, lRide]

    arrButton.forEach(function (element) {
        element.addEventListener('click', function () {
            switchSection(element)
            indexNav(element)
        })
    })
    function switchSection(element) {
        let index = arrButton.indexOf(element)
        for (let i = 0; i < arrSection.length; i++) {
            if (i != index) {
                arrSection[i].classList.add('hideSection')
            } else {
                arrSection[i].classList.remove('hideSection')
            }
        }
    }
    function indexNav(element) {
        let index = arrButton.indexOf(element)
        for (let i = 0; i < arrButton.length; i++) {
            if (i != index) {
                arrList[i].classList.remove('navIndex')
            } else {
                arrList[i].classList.add('navIndex')
            }
        }
    }

    const titre = document.querySelectorAll('.allRides h3')

    titre.forEach(function(element){
        element.addEventListener('click', function(){
            element.nextElementSibling.classList.toggle('allRideOpen')
            element.lastElementChild.classList.toggle('iconRotate')
        })
    })
}


window.addEventListener('DOMContentLoaded', function () {
    init()
})