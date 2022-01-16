function init(){
    const button = document.getElementById('button')
    const form = document.querySelector('.form-container')

    button.addEventListener('click', function(){
        form.classList.toggle('open')
    })
}
window.addEventListener('DOMContentLoaded', init())