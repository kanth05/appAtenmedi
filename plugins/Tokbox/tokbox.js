// replace these values with those generated in your TokBox Account
var apiKey = "46522642";
var sessionId = "1_MX40NjUyMjY0Mn5-MTU4MjczMDU1NDI5N353MFlqZW1ENW1XQlVzUGd5V0RRdXpJU1h-fg";
var token = "T1==cGFydG5lcl9pZD00NjUyMjY0MiZzaWc9NWQ3ZTZiYzgwZDQ2ZDMxN2NkYzNlNzJlMjNkOTM5YTkxZmMzZDFhOTpzZXNzaW9uX2lkPTFfTVg0ME5qVXlNalkwTW41LU1UVTRNamN6TURVMU5ESTVOMzUzTUZscVpXMUVOVzFYUWxWelVHZDVWMFJSZFhwSlUxaC1mZyZjcmVhdGVfdGltZT0xNTg2ODEyMjMwJm5vbmNlPTAuMjEyODg4Njg5NTgwMzY1NjYmcm9sZT1wdWJsaXNoZXImZXhwaXJlX3RpbWU9MTU4NzQxNjk4MyZpbml0aWFsX2xheW91dF9jbGFzc19saXN0PQ==";

let btn_disconnect = document.getElementById("btn_disconect");

// (optional) add server code here
initializeSession();

btn_disconnect.addEventListener("click", btnDisconnect);

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