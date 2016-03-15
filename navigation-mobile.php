<div id="navigation" class="navigation-mobile">
        	<div id="navigation_float">
                <div id="navigation_center">
                	<div id="navigation_center_center">
                    	<div id="searchtop_mobile">
                            <div id="wrap_mobile">
                              <form action="index.php" method="get" id="form-search-top">
                              <input type="hidden" name="page" value="search" />
                              <input id="search_submit_1" value="Search" type="submit">
                              <input id="search_text_1" type="text" name="search" placeholder="<?php if($_GET['search']) { ?><?php echo $_GET['search']; ?><?php } else { ?>Search...<?php } ?>" id="search" />
                              </form>
                            </div>
                        </div>
                    	<div id="nav_logo_mobile">
							<a href="http://www.globetrottermag.com/unpublished/index.php">
								<img src="images/logo_globe_trotter.jpg" height="100%" />
							</a>
						</div>
                        <!--<div style="padding: 2px 0; z-index: 40;" id="nav_list_down"><img src="images/nav_list_down.png" width="40" height="40" /></div>-->
                        <div id="nav_list_down">
            			  <span></span>
            			  <span></span>
            			  <span></span>
            			  <span></span>
            			</div>
                        
                        <div id="music-button-play">
                            <div class="item button" data-bind="
                        		click:play,
                        		visible:!isPlay(),
                        		maskBtn:{hasOffset:false}
                        		" id="play" style="background-position: 0px 0%;">
                            </div>
                            <div class="item button" data-bind="
                        		click:pause,
                        		visible:isPlay(),
                        		maskBtn:{css:'mainImage'}
                        		" id="pause" style="background-position: -26px 100%;">
                            </div>
                        </div>
                    	<div id="nav_logo_main">
                        	<a style="" class="nav_a_logo" href="index.php">
                                <img id="main_logo_big" src="images/logo_globe_trotter.jpg" />
                            </a>
                        </div>
                        <ul class="nav_ul">
						 <li class="nav_li_mobile"><a class="nav_a"<?php if($_GET['page'] == 'subscribe') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=subscribe">Subscribe</a></li>
                        	<div class="nav_li_ipad">
                                <li class="nav_li"><a class="nav_a"<?php if($_GET['page'] == 'news-features') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=news-features">NEWS & FEATURES</a></li>
                                <li class="nav_li"><a class="nav_a"<?php if($_GET['page'] == 'cities-events') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=cities-events">EVENTS</a></li>
                            </div>
                            <li class="nav_li"><a class="nav_a"<?php if($_GET['page'] == 'magazine') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=magazine">MAGAZINE</a></li>
                            <li class="nav_li"><a class="nav_a" href="index.php?page=gtv"><i class="fa fa-play-circle-o"></i>GTV</a></li>
                            <li class="nav_li" style="border-right:1px solid #ccc;border-right:0.5px solid #ccc"><a class="nav_a" href="index.php?page=gtv">RADIO</a></a></li>
                            <li class="nav_li_mobile"><a class="nav_a"<?php if($_GET['page'] == 'shop') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=shop">Shop</a></li>
                            <li class="nav_li_mobile"><a class="nav_a"<?php if($_GET['page'] == 'submission') { ?> style="background: #000; color: #e2bc79;"<?php } ?> href="index.php?page=submission">Submissions</a></li>
                           
                            <li class="nav_li_mobile">
								Follow Us &nbsp;
                                <a class="nav_a" style="display: inline-block;" target="_blank" href="http://www.facebook.com/globetrottermag/"><i class="fa fa-facebook"></i></a>
                                <a class="nav_a" style="display: inline-block;" target="_blank" href="http://www.twitter.com/globetrottermag"><i class="fa fa-twitter"></i></a>
                                <a class="nav_a" style="display: inline-block;" target="_blank" href="http://www.instagram.com/globetrottermag"><i class="fa fa-instagram"></i></a>
							</li>
                            <div style="clear: both;"></div>
                        </ul>
						
                        <div class="login-icon" id="login-icon-mobile">
            			  <img id="img-login" src="icon/sign-in.png" width="100%"/>
                          
            			</div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
            
        </div>
<?php if($_SESSION['login'] == false) { ?>
                                    <div id="signup_div_mobile" class="signup_div"<?php if($_SESSION['memberareamessage'] == "All fields have to be filled" || $_SESSION['memberareamessage'] == "Please Enter Valid Email" || $_SESSION['membersigninmessage'] == 'Incorrect Email or Password' || $_SESSION['memberareamessage'] == "Already one of our member" || $_SESSION['memberareamessage'] == "Sign Up Success") { ?> style="display: block;"<?php } ?>>
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
                                    <div class="signup_div">
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