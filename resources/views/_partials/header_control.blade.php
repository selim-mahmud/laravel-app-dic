<style>
    /* Remove margins and padding from the list, and add a black background color */
    ul.topnav {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #00BFF3;
    }

    /* Float the list items side by side */
    ul.topnav li {float: left;}

    /* Style the links inside the list items */
    ul.topnav li a {
        display: inline-block;
        color: #f2f2f2;
        text-align: center;
        padding: 18px 16px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of links on hover */
    ul.topnav li a:hover {background-color: #F04D4E;}

    /* Hide the list item that contains the link that should open and close the topnav on small screens */
    ul.topnav li.icon {display: none;}

    /* When the screen is less than 680 pixels wide, hide all list items, except for the first one ("Home"). Show the list item that contains the link to open and close the topnav (li.icon) */
    @media screen and (max-width:680px) {
        ul.topnav li:not(:first-child) {display: none;}
        ul.topnav li.icon {
            float: right;
            display: inline-block;
        }
    }

    /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens */
    @media screen and (max-width:680px) {
        ul.topnav.responsive {position: relative;}
        ul.topnav.responsive li.icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        ul.topnav.responsive li {
            float: none;
            display: inline;
        }
        ul.topnav.responsive li a {
            display: block;
            text-align: left;
        }
    }
</style>

<header class="navbar navbar-fixed-top">
    <div class="navbar-logo-wrapper dark bg-dark">
        <a class="navbar-logo-image" href="/">
            <img style="margin-left: -30px;" src="{{asset('control/img/logo.png')}}" alt="" class="sb-l-o-logo">
            <img src="{{asset('control/img/logo_small.png')}}" alt="" class="sb-l-m-logo">
        </a>
    </div>
    <span id="sidebar_left_toggle" class="ad ad-lines navbar-nav navbar-left"></span>
    <ul class="topnav" id="myTopnav">
        <li><a href="/">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
        <li class="icon">
            <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
        </li>
    </ul>
</header>

<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
