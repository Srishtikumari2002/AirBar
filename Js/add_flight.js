const add_flight = document.getElementById("add_flight");
const add_success = document.getElementById("flight_added");
const add_error = document.getElementById("flight_error");

add_flight.onclick = function () {
    $.ajax({
        url: "./Background/add_flight.php",
        type: "POST",
        data: {
            flight_no: document.getElementById('flight_no').value,
            depart_date: document.getElementById('depart_date').value,
            depart_time: document.getElementById('depart_tie').value
        },
        cache: false,
        success: function (response) {
            if(response == 0){
                add_error.classList.remove('collapse');

            }
            else if(response == 1){
                add_success.classList.remove('collapse');
            }
        }
    });
}