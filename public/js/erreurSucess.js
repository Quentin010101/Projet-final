const erreur = document.querySelector('.erreur')
const sucess = document.querySelector('.sucess')
let parm
window.addEventListener('DOMContentLoaded', function(){
    if(erreur || sucess){
        if(erreur){
            parm = erreur
        }
        else if(sucess){
            parm = sucess
        }
        setTimeout(()=>{
            dissipation()
            setTimeout(()=>{
                parm.style.display = 'none'
            }, 1000)
        }, 3000)
    }
})

function dissipation(){
    parm.style.opacity = '0'
    parm.style.transition = 'opacity 1s'
}