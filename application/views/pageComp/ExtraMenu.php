<header id="extramenus">
    <?php

    //If type variable in the session is set that means a session has been created and user is logged in
    if(isset($_SESSION['type'])){
        static $totalquantity=0;
        static $totalcost=0;
        static $booknum=0;

        //Adds up all the number of movies and total prices and the total quantity of books
        foreach($_SESSION as $cart){

            //Do not iterate if the content of the global session is the user information
            if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                ||$cart==$_SESSION['lastname']
                ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){


            }else{
                //sum up all the prices
                    $totalcost+=$cart['price'];
                    $booknum++;
                }

        }


        //Print out all the information about the cart and links for a Logged In user
        print("<nav>
                    <span style='color: red; text-decoration: underline'>
                        Movies = $booknum || Total Price = $totalcost AED
                    </span>
                    <a href=\"UserDetails\">User Details</a>
                    <a href=\"EditCart\">Edit Cart</a>
                    <a href=\"Checkout\">Check Out</a>
                    <a href=\"LogOut\">Log Out</a>
              </nav>");
    }else{
        //print out normal links if the user is not logged in
        print("<nav>
                    <a href=\"Login\">Log In</a>
                    <a href=\"Register\">Register</a>
              </nav>");
    }
        ?>

</header>