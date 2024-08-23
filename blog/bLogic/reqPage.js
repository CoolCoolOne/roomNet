
const nextButt = document.getElementById('nextPG');
// console.log(nextButt);
nextButt.addEventListener("click", ajaxReq.bind(null,'next',1));


function ajaxReq(type,currPG) {
        let url = ('http://room.loft:8888/blog/bLogic/pagijaxion.php?action=' + type + '&curr=' + currPG);
        // let url = ('http://room.loft:8888/blog/bLogic/pagijaxion.php?action=' + type);
    fetch(url)
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            console.log(data);
        });
}
