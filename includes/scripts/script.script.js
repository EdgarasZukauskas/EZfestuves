var loaded = []; // array to fill messages that has been already displayed. Code will check if message is in this array and if yes, wont display it again
var email = 0; // var to check if email has allready been sent. If its value == 1, it wont be sent

  // function to call print function, visits counter, display items properly
function communicate (n) {
  if (!loaded.includes(n)) {
    visits(n);
    var i = 0;
    var txt = messages.text[n];
    setTimeout(function(){
      document.getElementsByClassName('message')[n].style.display = "inherit";
    }, 500);
    setTimeout(function(){
      print(i,txt,n);
    }, 1000);
    loaded.push(n);
  }
}

  // Printing messages function, also includes scrolling into view, calling email php file.
function print(i,txt,n) {
  var q = Object.keys(messages.text).length;
  document.getElementById("footer").scrollIntoView();
    if (i < txt.length) {
      document.getElementsByClassName('message')[n].innerHTML += txt.charAt(i);
      i++;
      setTimeout(function(){print(i,txt,n);}, 60);
    }
    if (i == txt.length) {
      document.getElementsByClassName('answerY')[n].innerHTML = messages.answerY[n];
      document.getElementsByClassName('answerN')[n].innerHTML = messages.answerN[n];
      if (messages.answerY[n]!="-"){
        setTimeout(function(){
          document.getElementsByClassName('answer')[n].style.display = "inherit";
          setTimeout(function(){
            document.getElementsByClassName('options')[n].style.display = "inherit";
          },500);
          document.getElementById("footer").scrollIntoView();
        }, 500);
      }
      else {
        if (email == 0) {
          let postData = {
            api: 'sendInvitation',
            email: emailAddress,
            name: visitorName,
          };
          fetch('includes/api/api.api.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(postData)
          });
          email = 1;
        }
      }
    }
  }

  // Function to hide no button if visitors presses "no"
function no(n) {
    document.getElementsByClassName('answerN')[n].style.display = "none";
}

  // function calls visitors logging function on every press of the button;
function visits(section){
  let postData = {
    api: 'logVisits',
    session: session,
    section: section
  };
  fetch('includes/api/api.api.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8'
    },
    body: JSON.stringify(postData)
  });
}

  // automatic first message call function
(function() {
    communicate(0);
})();
