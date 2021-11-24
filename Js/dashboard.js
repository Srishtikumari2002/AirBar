const edit_profile = document.getElementsByClassName("profile-button")[0];
const pname = document.getElementById("profile-name");
const pemail = document.getElementById("profile-email");
const Submit = document.getElementsByClassName("profile-button")[1];

pname.disabled = true;
pemail.disabled = true;

edit_profile.onclick = function () {
    pname.disabled = false;
    pemail.disabled = false;
    Submit.style.display = "block";
    edit_profile.style.display = "none";
}

Submit.onclick = function () {
    pname.disabled = true;
    pemail.disabled = true;
    Submit.style.display = "none";
    edit_profile.style.display = "block";

    $.ajax({
        url: "Background/update_submit.php",
        type: "POST",
        data: {
            name: pname.value,
            email: pemail.value
        },
        cache: false,
        success: function (response) {

            if (response == 0) {
                alert("Updation failed due to network issues.\n Please try again.")
            }
        }
    });
}