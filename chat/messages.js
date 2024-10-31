
let messagesBody = document.querySelector('#messagesBody');

// while (messagesBody.firstChild) {
//     // console.log(messagesBody.firstChild);
// messagesBody.removeChild(messagesBody.firstChild)
// }
messagesBody.scrollTop = 9999;

start();

setInterval(start, 20000);



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





// data.forEach((msg) => {
//     console.log(msg);
//   });

    // let anOption = document.createElement("li")
    // livesearchPlace.append(anOption)
    // anOption.innerHTML = element["name"]
    // anOption.setAttribute("data-width", element["width"])
    // anOption.setAttribute("data-height", element["height"])
    // anOption.setAttribute("data-name", element["name"])

    // anOption.classList.add("OptionSearch");

    // let optNumId = "optionN_" + String(optNum);
    // Number(optNum);
    // optNum++;
    // anOption.setAttribute('id', optNumId)

    // if (curBlockWidth && parseInt(anOption.dataset.width) != curBlockWidth) {
    //     anOption.classList.add("disabledOptionSearch");
    // } else {
    //     anOption.classList.add("enabledOptionSearch");
    //     anOption.addEventListener("click", trigNoncustomSelect)
    // }
    // if (typeof (str) === "undefined") {
    //     if (firstEn && anOption.classList.contains('disabledOptionSearch') == false) {
    //         firstEn = false
    //         anOption.classList.add("selectedOptionSearch");
    //     }