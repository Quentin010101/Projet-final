function init(){

    const startingPlace = document.querySelector('.inputStartingPlace')
    const startingLong = document.querySelector('.startingLong')
    startingLong.value = ''
    const startingLat = document.querySelector('.startingLat')
    startingLat.value = ''
    const endingPlace = document.querySelector('.inputEndingPlace')
    const endingLong = document.querySelector('.endingLong')
    endingLong.value = ''
    const endingLat = document.querySelector('.endingLat')
    endingLat.value = ''
    const menu = document.querySelector('.menu')
    
    const distance = document.querySelector('.distance')
    const temps = document.querySelector('.temps')
    const rideDistance = document.querySelector('.rideDistance')
    const rideTime = document.querySelector('.rideTime')
    const startingTime = document.querySelector('.startingTime')
    
    const arrStockage = [[startingPlace, startingLat, startingLong ], [endingPlace, endingLat, endingLong ]]
    
    
    
    function find(parm, element){
        let adresse = parm
        if(adresse != ''){
            fetch("https://api-adresse.data.gouv.fr/search/?q=" + adresse + "&limit=5&type=municipality").then(function(response){ return response.json()}).then(function(data){  analyse(data, element)})
        }
    }
    function analyse(parm, element){
        let villes = parm.features
        let arr = []
        for(let i = 0; i< villes.length; i++){
            arr.push([villes[i].properties.city,villes[i].geometry.coordinates[0],villes[i].geometry.coordinates[1]]) 
        }
        createAutoComplete(arr, element)
    }
    function createAutoComplete(parm, element){
        let arr = parm
        supressChild(element[0].nextElementSibling)
        for(let i = 0; i < arr.length; i++){
            const ville = document.createElement('div')
            ville.innerText = arr[i][0]
            let long = arr[i][1]
            let lat = arr[i][2]
            ville.addEventListener('click', function(){
                element[0].value = ville.innerText
                element[1].value = lat
                element[2].value = long
                supressChild(element[0].nextElementSibling)
                findDistance(startingLat.value, startingLong.value, endingLat.value, endingLong.value)
    
            })
            document.body.addEventListener('click', function(e){
                if(e.target !== element[0].nextElementSibling){
                supressChild(element[0].nextElementSibling)
                }
            })
            element[0].nextElementSibling.appendChild(ville)
        }
    }
    function supressChild(parm){
        let length = parm.childNodes.length
        for(let i = 0; i< length; i++){
            parm.removeChild(parm.childNodes[0])
        }
    }
    arrStockage.forEach(element =>{
        element[0].addEventListener('input', function(){
            let value = element[0].value
            find(value, element)
        })
    })
    // duration
    
    function findDistance(originLat, originLong, endLat, endLong){
        if(originLat !== '' && originLong !== '' && endLat !== '' && endLong !== ''){
            let key = '700137fa0413a4b536748e0dcd1a2927'
            fetch('https://maps.open-street.com/api/route/?origin=' + originLat + ',' + originLong + '&destination=' + endLat + ',' + endLong + '&mode=driving&key=' + key)
            .then(function(response){ return response.json()}).then(function(data){ getDistance(data)})
        }
    }
    function getDistance(parm){
        distance.innerText = Math.trunc(parm.total_distance/1000) + "km"
        temps.innerText = secondToHour(parm.total_time)
        rideDistance.value = parm.total_distance/1000
        rideTime.value = parm.total_time/3600
    }
    function secondToHour(parm){
        let totalValue = parm/3600
        let hours = Math.floor(totalValue)
        let min = totalValue - hours
        min = Math.trunc(min*60)
        let parm1 = hours + 'h'
        if(hours == 0){
            parm1 = ''
        }
        let result = parm1 + min + 'min'
    
        return result
    }
}    

window.addEventListener('DOMContentLoaded', init())


