
const sendBtn = document.querySelector('#sendBtn');
sendBtn.addEventListener("click", takeInput);
// console.log(user_id);


function takeInput(){
    let textSend = document.querySelector('#inputText').value;
    let data = {     // объект
        text: textSend,
        user_id: user_id 
      };
    messageToServer(data);
    document.querySelector('#inputText').value="";
    start();
}

// Пример отправки POST запроса:
async function messageToServer(data = {}) {
    let url = "./msgHandler.php"
    // let url = "./chat.php"
    console.log(JSON.stringify(data));
    let response = await fetch(url, {
        method: "POST",
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
      });
}

// same in messages.js
async function start() {
  let url = './msgShow.php';
  fetch(url)
      .then(response => {
          return response.json();
      })
      .then(data => {
          console.log('start');
          while (messagesBody.firstChild) {
          messagesBody.removeChild(messagesBody.firstChild)
          }

          data.forEach((msg) => {
              // console.log(msg);
              let message = document.createElement("div");
              let hr = document.createElement("hr");

              messagesBody.append(message);
              messagesBody.append(hr);

              message.className = 'mes';

              let ava = document.createElement("div");
              let text = document.createElement("text");

              message.append(ava);
              message.append(text);

              ava.innerHTML = msg["author"];
              text.innerHTML = msg["text"];

              ava.className = 'ava';
              text.className = 'text';

              messagesBody.scrollTop = 9999;
          });
      });
}