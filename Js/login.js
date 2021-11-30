var log_questions = [
    { question: "What's your email?", pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/ },
    { question: "Enter your password", type: "password" }
];

// login popup content

/**********    
  Credits for the design go to XavierCoulombeM
  https://dribbble.com/shots/2510592-Simple-login-form 
 
 **********/
function login_animate() {

    var tTime = 100  // transition transform time from #login in ms
    var wTime = 200  // transition width time from #login in ms

    // init
    // --------------
    var position = 0

    putQuestion()

    lnext.addEventListener('click', validate)
    lif.addEventListener('keyup', function (e) {
        transform(0, 0) // i.e. hack to redraw
        if (e.keyCode == 13) validate()
    })

    // functions
    // --------------

    // load the next question
    function putQuestion() {
        lil.innerHTML = log_questions[position].question
        lif.value = ''
        lif.type = log_questions[position].type || 'text'
        lif.focus()
        showCurrent()
    }

    // when all the log_questions have been answered
    function done() {

        // remove the box if there is no next question

        $.ajax({
            url: "./Background/login_submit.php",
            type: "POST",
            data: {
                email: log_questions[0].value,
                psd: log_questions[1].value
            },
            cache: false,
            success: function (res) {

                if (res == 0) {
                    alert("Unable to reach the server.\n Please try again.")
                    position = 0;
                    hideCurrent(putQuestion);
                }
                else if (res == 1) {
                    login.className = '';
                    login.classList.add('close');
                    location.reload();
                }
                else if (res == 2) {
                    alert("Incorrect Password!")
                    position = 0;
                    hideCurrent(putQuestion);
                }
                else {
                    alert("Please create your account on airbar.")
                }
                
            }
        });

    }

    // when submitting the current question
    function validate() {

        // set the value of the field into the array
        log_questions[position].value = lif.value

        // check if the pattern matches
        if (!lif.value.match(log_questions[position].pattern || /.+/)) wrong()
        else ok(function () {

            // set the progress of the background
            lprogress.style.width = ++position * 100 / log_questions.length + 'vw'

            // if there is a new question, hide current and load next
            if (log_questions[position]) hideCurrent(putQuestion)
            else hideCurrent(done)

        })

    }

    // helper
    // --------------

    function hideCurrent(callback) {
        lic.style.opacity = 0
        lip.style.transition = 'none'
        lip.style.width = 0
        setTimeout(callback, wTime)
    }

    function showCurrent(callback) {
        lic.style.opacity = 1
        lip.style.transition = ''
        lip.style.width = '100%'
        setTimeout(callback, wTime)
    }

    function transform(x, y) {
        login.style.transform = 'translate(' + x + 'px ,  ' + y + 'px)'
    }

    function ok(callback) {
        login.className = '';
        login.classList.add('mainform');
        setTimeout(transform, tTime * 0, 0, 10)
        setTimeout(transform, tTime * 1, 0, 0)
        setTimeout(callback, tTime * 2)
    }

    function wrong(callback) {
        login.className = ''
        login.classList.add('mainform');
        login.classList.add('wrong');
        for (var i = 0; i < 6; i++) // shaking motion
            setTimeout(transform, tTime * i, (i % 2 * 2 - 1) * 20, 0)
        setTimeout(transform, tTime * 6, 0, 0)
        setTimeout(callback, tTime * 7)
    }
}

var log_btn = document.getElementById("log-btn");

log_btn.addEventListener("click", login_animate());