<?php
// Start the session
session_start();
$_SESSION["test"] = "started";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customizable Dynamic Quiz Basic Demo</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.quiz.css')}}" />
    <style>
        body {
            min-height: 100vh;
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            font-family: 'Roboto Condensed';
        }

        .container {
            margin: 150px auto 30px auto;
            max-width: 640px;
        }

        h1 {
            text-align: center;
        }
    </style>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div id="quiz">
            <div id="quiz-header">
                <h1>Basic Quiz Demo</h1>
                <input type="hidden" id="quiz-finalscore" value="" />
            </div>
            <div id="quiz-start-screen">
                <p><a href="#" id="quiz-start-btn" class="quiz-button">Start</a></p>
            </div>
        </div>
    </div>
    <script></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.quiz.js')}}"></script>
    <script>
        var Qarray = <?php echo json_encode($QuestionsArr); ?>;
        console.log(Qarray);


        setQArr = [];

        $.each(Qarray, function(key, value) {
            itemarr = {
                'q': Qarray[key]['question'],
                'options': Qarray[key]['incorrect_answers'],
                'correctIndex': Qarray[key]['incorrect_answers'].indexOf(Qarray[key]['correct_answer']),
                'correctResponse': 'Custom correct response.',
                'incorrectResponse': 'Custom incorrect response.'
            };
            setQArr[key] = itemarr;
        });

        $('#quiz').quiz({
            //resultsScreen: '#results-screen',
            //counter: false,
            //homeButton: '#custom-home',
            counterFormat: 'Question %current of %total',
            questions: setQArr,
            finishCallback: function() {
                //var listofanswers = localStorage.getItem('listofanswers');
                document.cookie = "score=" + $('#quiz-finalscore').val() + "";
                <?php
                $_SESSION["test"] = "Done";
                ?>
                location.href = "dashboard?Status=Done";
            },
        });
    </script>
</body>

</html>