<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>PHP Form</title>
    <style>
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .msgError{
            color: red;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <form autocomplete="off">
            Name: <input type="text" id="firstname" name="fname"/>
            <br/>
            <span class="msgError" id="msg_name"></span>
            <br/>
            Age:    <input type="number" id="age" name="age1"/>
            <br/>
            <span class="msgError" id="msg_age"></span>
            <br/>
            <button type="btn" id="submitBtn">Submit</button>
        </form>
        <div id="main">
            <label>Name: </label><span id="name_display"></span><br/>
            <label>Age: </label><span id="age_display"> </span>
        </div>
    </div>
    <script>
        $(function(){
            $("#submitBtn").click(function(event){
                event.preventDefault();
                var firstName=$("#firstname").val();
                var age=$("#age").val();
                $.ajax({
                    url: "formProcess.php",
                    method: "POST",
                    data: {namevar:firstName,agevar:age}
                }).done(function(msg){
                    var a = msg.split("-");
                    var msg_no=a[0];
                    if(msg_no=="1")
                    {
                        $("#msg_name").html(a[1]);
                        $("#msg_age").html("");
                    }
                    else if(msg_no=="2")
                    {
                        $("#msg_age").html(a[1]);
                        $("#msg_name").html("");
                    }
                    else
                    {
                        $("#msg_name").html("");
                        $("#msg_age").html("");
                        //display in div
                        var b=msg.split("^");
                        var name1=b[0].replace("3-","");
                        $("#name_display").html(name1);
                        var age1=b[1].replace("4-","");
                        $("#age_display").html(age1);
                    }
                });
            });
        });
    </script>
</body>
</html>