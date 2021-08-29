document.addEventListener("DOMContentLoaded", function(event) {
    let day = document.querySelectorAll(".singleDay");
    let reservations = document.querySelectorAll(".singleReservation");
    day.forEach(item => {
        item.addEventListener("click", (e) => {
            day.forEach(element => {
                element.style.background = "none";
                element.style.color = "grey";
            })
            item.style.background = "lightgrey";
            item.style.color = "white";
            let selectedData = item.dataset.time;

            fetch('/rezerwacja/handlers/ReservationsHandler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
            },
                body: JSON.stringify({
                    getByData: true,
                    data: selectedData
                }),
            })
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById('reservedDates').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = "";
                console.log(data.length);
                if (data.length == 0) {
                    let newRow = tableBody.insertRow();
                    let noDataInfo = document.createTextNode("Tego dnia sala nie została jeszcze zarezerwowana!");
                    let info = newRow.insertCell();
                        info.colSpan = "4";
                        info.classList.add("text-center");
                        info.append(noDataInfo);
                } else {
                    for (let i = 0; i < data.length; i++) {
                        let newRow = tableBody.insertRow();
                            newRow.classList.add("text-center");
                        let id = i + 1;
                        let start_date = document.createTextNode(data[i].start_date);
                        let end_date = document.createTextNode(data[i].end_date);
                        let user = document.createTextNode(data[i].email);
    
                        let idDateCeil = newRow.insertCell();
                            idDateCeil.append(id);

                        let startDateDateCeil = newRow.insertCell();
                            startDateDateCeil.append(start_date);
                            
                        let endDateDateCeil = newRow.insertCell();
                            endDateDateCeil.append(end_date);
    
                        let userDateCeil = newRow.insertCell();
                            userDateCeil.append(user);
                    }
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });

    reservations.forEach(item => {
        item.querySelector(".deleteReservation").addEventListener("click", (e) => {
            fetch('/rezerwacja/handlers/ReservationsHandler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
            },
                body: JSON.stringify({
                    deleteReservation: true,
                    id: item.dataset.id
                }),
            })
            .then(response => {
                if (response.status = 200) {
                    item.remove();
                }
            })
            .then(data => {

            })
            .catch((error) => {
                console.error('Error:', error);
            });
        })
    });
});