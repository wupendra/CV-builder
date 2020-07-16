<footer>
            
            <section class="footer-sec-1">
            	<div class="container foot-cont-1">
                	<div class="col-md-3 section-foot">
                    	<img src="{{ asset('img/logo.png') }}" class="img-responsive" />
                        <p>{{ $appsetting->short_note }}</p>
                        <ul class="social-icons-footer">
                        	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul><!--social-icons-footer-->
                    </div><!--section-foot-->
                    
                    <div class="col-md-3 section-foot">
                    	<h6>Latest Themes</h6>
                        <ul class="foot-links">
                        <li><a href="#">Ut porta arcu arcu, ut euismod augue mollis.</a></li>
                        <li><a href="#">Vestibulum ante ipsum primis in faucibus orci luctus.</a></li>
                        <li><a href="#">Ut porta arcu arcu, ut euismod augue mollis.</a></li>
                        <li><a href="#">Ut porta arcu arcu, ut euismod augue mollis.</a></li>
                        <li><a href="#">Ut porta arcu arcu, ut euismod augue mollis.</a></li>
                        </ul>
                    </div><!--section-foot-->
                    
                    <div class="col-md-3 section-foot">
                    	<h6>QUICK LINKS</h6>
                        <ul class="foot-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="{{ route('frontend.theme.list') }}">Themes</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="{{ route('frontend.terms.conditon') }}">Terms and Condition</a></li>
                        <li><a href="{{ route('frontend.privacy.policy') }}">Privacy Policy</a></li>
                        </ul>
                    </div><!--section-foot-->
                    
                    
                    <div class="col-md-3 section-foot">
                    	<h6>GET IN TOUCH</h6>
                        <ul class="foot-links">
                        <li><i class="fa fa-map-marker"></i>{{ $appsetting->address }}</li>
                        <li><i class="fa fa-phone"></i>{{ $appsetting->contact }}</li>
                        <li><i class="fa fa-envelope"></i>u.silwal@gmail.com</li>
                        </ul>
                    </div><!--section-foot-->
                    
                    
                </div><!--foot-cont-1-->
            </section><!--footer-sec-1-->
            
            <section class="footer-sec-2">
            	<div class="container foot-last-sec">
                	<span class="left-txt-gurkhaa pull-left">
                    	Copyright &copy; 2017 . All Rights Reserved.
                    </span><!--left-txt-gurkhaa-->
                    
                    <span class="left-txt-gurkhaa pull-right">
                    Site Powered by <a href="https://kamalsilwal.com.np">Kamal Raj Silwal</a>.
                    </span><!--left-txt-gurkhaa-->
                    
                </div><!--foot-last-sec-->
            </section><!--footer-sec-2-->
            
            
            
            </footer>
