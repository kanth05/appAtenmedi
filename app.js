//Sección para llamar y activar el service worker
if('serviceWorker' in navigator){
        navigator.serviceWorker.register(base_url+'sw.js')
        .then(reg=>console.log('Registro de SW exitoso.', reg))
        .catch(err=>console.warn('Error al tratar de registrar el sw',err))
        console.log("Si existe el serviceWorker y está en marcha.")
    }else{
      console.log("No existe un serviceWorker.");
    }


