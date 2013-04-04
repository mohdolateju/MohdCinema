<link href="css/main.css" rel="stylesheet" type="text/css">
<link rel="icon" href="images/MohdCinema(Favicon).png" type="image/x-icon"/>
<script type="text/javascript" src="javascript/jquery-1.9.1.js"></script>
<script type="text/javascript" src="javascript/jquery-ui-1.10.1.custom.js"></script>
<script type="text/javascript">

    var moviesDisplayed=3;

    //Shared index
    var index=1;

    //Slide the movies forward
    function sliderforward(){
        for(index; moviesDisplayed>=index; index++){
            var some="#movie"+index;
            $(some).delay(100).hide("slide",{direction:"left"},500);
        }

    }

    //Slide the movies Backward
    function sliderbackward(){

        backmoviesDisplayed=moviesDisplayed-2;
        for(index; backmoviesDisplayed<=index; index--){
            var some="#movie"+index;
            $(some).delay(100).show("slide",{direction:"left"},500);
        }

    }

    //Used to change the timing selected by the user
    window.onload=function(){
        $("select").change(function () {
            var me=$('select').find(":selected").attr("alt");
            $("#timingNo").attr("value",me);
        })
        .change();
    };

</script>
</head>