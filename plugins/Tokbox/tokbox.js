//Funciones para manejar la video llamada
function btnDisconnect(){
  
  var session = OT.initSession(apiKey, sessionId);
  session.disconnect();

}

// Handling all of our errors here by alerting them
function handleError(error) {
    if (error) {
      alert(error.message);
    }
  }
  
  function initializeSession() {
    var session = OT.initSession(apiKey, sessionId);
  
    // Subscribe to a newly created stream
    session.on('streamCreated', function(event) {
        session.subscribe(event.stream, 'subscriber', {
          insertMode: 'append',
          width: '100%',
          height: '100%',
          name: 'Doctor',
          fitMode: "contain",
          insertDefaultUI: true
        }, handleError);
      });
  
    // Create a publisher
    var publisher = OT.initPublisher('publisher', {
      insertMode: 'append',
      width: '100%',
      height: '100%',
      name: 'Paciente',
      insertDefaultUI: true
    }, handleError);
  
    // Connect to the session
    session.connect(token, function(error) {
      // If the connection is successful, publish to the session
      if (error) {
        handleError(error);
      } else {
        session.publish(publisher, handleError);
      }
    });
  }

  let btn_disconnect = document.getElementById("btn_disconect");

  initializeSession();
//04265706357

  
  btn_disconnect.addEventListener("click", btnDisconnect);