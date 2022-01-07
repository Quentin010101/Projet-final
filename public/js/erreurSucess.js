const erreur = document.querySelector('.erreur')
const sucess = document.querySelector('.sucess')

window.addEventListener('DOMContentLoaded', function(){
    setTimeout(()=>{
        dissipation()
        setTimeout(()=>{
            erreur.style.display = 'none'
        }, 1000)
    }, 3000)
})

function dissipation(){
    erreur.style.opacity = '0'
    erreur.style.transition = 'opacity 1s'
}