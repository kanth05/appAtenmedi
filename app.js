    //Sección para llamar y activar el service worker
    if('serviceWorker' in navigator){
        navigator.serviceWorker.register('./sw.js')
        .then(reg=>console.log('Registro de SW exitoso.', reg))
        .catch(err=>console.warn('Error al tratar de registrar el sw',err))
        console.log("Aja, yeag")
    }else{
        console.log("Nada, de nada")
    }



