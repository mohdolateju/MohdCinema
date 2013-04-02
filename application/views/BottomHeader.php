<link href="css/main.css" rel="stylesheet" type="text/css">
<link rel="icon" href="images/MohdCinema(Favicon).png" type="image/x-icon"/>
<script type="text/javascript" src="javascript/jquery-1.9.1.js"></script>
<script type="text/javascript" src="javascript/jquery-ui-1.10.1.custom.js"></script>
<script type="text/javascript">
    var movies  = document.getElementsByClassName("movie");
    var movieNo = document.getElementsByClassName("movie").length;

    var moviesDisplayed=3;
    var globalIndex=1;

    function sliderforward(){

        var index=1;
        for(index; moviesDisplayed>=index; index++){
            //if (globalIndex<movieNo){
            var some="#movie"+globalIndex;
            $(some).delay(100).hide("slide",{direction:"left"},500);
            //$(some).fadeOut(200,{direction:"left"});
            globalIndex++;
            //}
        }

    }

    function sliderbackward(){

        var index=1;
        for(index; moviesDisplayed>=index; index++){
            //if (globalIndex<movieNo){
            globalIndex--;
            var some="#movie"+globalIndex;
            $(some).fadeIn(50);

            //}
        }

    }

    function soemthing(no){

    }

    window.onload=function(){
    $("select").change(function () {
        var me=$('select').find(":selected").attr("alt");
        $("#timingNo").attr("value",me);
        //alert('Handler for .change() called.');
    })
    .change();
    };
</script>
</head>