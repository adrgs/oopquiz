<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>OOP Quiz</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 50px;
        }

        pre {
            font-size: 12px;
            padding:15px!important;
        }

        .prob-box {
            text-align:center;
            padding: 3px;
            min-width:33px;
            background-color: whitesmoke;
            display: inline-block;
            border: 1px solid #ccc;
            margin: 3px;
        }

        .prob-active:hover {
            color:white;
        }

        .prob-wrong:hover {
            color:white;
        }

        .prob-solved:hover {
            color:white;
        }

        .prob-solved {
            background-color: #5cb85c;
            border-color: #4cae4c;
            color:white;
        }

        .prob-wrong {
            background-color: #d9534f;
            border-color: #d43f3a;
            color:white;
        }

        .prob-active {
            background-color: #0099CC;
            border-color: #00688B;
            color:white;
        }

        .navbar-inverse {
            background-color: whitesmoke;
            border-color: #ccc;
            color:black;
        }

        .navbar-inverse .navbar-brand {        
            color:black;
        }
        .navbar-inverse .navbar-brand:hover {        
            color:#444;
        }
        .navbar-inverse .navbar-brand:focus {        
            color:black;
        }
        .form-control[disabled] {
            cursor: auto;
        }

        .btn-header{
            position:relative;
            top:8px;
            float:right;
            margin-left:5px;
            margin-right:5px;
        }

        @media (min-width: 1400px) { 
            .container {
                width: 1360px;
            }
         }

         .github-link {
             opacity:30%;
             -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            /* ...and now for the proper property */
            transition:.5s;
         }

         .github-link:hover {
             opacity:100%;
         }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header" style="min-width:100%">
            <a class="navbar-brand" href="#">OOP Quiz</a>
            <button type="button" class="btn btn-danger btn-header" id="nucompBtn2">👎</button>
            <button type="button" class="btn btn-success btn-header" id="compBtn2">👌</button>

            <span style="float:right" class="navbar-brand" href="#"><span style="color:green"><?php $ctr=0; foreach($_SESSION['solved'] as $prob) {if ($prob=='solved') $ctr+=1;}; echo $ctr; ?></span> / <span style="color:red"><?php $ctr=0; foreach($_SESSION['solved'] as $prob) {if ($prob=='wrong') $ctr+=1;}; echo $ctr; ?></span> / <?php echo count($probleme)-count($_SESSION['solved']); ?></span>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col col-lg-12">
        <h1>Problema <?php echo $problema_id; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-7">
        <pre class="prettyprint"><?php echo htmlentities(file_get_contents('surse/prob'.$problema_id.'.cpp')); ?></pre>
        <button type="button" class="btn btn-success" id="compBtn1">Compileaza</button>
        <button style="float:right" type="button" class="btn btn-danger" id="nucompBtn1">Nu compileaza</button>
        </div>
        <div class="col col-lg-5">
            <h3 id="rezRaspuns"></h3>
            <div id="raspCorect" style="display:none">
                <h4>Ce afiseaza programul respectiv?</h4>
                <textarea style="height:300px;max-width:100%;margin-bottom:20px" class="form-control" id="afisTxt" style=></textarea>
                <button class="btn btn-primary" id="afisBtn">Trimite raspuns</button>
            </div>
            <div id="raspGresit" style="display:none">
                <h4>Eroarea:</h4>
                <pre class="alert alert-danger" id="errProb" role="alert"></pre>
                <h4>Modifica sursa astfel incat sa compileze:</h4>
                <textarea style="height:300px;max-width:100%;margin-bottom:20px" class="form-control" id="errTxt"><?php echo htmlentities(file_get_contents('surse/prob'.$problema_id.'.cpp')); ?></textarea>
                <div id="errRasp"></div>
                <button  class="btn btn-primary" id="errBtn">Trimite sursa</button>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:50px;margin-bottom:30px">
        <div class="col col-lg-12" style="text-align:center">
            <?php foreach ($probleme as $prob) { ?>
<a id="prob<?php echo $prob; ?>" class="prob-box<?php if ($_SESSION['solved'][$prob] == 'solved') echo ' prob-solved'; ?><?php if ($_SESSION['solved'][$prob] == 'wrong') echo ' prob-wrong'; ?><?php if ($prob==$problema_id) echo ' prob-active'; ?>" href="/index.php?id=<?php echo $prob; ?>"><?php echo $prob; ?></a>
            <?php } ?>

        </div>
        <button style="margin-top:30px;margin-left:10px" class="btn btn-default" onclick="sterge_raspunsuri()">Sterge raspunsuri</button>
    </div>
    <div class="row" style="margin-top:30px;margin-bottom:20px">
        <div class="col col-lg-12" style="text-align:center">
                <a class="github-link" href="https://github.com/adrgs/oopquiz" target="_blank"><img src="https://image.flaticon.com/icons/svg/25/25231.svg" style="max-width:24px;height:auto;" /></a>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>

<script>

var id_problema = '<?php echo $problema_id; ?>';

function next() {
    var n = Number(id_problema);
    var urm = -1;
    var nextbest = -1;
    for (var i=n+1;i<130;i++) {
        if ($("#prob" + i)[0]) {
            if (nextbest==-1) nextbest = i;
            if ($("#prob" + i)[0].classList.length==1) {
                urm = i;
                break;
            }
        }
    }
    if (urm==-1) {
        for (var i=0;i<n;i++) {
            if ($("#prob" + i)[0]) {
                if (nextbest==-1) nextbest = i;
                if ($("#prob" + i)[0].classList.length==1) {
                    urm = i;
                    break;
                }
            }
        }
    }

    if (urm == -1) {
        urm = nextbest;
    }
    document.location='/index.php?id='+urm;
}

function sterge_raspunsuri() {
    document.cookie = 'PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    document.location = '/index.php?id=2';
}

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }

$(function () {

    var corect_buffer = '';

    $("#errBtn").bind('click', function () {

        var rasp = $("#errTxt").val().trim();

        $.ajax({
            type:'POST',
            url:'/index.php',
            data: {'id':id_problema, 'data':rasp, 'action':'checkcompile'}, 
            xhrFields: {
                withCredentials: true
            },
            success: function(d) {
                if (d=="ok") {
                    $("#errRasp").html('');
                    $("#errTxt")[0].disabled = true;
                    $("#errBtn").remove();
                    $("#raspGresit").append('<h3 style="color:green;">Corect</h3><button  class="btn btn-primary" onclick="next()">Problema urmatoare</textarea>');
                } else {
                    $("#errRasp").html('<h3 style="color:red;">Gresit</h3><pre class="alert alert-'+(d=="ok" ? 'success':'danger')+'">'+ escapeHtml(d.trim()) +'</pre>')
                }
            }
            });

    });

    $("#afisBtn").bind('click', function () {
            var rasp = $("#afisTxt").val().trim();

            $.ajax({
            type:'POST',
            url:'/index.php',
            data: {'id':id_problema, 'data':rasp, 'action':'checkrez'}, 
            xhrFields: {
                withCredentials: true
            },
            success: function(d) {
                $("#raspCorect").html('');
                //if (rasp==correct_buffer.trim()) {
                if (d=="ok") {
                    $("#raspCorect").append('<h3 style="color:green">Corect.</h3>');
                } else {
                    $("#raspCorect").append('<h3 style="color:red">Gresit.</h3>');
                }
                $("#raspCorect").append('<h4>Raspunsul tau:</h4>');
                //$("#raspCorect").append('<pre class="alert alert-'+(rasp==correct_buffer.trim() ? 'success':'danger')+'">'+ escape(rasp) +'</pre>')
                $("#raspCorect").append('<pre class="alert alert-'+(d=="ok" ? 'success':'danger')+'">'+ escapeHtml(rasp.trim()) +'</pre>')

                $("#raspCorect").append('<h4>Raspunsul corect:</h4>');
                $("#raspCorect").append('<pre class="alert alert-success">'+ escapeHtml(correct_buffer.trim()) +'</pre>')

                $("#raspCorect").append('<button  class="btn btn-primary" onclick="next()">Problema urmatoare</textarea>');
            }});
    });

    function trimite_rez_comp(rez) {
        var data = {'id':id_problema, 'rez':(rez == true ? 'da' : 'nu'),'action':'check'};
        console.log(data);

        $('#nucompBtn1').hide();
        $('#nucompBtn2').hide();
        $('#compBtn1').hide();
        $('#compBtn2').hide();

        $.ajax({
            type:'POST',
            url:'/index.php',
            data: data, 
            xhrFields: {
                withCredentials: true
            },
            success: function (d) {
                var comp=false;
                if (d=='ok') {
                    $("#rezRaspuns").html('Raspuns <span style="color:green">corect</span>. Programul ' + (rez==true ? '': 'nu ') + 'compileaza.');
                    comp = rez;

                    if (rez==true) {
                        $("#raspCorect").show();
                    } else {
                        $("#raspGresit").show();
                    }

                } else {
                    comp = !rez;
                    $("#rezRaspuns").html('Raspuns <span style="color:red">gresit</span>. Programul ' + (rez==false ? '': 'nu ') + 'compileaza.');

                    if (rez==false) {
                        $("#raspCorect").show();
                    } else {
                        $("#raspGresit").show();
                    }
                }

                $.ajax({
                type:'POST',
                url:'/index.php',
                data: {'id':id_problema,'action':'details'}, 
                xhrFields: {
                    withCredentials: true
                },
                success: function (d) {
                    if (comp==false) {
                        $('#errProb').text(d);
                    } else {
                        correct_buffer = d;
                    }
                }
                });
            }
        });
    }

    $('#nucompBtn1').bind('click', function () {
        trimite_rez_comp(false);
    });
    $('#nucompBtn2').bind('click', function () {
        trimite_rez_comp(false);
    });

    $('#compBtn1').bind('click', function () {
        trimite_rez_comp(true);
    });
    $('#compBtn2').bind('click', function () {
        trimite_rez_comp(true);
    });

    $(document).delegate('#errTxt', 'keydown', function(e) {
    var keyCode = e.keyCode || e.which;

    if (keyCode == 9) {
        e.preventDefault();
        var start = this.selectionStart;
        var end = this.selectionEnd;

        // set textarea value to: text before caret + tab + text after caret
        $(this).val($(this).val().substring(0, start)
                    + "\t"
                    + $(this).val().substring(end));

        // put caret at right position again
        this.selectionStart =
        this.selectionEnd = start + 1;
    }
    });

});

</script>

</body>
</html>