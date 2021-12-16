const add_passenger = document.getElementById('add_passenger_btn');
var nop = 1;

add_passenger.onclick = function(){
    nop++;
    var new_data_row = '<div style="display:flex;justify-content: space-between;"><div style="width:60%;" class="form"><input type="text" name="passenger'+nop+'" required autocomplete="off"><label for="passenger'+nop+'" class="label-name"><span class="content-name">Passenger Full Name</span></label></div><div style="width:30%;" style="display: flex; justify-content: flex-end;" class="form"><input type="number" name="age_passenger'+nop+'" required autocomplete="off"><label for="age_passenger'+nop+'" class="label-name"><span class="content-name">Passenger Age</span></label></div></div>';
    $('#passenger_detail_area').append(new_data_row);
}
