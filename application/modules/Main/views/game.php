<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Game</title>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="<?php echo site_url();?>assets/css/maingame.css" rel="stylesheet" type="text/css" media="only screen" />
    <link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo site_url();?>assets/css/small-device.css" />

    <script>

    /** Simple JavaScript Quiz
     * version 0.1.0
     * http://journalism.berkeley.edu
     * created by: Jeremy Rue @jrue
     *
     * Copyright (c) 2013 The Regents of the University of California
     * Released under the GPL Version 2 license
     * http://www.opensource.org/licenses/gpl-2.0.php
     * This program is distributed in the hope that it will be useful, but
     * WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
     */







    /******* No need to edit below this line *********/
     var currentquestion = 0, score2 = 0, droidchose = 0, points = 0, selected = false, score = 0, submt = true, timer = 30, started = true, picked, player1score=0, player2score=0;

    jQuery(document).ready(function ($) {


        var playerName = $('.userName').val();


        var trio = Math.round(Math.random() * (10 - 5)) + 1; // generate new time (between 3sec and 500"s)

        if (trio == 1) {
            var robotBackImage = "http://www.yomommaspace.com/graphics/backgrounds/1/20.jpg";

             
            var robotImage = "../../../assets/gameimages/1.png";


            var robotName = "Hangok";
        } else if (trio == 2) {

            var robotBackImage = "http://www.freevector.com/site_media/preview_images/FreeVector-Abstract-Background-Graphics.jpg";


            var robotImage = "../../../assets/gameimages/2.png"


            var robotName = "MegaBot";

        } else if (trio == 3) {

            var robotBackImage = "https://image.freepik.com/free-vector/abstract-colorful-background-graphic-artwork-background-vector-set_53-16856.jpg";


            var robotImage = "../../../assets/gameimages/3.png"


            var robotName = "Xenon";

        } else if (trio == 4) {

            var robotBackImage = "http://www.freevector.com/site_media/preview_images/FreeVector-Waving-Lines-Background-Graphics.jpg";


            var robotImage = "../../../assets/gameimages/4.png"


            var robotName = "Galaxy";

        } else {

            var robotBackImage = "http://www.yomommaspace.com/graphics/backgrounds/1/16.jpg";


            var robotImage = "../../../assets/gameimages/5.png"


            var robotName = "Nadiak";


        }








            var playerImage = $('.profilePic').val();

        
            var anyImage = "../../../assets/gameimages/character.png";

            var thatImage = "../../../assets/gameimages/round.png";

            var bonusImage = "../../../assets/gameimages/bonus.png";

            var winImage = "../../../assets/gameimages/win.png";

            var loseImage = "../../../assets/gameimages/lose.png";

            var drawImage = "../../../assets/gameimages/tie.png";

            var playerBackImage = $('.cover').val();


        

        var targetid = $('.game').val();


        var Difficulty = $('.difficulty').val();


        var categoryImage = "../../../assets/gameimages/logo.png"

        var tapSound = document.createElement('audio');
        var startSound = document.createElement('audio');
        var backgroundSound = document.createElement('audio');
        var badSound = document.createElement('audio');
        var goodSound = document.createElement('audio');
        var category = document.createElement('audio');
        var swishe = document.createElement('audio');
        var won = document.createElement('audio');
        var lost = document.createElement('audio');

        tapSound.setAttribute('src', '../../../assets/gameimages/TapSound.ogg');
        startSound.setAttribute('src', '../../../assets/gameimages/Start.ogg');
        backgroundSound.setAttribute('src', '../../../assets/gameimages/game_music.ogg');
        badSound.setAttribute('src', '../../../assets/gameimages/Alert.ogg');
        goodSound.setAttribute('src', '../../../assets/gameimages/Good.mp3');
        category.setAttribute('src', '../../../assets/gameimages/Swishe_banner.mp3');
        swishe.setAttribute('src', '../../../assets/gameimages/Swishe.mp3');
        won.setAttribute('src', '../../../assets/gameimages/Cheers.mp3');
        lost.setAttribute('src', '../../../assets/gameimages/Game_over_1.mp3');

    

       $.get();

        /*tapSound.addEventListener("load", function () {
            tapSound.play();
        }, true);*/



       //window.alert(window.screen.availHeight)



            /**
             * HTML Encoding function for alt tags and attributes to prevent messy
             * data appearing inside tag attributes.
             */
            function htmlEncode(value){
                return $(document.createElement('div')).text(value).html();
            }
            /**
             * This will add the individual choices for each question to the ul#choice-block
             *
             * @param {choices} array The choices from each question
             */
            function addChoices(choices){
                if(typeof choices !== "undefined" && $.type(choices) == "array"){
                    $('#choice-block').empty();



                    $(document.createElement('li')).addClass('choice choice-box1').attr('data-index', 0).css({ 'opacity': '0' }).text(choices[0]).appendTo('#choice-block');
                    $(document.createElement('lu')).addClass('choice choice-box2').attr('data-index', 1).css({ 'opacity': '0' }).text(choices[1]).appendTo('#choice-block');

                    $(document.createElement('la')).addClass('choice choice-box3').attr('data-index', 2).css({ 'opacity': '0' }).text(choices[2]).appendTo('#choice-block');
                    $(document.createElement('lo')).addClass('choice choice-box4').attr('data-index', 3).css({ 'opacity': '0' }).text(choices[3]).appendTo('#choice-block');



                    function runTimer() {
                        $('h9').empty();


                        timer--;

                        if (timer == 0) {

                            function stop() {

                                timer=10;
                            }
                            stop();

                        }



                        $(document.createElement('h9')).text(timer).appendTo('#frame');

                    }






                    function showButtons() {
                       
                        
                        $("li").animate({

                            height: '27px',
                            width: '250px',
                           


                            opacity: '1',
                        }, 200, function () {
                            // Animation complete.
                           
                            $("lu").animate({
                               
                                height: '27px',
                                width: '250px',
                               
                                opacity: '1',
                            }, 280, function () {
                              
                                $("la").animate({

                                    height: '27px',
                                    width: '250px',
                                  
                                    
                                    opacity: '1',
                                }, 380, function () {
                                    // Animation complete.
                                    
                                    $("lo").animate({
                                      
                                        height: '27px',
                                        width: '250px',
                                      


                                        opacity: '1',
                                    }, 480, function () {
                                        setupButtons();

                                        var rand = Math.round(Math.random() * (8000 - 2500)) + 1000; // generate new time (between 3sec and 500"s)

                                        myFunction = function () {
                                            DriodPicks();


                                        }
                                        myFar = setTimeout(myFunction, rand);
                                    });
                                });
                            });
                        });








                        timer = 10;

                        myVar = setInterval(runTimer, 1000);


                        $('#submitbutton').fadeTo(500, 1);

                        $('#choice-block').fadeTo(100, 1);

                        

                        $("img.any-image").animate({

                            height: '150px',
                            width: '150px',



                            opacity: '1',
                        }, 350, function () { })

                        $('h10').animate({
                            width:  '-50px'
                        }, 10000, function () {
                            selected = true;

                            if (droidchose >= 1 && selected == true) {
                                picked = $(this).attr('data-index');
                                $('.choice').off('mouseout mouseover');
                                $(this).css({ 'border-color': '#222', 'font-weight': 700, 'text-align': 'center', 'color': 'white' });
                                processQuestion(picked);
                                $('.choice').off('click');


                                $('.choice').fadeTo(400, 0);
                                clearInterval(myVar);

                                timer = 0;
                                $(this).fadeTo(10, 1);


                                $('h10').stop();


                                function gameEnd() {




                                    //window.alert('data-index');

                                    $(document.createElement('h10')).addClass('tyu').attr('id', 'tyu').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '0px', 'left': '0px' }).appendTo('#frame');


                                    // $('#submitbutton').fadeTo(1000, 0);


                                    $.getJSON(targetid, function (data) {
                                        currentquestion++;
                                        if (currentquestion == data.quiz.length) {
                                            var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(600, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                            setTimeout(endQuiz, 3000);
                                        } else {
                                            allowed = true;
                                            var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(600, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                            setTimeout(function () { showCategory(); }, 3000);


                                        }

                                    })

                                }

                                setTimeout(gameEnd, 2500);
                            }

                            });


                        //Driod loading bar starts here

                        $('h16').animate({
                            width: '-50px'
                        }, 10000, function () {


                            if (droidchose >= 1 && selected == true) {
                                picked = $(this).attr('data-index');
                                $('.choice').off('mouseout mouseover');
                                $(this).css({ 'border-color': '#222', 'font-weight': 700, 'text-align': 'center', 'color': 'white' });

                                $('.choice').off('click');



                                $('.choice').fadeTo(400, 0);
                                clearInterval(myVar);

                                timer = 0;
                                $(this).fadeTo(10, 1);


                                $('h16').stop();


                                function gameEnd() {




                                   //window.alert('data-index');

                                    $(document.createElement('h16')).addClass('iop').attr('id', 'iop').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '0px', 'left': '0px' }).appendTo('#frame');


                                    // $('#submitbutton').fadeTo(1000, 0);


                                    $.getJSON(targetid, function (data) {
                                        currentquestion++;
                                        if (currentquestion == data.quiz.length) {
                                            var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(600, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                            setTimeout(endQuiz, 3000);
                                        } else {

                                            var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(600, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                            setTimeout(function () { showCategory(); }, 3000);


                                        }

                                    })

                                }

                                setTimeout(gameEnd, 2500);

                            }
                        });



                    }


                    setTimeout(showButtons, 1500);
                }
            }










            jQuery.fn.center = function () {
                this.css("position", "fixed");
                this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                                                            $(window).scrollTop()) + "px");
                this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                                                            $(window).scrollLeft()) + "px");
                return this;
            }

            /**
             * Resets all of the fields to prepare for next question
             */
            function nextQuestion() {
                droidchose = 0;
                selected = false;

                clearInterval(myVar);
               
                $('img.init-hut').remove();
                $('#question').empty();
                // $('#explanation').empty();

               //player2 progress bar
                $(document.createElement('h16')).addClass('iop').attr('id', 'iop').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '0%', 'left': '0px' }).appendTo('#frame');


               //pprogress bar
                $(document.createElement('h10')).addClass('tyu').attr('id', 'tyu').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '0%', 'left': '0px' }).appendTo('#frame');


                $.getJSON(targetid, function (data) {
                    $('#question').text(data.quiz[currentquestion]['question']);
                })
                setTimeout(function () { $("#question").fadeTo(500, 1); }, 1000)

                $('h9').fadeTo(200, 1);
                $('h4').fadeTo(300, 1);
                $('h1').fadeTo(500, 1);

                $('h3').fadeTo(600, 1);
                $.getJSON(targetid, function (data) {
                    addChoices(data.quiz[currentquestion]['choices']);
                })
            }
            /**
             * After a selection is submitted, checks if its the right answer
             *
             * @param {choice} number The li zero-based index of the choice picked
             */
            function processQuestion(choice) {
                $.getJSON(targetid, function (data) {
                    if (data.quiz[currentquestion]['choices'][choice] == data.quiz[currentquestion]['correct']) {
                        $("#scoreboard").empty();
                        goodSound.play();
                        $('.choice').eq(choice).css({ 'background-color': '#017d46', 'text-align': 'center', 'color': 'white' });
                        //$('#explanation').html('<strong>Correct!</strong> ' + htmlEncode(quiz[currentquestion]['correct']));
                        score++;

                        player1score = Math.round(score / data.quiz.length * 100);

                        $('h18').animate({
                            height: '+=40%',
                            top: '-=90'
                        }, 200, function () {
                        })
                        //$('.choice').fadeTo(300, 1)
                        //setTimeout(function () { $('.choice').fadeTo(400, 0); }, 1000)
                        //add game score
                        $(document.createElement('h3')).text(Math.round(score / data.quiz.length * 100)).appendTo('#scoreboard');

                    } else {
                        badSound.play();
                        $('.choice').eq(choice).css({ 'background-color': '#226459', 'text-align': 'center', 'font-color': 'white' });
                        //$('#explanation').html('<strong>Incorrect.</strong> ' + htmlEncode(quiz[currentquestion]['correct']));
                        // $(document.createElement('lo')).addClass('choice choice-box').text(quiz[currentquestion]['correct']).css({ 'background-color': '#fff', 'width': '280px', 'height': '20px', 'padding': '30px 0', 'opacity': '0', 'top': '450px' }).appendTo('#choice-block');
                        if (droidchose >= 1 && selected == true) {
                            $.getJSON(targetid, function (data) {

                                if (data.quiz[currentquestion]['tag'] == 3) {
                                    //window.alert('1');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('la')).addClass('choice-box2').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'la').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                } else if (data.quiz[currentquestion]['tag'] == 1) {
                                    //window.alert('2');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('lu')).addClass('choice-box1').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'lu').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                } else if (data.quiz[currentquestion]['tag'] == 2) {
                                    //window.alert('3');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('li')).addClass('choice-box3').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'la').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                } else {
                                    //window.alert('4');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('lo')).addClass('choice-box4').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'lo').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                }

                            })
                        }

                    }

                })


            }








            /**
             * Sets up the event listeners for each button.
             */
            function setupButtons() {


                $.getJSON(targetid, function (data) {

                    target = (data.quiz[currentquestion]['tag'])
                });


                $('.choice').on('click', function () {
                    
                    picked = $(this).attr('data-index');
                    $('.choice').off('mouseout mouseover');
                    $(this).css({ 'background-color': '#226459', 'font-weight': 400, 'text-align': 'center', 'color': '#e8e8e8' });
                    processQuestion(picked);
                    $('.choice').off('click');

                   
                    
                    selected = true;






                    $(this).fadeTo(2000, 1);


                    $('h10').stop();

                    if (droidchose == 0) {
                         $('h10').fadeTo('100', 0.2, function() {

                         });

                    }else{
                         $('h16').fadeTo('100', 0.2, function() {

                         });

                    }


                    if (droidchose >= 1 && selected) {



                        clearInterval(myVar);



                        $.getJSON(targetid, function (data) {

                            if (data.quiz[currentquestion]['tag'] == 3) {
                                //window.alert('1');
                                setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('la')).addClass('choice-box2').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'la').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                            } else if (data.quiz[currentquestion]['tag'] == 1) {
                                //window.alert('2');
                                setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('lu')).addClass('choice-box1').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'lu').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                            } else if (data.quiz[currentquestion]['tag'] == 2) {
                                //window.alert('3');
                                setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('li')).addClass('choice-box3').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'la').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                            } else {
                                //window.alert('4');
                                setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('lo')).addClass('choice-box4').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'lo').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                            }

                        })



                        function gameEnd() {
                            $('tyu').empty();
                            $("img.any-image").fadeTo(100, 0);

                         


                            $.getJSON(targetid, function (data) {
                                currentquestion++;
                                if (currentquestion == data.quiz.length) {
                                    var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(300, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                    setTimeout(endQuiz, 3000);
                                } else {
                                    allowed = true;
                                    var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(300, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                    var ty = setTimeout(function () { showCategory(); }, 3000);

                                }

                            })

                        }

                        setTimeout(gameEnd, 2500);
                        // }
                        //$('#submitbutton').fadeTo(1000, 0);



                    }


                })
            }






            /**
             * Quiz ends, display a message.
             */
            function endQuiz(){

                $('#question').empty();
                $('#choice-block').empty();


                backgroundSound.pause();

                $('h9').remove();
                $('img').remove();
                $('h4').remove();
                $('h1').remove();
                $('h17').remove();
                $('h15').remove();
                $('h18').remove();
                $('h19').remove();
                $('h16').remove();
                $('h10').remove();
                $('h3').remove();

                $('#submitbutton').empty();
                $('#scoreboard').empty();

                if (player1score > player2score) {
                    won.play();

                    points = 10;
                    $.ajax({
                        url: '../givePoints/'+points,
                        type: 'GET',
                        success: function(data){
                           // alert(data);
                        },
                        error: function(data){
                           // alert("Error");
                        }
                    });

                    //any image holder
                    $(document.createElement('img')).addClass('win-image').attr('src', winImage).appendTo('#frame');

                    $("img.win-image").animate({

                        height: '280px',
                        width: '280px',
                        top: '140',


                        opacity: '1',
                    }, 350, function () { })

                 
                    
                    $(document.createElement('j')).addClass('tyup').attr('id', 'tyup').text("YOU WON").appendTo('#frame');
                } else if (player2score > player1score) {
                    lost.play();
                    
                    $(document.createElement('j')).addClass('tyup').attr('id', 'tyup').text("YOU LOSE").appendTo('#frame');
                    //any image holder
                   
                    $(document.createElement('img')).addClass('lose-image').attr('src', loseImage).appendTo('#frame');

                    $("img.lose-image").animate({

                        height: '280px',
                        width: '230px',
                        top: '140',


                        opacity: '1',
                    }, 350, function () { })

                } else {
                    $(document.createElement('j')).addClass('tyup').attr('id', 'tyup').text("A TIE").appendTo('#frame');
                    //any image holder

                    $(document.createElement('img')).addClass('draw-image').attr('src', drawImage).appendTo('#frame');

                    $("img.draw-image").animate({

                        height: '280px',
                        width: '330px',
                        top: '140',


                        opacity: '1',
                    }, 350, function () { })

                    badSound.play();
                    points = 0;
                }

                $(document.createElement('rty')).addClass('choice choice-box5').attr('data-index', 0).css({ 'opacity': '0' }).text('Not Right Now..').appendTo('#choice-block');
                $(document.createElement('last')).addClass('choice choice-box6').attr('data-index', 0).css({ 'opacity': '0' }).text('Bring it On').appendTo('#choice-block');

                   
                $("rty").animate({

                    height: '30px',
                    width: '230px',
                           


                    opacity: '1',
                }, 200, function () {
                    // Animation complete.
                           
                    $("last").animate({
                               
                        height: '30px',
                        width: '230px',
                               
                        opacity: '1',
                    }, 280, function () {})

                })
               

                $('last').on('click', function () {
                    $('last').off('mouseout mouseover');
                    $('last').css({ 'background-color': '#193e38', 'color': 'white' });
                    setTimeout(showStart, 700);

                })
                /////////////////////////////////////////////////////////////////////////////////////////////
                

                $('rty').on('click', function () {
                    $('rty').off('mouseout mouseover');
                    $('rty').css({ 'background-color': '#641111', 'color': 'white' });
                    setTimeout(showStart, 700);

                })

                // player 1 score
                $(document.createElement('y6')).text(player1score).appendTo('#frame');

                $("y6").animate({

                    left: '10%',




                    opacity: '1',
                }, 750, function () { })


                //player image holder
                $(document.createElement('img')).addClass('init-mages').attr('src', playerImage).appendTo('#frame');

                $("img.init-mages").animate({

                    left: '10%',




                    opacity: '1',
                }, 750, function () { })


                // player 2 score
                $(document.createElement('j7')).text(player2score).appendTo('#frame');

                $("j7").animate({

                    right: '10%',




                    opacity: '1',
                }, 550, function () { })


                //robot image holder
                $(document.createElement('img')).addClass('init-botes').attr('src', robotImage).appendTo('#frame');

                $("img.init-botes").animate({

                    right: '10%',




                    opacity: '1',
                }, 750, function () { })


            }





            currentquiz = -1;

        //Andriod documentation
            function DriodPicks() {
             
                    if (Difficulty == "beginner") {
                        chances = Math.round(Math.random() * (target - 0)) + 1; // generate new time (between 3sec and 500"s)
                    } else if (Difficulty == "intermediate") {
                        chances = Math.round(Math.random() * (target)) + 0; // generate new time (between 3sec and 500"s)
                    } else {
                        chances = target; // generate new time (between 3sec and 500"s)
                        //window.alert(chances)
                    }
                
                currentquiz++;
              clearInterval(myFar);

                $.getJSON(targetid, function (data) {


                    if (chances == 1) {
                        droidchose = 1;

                        $('h16').stop();

                        //$(document.createElement('li')).addClass('choice choice-box').attr('data-index', 0).css({ 'background-color': '#1b1a1a', 'width': '30px', 'height': '7px', 'padding': '15px 0', 'opacity': '1', 'top': '422px', 'bottom': '400px', 'right': '320px', 'left': '1000px' }).appendTo('#choice-block');

                    } else if (chances == 3) {
                        droidchose = 2;

                        $('h16').stop();
                        //$(document.createElement('lu')).addClass('choice choice-box').attr('data-index', 1).css({ 'background-color': '#1b1a1a', 'width': '30px', 'height': '7px', 'padding': '15px 0', 'opacity': '1', 'top': '422px', 'bottom': '400px', 'left': '340px' }).appendTo('#choice-block');
                    } else if (chances == 5) {
                        droidchose = 3;

                        $('h16').stop();
                        //$(document.createElement('la')).addClass('choice choice-box').attr('data-index', 2).css({ 'background-color': '#1b1a1a', 'width': '30px', 'height': '7px', 'padding': '15px 0', 'opacity': '1', 'top': '542px', 'bottom': '520px', 'right': '320px', 'left': '1000px' }).appendTo('#choice-block');

                    } else {
                        droidchose = 4;

                        $('h16').stop();
                        //$(document.createElement('lo')).addClass('choice choice-box').attr('data-index', 3).css({ 'background-color': '#1b1a1a', 'width': '30px', 'height': '7px', 'padding': '15px 0', 'opacity': '1', 'top': '542px', 'bottom': '520px', 'left': '340px' }).appendTo('#choice-block');
                    }


                        if (droidchose >= 1 && selected) {



                            clearInterval(myVar);



                            $.getJSON(targetid, function (data) {

                                if (data.quiz[currentquestion]['tag'] == 3) {
                                    //window.alert('1');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('la')).addClass('choice-box2').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'la').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                } else if (data.quiz[currentquestion]['tag'] == 1) {
                                    //window.alert('2');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('lu')).addClass('choice-box1').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'lu').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                } else if (data.quiz[currentquestion]['tag'] == 2) {
                                    //window.alert('3');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('li')).addClass('choice-box3').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'la').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                } else {
                                    //window.alert('4');
                                    setTimeout(function () { $('.choice').off('click'); $('.choice').fadeTo(400, 0); $(document.createElement('lo')).addClass('choice-box4').css({ 'background-color': '#017d46', 'color': 'white' }).attr('id', 'lo').text(htmlEncode(data.quiz[currentquestion]['correct'])).appendTo('#choice-block'); }, 1000);
                                }

                            })

                            
                            function gameEnd() {
                                $('tyu').empty();
                                $('iop').empty();
                               
                                $("img.any-image").fadeTo(100, 0);


                                $.getJSON(targetid, function (data) {
                                    currentquestion++;
                                    if (currentquestion == data.quiz.length) {
                                        var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(600, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                        setTimeout(endQuiz, 3000);
                                    } else {
                                        allowed = true;
                                        var js = setTimeout(function () { $("#question").fadeTo(500, 0); $('.choice').fadeTo(600, 0); $('la').fadeTo(300, 0); $('lo').fadeTo(300, 0); $('lu').fadeTo(300, 0); $('lu').fadeTo(300, 0); }, 2500);
                                        var ty = setTimeout(function () { showCategory(); }, 3000);

                                    }

                                })

                            }

                            setTimeout(gameEnd, 2500);
                        }



                    if (droidchose == data.quiz[currentquestion]['tag']) {
                        $("#otherboard").empty();
                        
                        score2++;
                        $(document.createElement('h17')).text(Math.round(score2 / data.quiz.length * 100)).appendTo('#otherboard');

                        $('h19').animate({
                            height: '+=60%',
                            top: '-=90'
                        }, 200, function () {
                        })
                        goodSound.play();
                        player2score = Math.round(score2 / data.quiz.length * 100);
                    } else {
                        badSound.play();
                    }
                })





            }



            /**
             * Runs the first time and creates all of the elements for the quiz
             */
            function init(){
                started = false;

               
                    backgroundSound.play();


                $('img.init-hut').remove();

                //add title and player details
                if (typeof playerName !== "undefined" && $.type(playerName) === "string") {

                    $(document.createElement('h1')).text(playerName).appendTo('#frame');

                    $("h1").animate({
                        opacity: 1,
                        left: "+=50",

                    }, 500, function () {
                        // Animation complete.
                    });

                    //player image holder
                    $(document.createElement('img')).addClass('user-image').attr('src', playerImage).appendTo('#frame');










                    //add computer details
                    $(document.createElement('h15')).text(robotName).appendTo('#frame');

                    $("h15").animate({
                        opacity: 1,
                        right: "+=50",

                    }, 500, function () {
                        // Animation complete.
                    });
                    //robot image
                    $(document.createElement('img')).addClass('robot-image').attr('src', robotImage).appendTo('#frame');

                } else {
                    $(document.createElement('h1')).text("Quiz").appendTo('#frame');
                }
                //add pager and questions
                $.getJSON(targetid, function (data) {
                    if (typeof data.quiz !== "undefined" && $.type(data.quiz) === "array") {

                        //myVar = setInterval(function () { runTimer() }, 1000);
                        //add pager
                       // $(document.createElement('img')).addClass('question-image').attr('id', 'question-image').attr('src', quiz[0]['image']).attr('alt', htmlEncode(quiz[0]['question'])).appendTo('#frame');
                        // $(document.createElement('p')).addClass('pager').attr('id','pager').text('Question 1 of ' + quiz.length).appendTo('#frame');
                        //add first question
                        $.getJSON(targetid, function (data) {
                            $(document.createElement('h2')).addClass('question').attr('id', 'question').text(data.quiz[0]['question']).appendTo('#frame');
                            //add image if present
                        })


                        //any image holder
                        $(document.createElement('img')).addClass('any-image').attr('src', anyImage).appendTo('#frame');

                        $("img.any-image").animate({

                            height: '150px',
                            width: '150px',



                            opacity: '1',
                        }, 350, function () { })

                       // $(document.createElement('h6')).addClass('explanation').css({ 'font-size': '18px',  'text-align': 'center', 'font': '18px', 'font-weight': '800', 'opacity': '1', 'right': '-30px', 'top': '300px' }).attr('id', 'explanation').html('&nbsp;').insertAfter('#question');

                        //questions holder
                        $(document.createElement('ul')).attr('id', 'choice-block').appendTo('#frame');
                        //add timer holder
                        //$(document.createElement('h9')).attr('id', 'submitbutton').appendTo('#frame');
                        //add choices
                       

                        $(document.createElement('h3')).attr('id', 'scoreboard').appendTo('#frame');

                        $(document.createElement('h17')).attr('id', 'otherboard').appendTo('#frame');


                        $.getJSON(targetid, function (data) {
                            addChoices(data.quiz[0]['choices']);
                        })
                        $.getJSON(targetid, function (data) {
                            //player 1 score
                            $(document.createElement('h3')).text(Math.round(score / data.quiz.length * 100)).appendTo('#scoreboard');
                            $('h3').fadeTo(200, 1);

                            //player1 score bar
                            $(document.createElement('h18')).addClass('uii').attr('id', 'uii').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '640px', 'left': '0px' }).appendTo('#frame');


                            //player 2 score
                            $(document.createElement('h17')).text(Math.round(score2 / data.quiz.length * 100)).appendTo('#otherboard');
                            $('h17').fadeTo(200, 1);

                            //player2 score bar
                            $(document.createElement('h19')).addClass('iop').attr('id', 'iop').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '640px', 'right': '0px' }).appendTo('#frame');

                        })
                        //add time left
                        $(document.createElement('h4')).text("TIME LEFT").appendTo('#frame');

                        //$(document.createElement('div')).addClass('choice-box').attr('id', 'submitbutton').text('Check Answer').css({'font-weight':700,'color':'#222','padding':'30px 0'}).appendTo('#frame');

                        //$(document.createElement('h3')).css({ 'text-align': 'bottom', 'font-size': '2em', 'top': '200px', 'right': '200px' }).text(Math.round(score / quiz.length * 100)).insertAfter('#question');

                        //add timer count
                        $(document.createElement('h9')).text(timer).appendTo('#frame');


                        $('#scoreboard').fadeTo(3000, 1);
                        $('h9').fadeTo(700, 1);
                        $('h4').fadeTo(400, 1);
                        $('h1').fadeTo(1000, 1);

                        //player2 progress bar
                        $(document.createElement('h16')).addClass('iop').attr('id', 'iop').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '0%', 'left': '0px' }).appendTo('#frame');


                        //pprogress bar
                        $(document.createElement('h10')).addClass('tyu').attr('id', 'tyu').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'top': '0%', 'left': '0px' }).appendTo('#frame');




                        var quest = setTimeout(function(){ $("#question").fadeTo(600, 1)}, 1000);
                        $('#submitbutton').fadeTo(1500, 1);





                    }
                })
            }





            function showCategory() {

                //add pager and questions

                //remove hud
                $('h16').remove();
                $('h10').remove();
                $("img.any-image").fadeTo(10, 0);
               
                //add player name and details
                //$(document.createElement('h')).addClass('matt').attr('id', 'matt').css({ 'font-size': '6em Gotham SSm B', 'opacity': '0', 'top': '170px', 'left': '0px' }).text('GENERAL KNOWLEGDE').appendTo('#frame');
              

                category.play();
                //category image holder
                



                //add first question
                $.getJSON(targetid, function (data) {
                    var required = currentquestion;
                    if (currentquestion >= 0 ) {
                        required++;
                        $('j.poer').empty();
                       
                        //any image holder
                       

                        $(document.createElement('j')).addClass('poer').attr('id', 'poer').text("ROUND " + required).appendTo('#frame');
                        $("j.poer").animate({

                            top: '400px',




                            opacity: '1',
                        }, 550, function () { })
                    }

                    if (required == 1) {
                        required++;
                        $('j.poer').empty();
                        $(document.createElement('img')).addClass('that-image').attr('src', thatImage).appendTo('#frame');

                        $("img.that-image").animate({

                            height: '230px',
                            width: '230px',
                            top: '140',


                            opacity: '1',
                        }, 400, function () { })

                        //any image holder
                       
                        $(document.createElement('j')).addClass('poer').attr('id', 'poer').text("FIRST ROUND").appendTo('#frame');
                        $("j.poer").animate({

                            top: '400px',




                            opacity: '1',
                        }, 550, function () { })
                    } else if (required == data.quiz.length) {
                        $('j.poer').empty();
                      
                        $(document.createElement('j')).addClass('poer').attr('id', 'poer').text("BONUS ROUND").appendTo('#frame');
                        //any image holder
                        $(document.createElement('img')).addClass('bonus-image').attr('src', bonusImage).appendTo('#frame');

                        $("j.poer").animate({

                            top: '400px',




                            opacity: '1',
                        }, 550, function () { })

                        $("img.bonus-image").animate({

                            height: '230px',
                            width: '230px',
                            top: '140',


                            opacity: '1',
                        }, 400, function () { })
                    }

                   

                })




                    // Animation complete.
                           
              
                    

                setTimeout(function () {

                    //$('#pager').empty();
                    $('wert').fadeTo(200, 0);
                    $("img.bonus-image").animate({

                        height: '30px',
                        width: '30px',
                        top: '-170px',


                        opacity: '0',
                    }, 550, function () { })
                    $("img.that-image").animate({

                        height: '30px',
                        width: '30px',
                        top: '-170px',


                        opacity: '0',
                    }, 550, function () { })
                 
                    $("j.poer").animate({

                        top: '900px',




                        opacity: '1',
                    }, 550, function () { })



                    setTimeout(function () {
                        if (started == true) {
                            init();
                        
                        
                        } else {
                       
                     
                            nextQuestion();

                        }
                    }, 300)

                }, 2500);
            }










            //game starts here

            function showStart() {
                $('#explanation').empty();
                $('#question').empty();
                $('#frame').empty();


                

                trio = Math.round(Math.random() * (10 - 5)) + 1; // generate new time (between 3sec and 500"s)

                $('#submitbutton').empty();
                $('#scoreboard').empty();

                //alert (data.item1+" "+data.item2+" "+data.item3); //further debug
                currentquestion = 0, score2 = 0, droidchose = 0, selected = false, score = 0, submt = true, timer = 10, started = true, picked, player1score=0, player2score=0;

               

                

                //add waiting text
                $(document.createElement('y')).text('GATHERING QUESTIONS...').appendTo('#frame');

                setTimeout(function () {

                 
                    $('y').remove();
                    //player backimage holder
                    $(document.createElement('img')).addClass('bac-mage').attr('src', playerBackImage).appendTo('#frame');

                    //add player name and details
                    $(document.createElement('i')).addClass('matt').attr('id', 'matt').css({ 'font-size': '4em Gotham SSm B', 'opacity': '0', 'top': '80px' }).text(playerName).appendTo('#frame');

                    //player image holder
                    $(document.createElement('img')).addClass('init-mage').attr('src', playerImage).appendTo('#frame');



                    //robot backimage holder
                    $(document.createElement('img')).addClass('back-rob').attr('src', robotBackImage).appendTo('#frame');

                    //add robot name and details
                    $(document.createElement('g')).addClass('glat').attr('id', 'glat').css({ 'font-size': '4em Gotham SSm B', 'opacity': '0', 'top': '620px' }).text(robotName).appendTo('#frame');

                    //robot image holder
                    $(document.createElement('img')).addClass('init-bot').attr('src', robotImage).appendTo('#frame');

                    //add line
                    $(document.createElement('h8')).addClass('wert').attr('id', 'wert').css({ 'font-size': '2em Gotham SSm B', 'opacity': '1', 'width': '0px', 'left': '0px' }).appendTo('#frame');



                    //$(document.createElement('span')).addClass('circle-edu').attr('id', 'circle-edu').appendTo('#frame');
                    $(document.createElement('h30')).addClass('cyc').attr('id', 'cyc').appendTo('#frame');
                    //logo
                    $(document.createElement('us')).appendTo('#frame');

                    setTimeout(function () {
                        startSound.play();
                        $("h8").animate({


                            width: '3000px',

                            opacity: '1',

                        }, 800);
                    }, 600)



                    function animatthis() {


                        $("h30").animate({


                            width: '125px',
                            height: '125px',
                            
                            opacity: '1'

                        }, 800, function () {

                            $("h30").animate({


                                width: '100px',
                                height: '100px',
                                
                                opacity: '1'

                            }, 800, function () {
                                animatthis();

                            });
                        });

                    }
                    animatthis();


                    $("i.matt").animate({
                        opacity: 1,
                        right: "+=70%",
                       
                    }, 1000, function () {
                        // Animation complete.
                    });

                    $("g.glat").animate({
                        opacity: 1,
                        left: "+=70%",
                        
                    }, 1000, function () {
                        // Animation complete.
                    });
                }, 3000)


                

                

             


                
               
                setTimeout(function () {

                    //$('#pager').empty();
                    swishe.play();
                    $('h30').stop();
                    $('#loader').fadeTo(10, 0);
                    $("h30").animate({


                        width: '100%',
                        height: '190%',
                        top: '-240px',
                        bottom: '0px',

                      
                    
                        left: '-0px',
                        right: '0px',
                      
                        borderRadius: '550px',
                        opacity: '1',


                    }, 900, function () {



                        $('h30').fadeTo(300, 0);


                        setTimeout(function () { $('h30').remove(); showCategory() }, 500);
                    });


                }, 10000);

                setTimeout(function () {
                    $('#wert').remove();
                    $('i.matt').remove();
                    $('us').remove();
                    $("img.init-mage").remove();
                    $("img.bac-mage").remove();
                    $("img.back-rob").remove();
                    $("img.init-bot").remove();
                    $("g.glat").remove();
                    $('y').remove();
                }, 10000)
            }

            showStart();

            $('#frame').center();




    });
    </script>

</head>
<body>
    <input class="userName" type="hidden" value="<?php echo $name ?>">
    <input class="game" type="hidden" value="<?php echo $gameJson ?>">
    <input class="cover" type="hidden" value="<?php echo $coverPhoto ?>">
    <input class="profilePic" type="hidden" value="<?php echo $profilePic ?>">
    <input class="gamePic" type="hidden" value="<?php echo $gamePic ?>">
    <input class="difficulty" type="hidden" value="<?php echo $difficulty ?>">
    <div id="frame"></div>

   
</body>
</html>