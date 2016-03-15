<div id="navigation"  class="navigation-desktop">
    <div id="navigation_float">
        <div id="navigation_center">
            <div id="navigation_center_center">
			<div class="logo" style="float: left;">
			<a href="http://www.globetrottermag.com/unpublished/index.php">
			<img id="main_logo_big" style="padding: 18px 10px;" src="images/logo_globe_trotter.jpg" />
			</a>
			</div>
			<ul class="navbar-left pull-left">
				<li><a <?php if($_GET['page'] == 'news-features') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=news-features">NEWS & FEATURES</a></li>
				<li><a <?php if($_GET['page'] == 'cities-events') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=cities-events">EVENTS</a></li>
				<li><a <?php if($_GET['page'] == 'magazine') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=magazine">MAGAZINE</a></li>
				<li><a href="index.php?page=gtv"><i class="fa fa-play-circle-o"></i>GTV</a></li>
				<li><a href="index.php?page=gtv">RADIO</a></a></li>
			</ul>
			<ul class="navbar-right pull-right">
				<li class="login-nav" id="login-icon"><img id="img-login-desktop" src="icon/sign-in.png" width="100%"/>&nbsp; Sign In / Register </li> 
				<!--<li class="register-nav">Register</li>-->
				<li class="right-socmed">
					<a style="display: inline-block;padding: 0px 5px;color: #000;" target="_blank" href="http://www.facebook.com/globetrottermag/"><img onmouseover="$(this).attr('src','images/socmed/FB-RO.png')" onmouseout="$(this).attr('src','images/socmed/FB1.png')" src="images/socmed/FB1.png" width="24" height="24" /><!--<i class="fa fa-facebook"></i>--></a>
					<a style="display: inline-block;padding: 0px 5px;color: #000;" target="_blank" href="http://www.twitter.com/globetrottermag"><img onmouseover="$(this).attr('src','images/socmed/Twitter-RO.png')" onmouseout="$(this).attr('src','images/socmed/Twitter1.png')" src="images/socmed/Twitter1.png" width="24" height="24" /></i></a>
					<a style="display: inline-block;padding: 0px 5px;color: #000;" target="_blank" href="http://www.instagram.com/globetrottermag"><img onmouseover="$(this).attr('src','images/socmed/Insta-RO.png')" onmouseout="$(this).attr('src','images/socmed/Insta.png')" src="images/socmed/Insta.png" width="24" height="24" /></a>
				</li>
			</ul>
            <div style="clear: both;"></div>
			</div>
        </div>
    </div>
</div>
<?php if($_SESSION['login'] == false) { ?>
                                    <div id="signup_div" class="signup_div"<?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['membersigninmessage'] == 'Incorrect Email or Password' || $_SESSION['memberareamessage'] == "Already one of our member" || $_SESSION['memberareamessage'] == "Sign Up Success") { ?> style="display: block;"<?php } ?>>
                                        <!--
                                        <div class="closesignupdiv"><img src="images/closebutton.png" width="40" height="40" /></div>
                                        -->
                                        <div class="signupform"<?php if($_SESSION['membersigninmessage'] == 'Incorrect Email or Password') { ?> style="display: none;"<?php } ?><?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['memberareamessage'] == "Sign Up Success") { ?> style="display: block;"<?php } ?>>
                                            <div class="signuptitle">SIGN UP</div>
                                            <div class="border"></div>
                                            <br />
                                            <?php if($_SESSION['memberareamessage'] == "Sign Up Success") { ?>
                                                <?php echo '<div class="notification_success">'.$_SESSION['memberareamessage'].'</div>'; ?>
                                            <?php } else { ?>
                                            <?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email") { echo '<div class="notification_error">'.$_SESSION['memberareamessage'].'</div>'; } ?>
                                            <form action="signupmember.php" method="post" id="signupmember">
                                                <input type="text" name="email" placeholder="Email Address"  /><br />
                                                <input type="text" name="name" placeholder="Display Name"  /><br />
                                                <input type="password" name="password" placeholder="Password"  /><br />
                                                <input type="text" name="location" placeholder="Location (Country, City)"  /><br />
                                                <input type="text" name="gender" placeholder="Gender (Male/Female)"  /><br />
                                                <select name="agerange">
                                                    <option value="">Age Range</option>
                                                    <option value="Below 18">Below 18</option>
                                                    <option value="19-25">19-25</option>
                                                    <option value="26-30">26-30</option>
                                                    <option value="31-35">31-35</option>
                                                    <option value="Above 36">Above 36</option>
                                                </select>
                                                <input type="submit" value="SIGN UP" /><br />
                                            </form>
                                            <?php } ?>
                                            <br />
                                            <div class="border"></div>
                                            <br />
                                            <?php if($_SESSION['memberareamessage'] == "Sign Up Success") { ?>
                                            Please <span class="signinbutton">Sign in</span>
                                            <?php } else { ?>
                                            already have an account? <span class="signinbutton">Sign in</span>
                                            <?php } ?>
                                        </div>
                                        <div class="signinform"<?php if($_SESSION['membersigninmessage'] == 'Incorrect Email or Password') { ?> style="display: block;"<?php } ?><?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['memberareamessage'] == "Sign Up Success") { ?> style="display: none;"<?php } ?>>
                                            <div class="signuptitle">SIGN IN</div>
                                            <div class="border"></div>
                                            <br />
                                            <?php if($_SESSION['membersigninmessage'] == "Incorrect Email or Password") { echo '<div class="notification_error">'.$_SESSION['membersigninmessage'].'</div>'; } ?>
                                            <form action="signincheck.php" method="post" id="signupmember">
                                                <input type="text" name="email" placeholder="Email Address"  /><br />
                                                <input type="password" name="password" placeholder="Password"  /><br />
                                                <input type="submit" value="SIGN IN" /><br />
                                            </form>
                                            <br />
                                            <a href="Javascript:void();" class="forgotbutton">Forgot your password?</a>
                                            <br /><br />
                                            <div class="border"></div>
                                            <br />
                                            Click here for <span class="signupbutton">Sign up</span>
                                        </div>
                                        <div class="forgotpassworddiv">
                                            <div class="signuptitle">Forgot Your Password</div>
                                            <div class="border"></div>
                                            <br />
                                            <form action="forgotpass.php" method="post" id="signupmember">
                                                <input type="text" name="email" placeholder="Email Address"  /><br />
                                                <input type="submit" value="FORGOT" /><br />
                                            </form> 
                                            <br />
                                            <div class="border"></div>
                                            <br />
                                            already have an account? <span class="signinbutton">Sign in</span>
                                        </div>
                                    </div>
                                    <?php 
                                        unset($_SESSION['memberareamessage']); 
                                        unset($_SESSION['membersigninmessage']);
                                    ?>
                                    <?php } else { ?>
                                    <div id="signup_div" class="signup_div">
                                        <!--
                                        <div class="closesignupdiv">
                                        <img src="images/closebutton.png" width="40" height="40" />
                                        </div>
                                        -->
                                        <div class="signuptitle">Hi, <span style="font-style: italic;"><?php echo $_SESSION['Name']; ?></span></div>
                                        <div class="border"></div>
                                        <br />
                                        <a href="logout-member.php">Logout</a>
                                    </div>
                                    <?php } ?>
