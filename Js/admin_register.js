var admin_log_questions = [
    { question: "What's your full name?", type: "text" },
    { question: "What's your email?", pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/ },
    { question: "Create your password", type: "password" }
  ];
  
  /**********    
    Credits for the design go to XavierCoulombeM
    https://dribbble.com/shots/2510592-Simple-aregister-form 
   
   **********/
  
function admin_aregister_animate() {

  var tTime = 100  // transition transform time from #aregister in ms
  var wTime = 200  // transition width time from #aregister in ms
  var eTime = 1000 // transition width time from aril in ms

  // init
  // --------------
  var position = 0

  putQuestion()

  arnext.addEventListener('click', validate)
  arif.addEventListener('keyup', function (e) {
    transform(0, 0) // i.e. hack to redraw
    if (e.keyCode == 13) validate()
  })

  // functions
  // --------------

  // load the next question
  function putQuestion() {
    aril.innerHTML = admin_log_questions[position].question
    arif.value = ''
    arif.type = admin_log_questions[position].type || 'text'
    arif.focus()
    showCurrent()
  }

  // when all the admin_log_questions have been answered
  function done() {

    // remove the box if there is no next question
    aregister.className = '';
    aregister.classList.add('close');

    $.ajax({
      url: "./Background/aregister_submit.php",
      type: "POST",
      data: {
        name: admin_log_questions[0].value,
        email: admin_log_questions[1].value,
        psd: admin_log_questions[2].value
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
          pre.appendChild(document.createTextNode('Welcome ' + admin_log_questions[0].value + '!'));
          pre.appendChild(document.createTextNode("\nPlease Login to continue."));
        }
        setTimeout(function () {
          aregister.parentElement.appendChild(h1)
          setTimeout(function () { h1.style.opacity = 5 }, 50)
        }, eTime)
      }
    });
  }

  // when submitting the current question
  function validate() {

    // set the value of the field into the array
    admin_log_questions[position].value = arif.value

    // check if the pattern matches
    if (!arif.value.match(admin_log_questions[position].pattern || /.+/)) wrong()
    else ok(function () {

      if (position == 1) {
        Url = "./Background/log_mail_submit.php"
        detail = { email: admin_log_questions[1].value }

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
              arprogress.style.width = ++position * 100 / admin_log_questions.length + 'vw'

              // if there is a new question, hide current and load next
              if (admin_log_questions[position]) hideCurrent(putQuestion)
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
        arprogress.style.width = ++position * 100 / admin_log_questions.length + 'vw'

        // if there is a new question, hide current and load next
        if (admin_log_questions[position]) hideCurrent(putQuestion)
        else hideCurrent(done)
      }
    })

  }

  // helper
  // --------------

  function hideCurrent(callback) {
    aric.style.opacity = 0
    arip.style.transition = 'none'
    arip.style.width = 0
    setTimeout(callback, wTime)
  }

  function showCurrent(callback) {
    aric.style.opacity = 1
    arip.style.transition = ''
    arip.style.width = '100%'
    setTimeout(callback, wTime)
  }

  function transform(x, y) {
    aregister.style.transform = 'translate(' + x + 'px ,  ' + y + 'px)'
  }

  function ok(callback) {
    aregister.className = '';
    aregister.classList.add('mainform');
    setTimeout(transform, tTime * 0, 0, 10)
    setTimeout(transform, tTime * 1, 0, 0)
    setTimeout(callback, tTime * 2)
  }

  function wrong(callback) {
    aregister.className = ''
    aregister.classList.add('mainform');
    aregister.classList.add('wrong');
    for (var i = 0; i < 6; i++) // shaking motion
      setTimeout(transform, tTime * i, (i % 2 * 2 - 1) * 20, 0)
    setTimeout(transform, tTime * 6, 0, 0)
    setTimeout(callback, tTime * 7)
  }

}

var areg_btn = document.getElementById("admin-reg-btn");
areg_btn.addEventListener("click", admin_aregister_animate());