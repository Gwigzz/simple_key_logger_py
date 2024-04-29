const contentDiv = document.getElementById('get-text-logger');
const btnAutoRefresh = document.getElementById('btn-auto-refresh');
const request_interval = 1800;


let autoRefreshEnabled = localStorage.getItem('autoRefresh') == "true";
let intervalId = null;

const request_file = () => {

    const request = new XMLHttpRequest();

    request.onload = function (e) {

        if (this.status == 200) {
            let text = this.responseText
            contentDiv.innerText = `${text}`;               // insert text

            contentDiv.scrollTop = contentDiv.scrollHeight; // scroll to bottom
        } else {
            console.error(`Error : ${this.statusText}`)
        }
    }
    request.open("GET", "key_logger.txt")
    request.send();
}
request_file();

const startAutoRefresh = () => {
    if(!autoRefreshEnabled){
        btnAutoRefresh.innerText = 'Activer auto refresh';
        return;
    } else{
        btnAutoRefresh.innerText = 'Désactiver auto refresh';
    }

    intervalId = setInterval(request_file, request_interval);
}
startAutoRefresh();

btnAutoRefresh.addEventListener('click', function (e) {

    autoRefreshEnabled = !autoRefreshEnabled; // Reverses automatic update status

    if (autoRefreshEnabled) {
        localStorage.setItem("autoRefresh", "true");
        btnAutoRefresh.innerText = 'Désactiver auto refresh';
        startAutoRefresh(); // Starts automatic update if enabled
    } else {
        localStorage.setItem("autoRefresh", "false");
        btnAutoRefresh.innerText = 'Activer auto refresh';
        clearInterval(intervalId);
    }

})

