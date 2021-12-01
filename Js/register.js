var questions = [
  { question: "What's your full name?", type: "text" },
  { question: "What's your email?", pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/ },
  { question: "Create your password", type: "password" }
];

/**********    
  Credits for the design go to XavierCoulombeM
  https://dribbble.com/shots/2510592-Simple-register-form 
 
 **********/

function register_animate() {

  var tTime = 100  // transition transform time from #register in ms
  var wTime = 200  // transition width time from #register in ms
  var eTime = 1000 // transition width time from ril in ms

  // init
  // --------------
  var position = 0

  putQuestion()

  rnext.addEventListener('click', validate)
  rif.addEventListener('keyup', function (e) {
    transform(0, 0) // i.e. hack to redraw
    if (e.keyCode == 13) validate()
  })

  // functions
  // --------------

  // load the next question
  function putQuestion() {
    ril.innerHTML = questions[position].question
    rif.value = ''
    rif.type = questions[position].type || 'text'
    rif.focus()
    showCurrent()
  }

  // when all the questions have been answered
  function done() {

    // remove the box if there is no next question
    register.className = '';
    register.classList.add('close');

    $.ajax({
      url: "./Background/register_submit.php",
      type: "POST",
      data: {
        name: questions[0].value,
        email: questions[1].value,
        psd: questions[2].value
      },
      cache: false,
      success: function (response) {
        var h1 = document.createElement('h1')
        var pre = document.createElement("pre")
        h1.appendChild(pre)

        if (response == 0) {
          // add the h1 at the end with the welcome text
          pre.appendChild(document.createTextNode("Registration failed due to network issues.\n Please try again."));
          location.reload();
        }
        else {
          // add the h1 at the end with the welcome text
          pre.appendChild(document.createTextNode('Welcome ' + questions[0].value + '!'));
          pre.appendChild(document.createTextNode("\nPlease Login to continue."));
        }
        setTimeout(function () {
          register.parentElement.appendChild(h1)
          setTimeout(function () { h1.style.opacity = 5 }, 50)
        }, eTime)
      }
    });
  }

  // when submitting the current question
  function validate() {

    // set the value of the field into the array
    questions[position].value = rif.value

    // check if the pattern matches
    if (!rif.value.match(questions[position].pattern || /.+/)) wrong()
    else ok(function () {

      if (position == 1) {
        Url = "./Background/log_mail_submit.php"
        detail = { email: questions[1].value }

        $.ajax({
          url: Url,
          type: "POST",
          data: detail,
          cache: false,
          success: function (res) {

            if (res == 0) {
              alert("Unable to reach the server.\n Please try again.")
            }
            else if (res == 2) {
              // set the progress of the background
              rprogress.style.width = ++position * 100 / questions.length + 'vw'

              // if there is a new question, hide current and load next
              if (questions[position]) hideCurrent(putQuestion)
              else hideCurrent(done)
            }
            else {
              wrong()
              alert("User already exist.");
            }

          }
        });
      }
      else {
        // set the progress of the background
        rprogress.style.width = ++position * 100 / questions.length + 'vw'

        // if there is a new question, hide current and load next
        if (questions[position]) hideCurrent(putQuestion)
        else hideCurrent(done)
      }
    })

  }

  // helper
  // --------------

  function hideCurrent(callback) {
    ric.style.opacity = 0
    rip.style.transition = 'none'
    rip.style.width = 0
    setTimeout(callback, wTime)
  }

  function showCurrent(callback) {
    ric.style.opacity = 1
    rip.style.transition = ''
    rip.style.width = '100%'
    setTimeout(callback, wTime)
  }

  function transform(x, y) {
    register.style.transform = 'translate(' + x + 'px ,  ' + y + 'px)'
  }

  function ok(callback) {
    register.className = '';
    register.classList.add('mainform');
    setTimeout(transform, tTime * 0, 0, 10)
    setTimeout(transform, tTime * 1, 0, 0)
    setTimeout(callback, tTime * 2)
  }

  function wrong(callback) {
    register.className = ''
    register.classList.add('mainform');
    register.classList.add('wrong');
    for (var i = 0; i < 6; i++) // shaking motion
      setTimeout(transform, tTime * i, (i % 2 * 2 - 1) * 20, 0)
    setTimeout(transform, tTime * 6, 0, 0)
    setTimeout(callback, tTime * 7)
  }

}

var reg_btn = document.getElementById("reg-btn");
window.addEventListener("click", register_animate());