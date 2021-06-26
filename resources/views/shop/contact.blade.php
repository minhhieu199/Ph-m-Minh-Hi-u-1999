@extends('shop.layout.main')


@section('content')
<div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form" id="contactForm"method="post" action="{route{('shop.contactStore')}}" >
                      @csrf
				  	<h2>Gửi Thông Tin Liên Hệ Với Chúng Tôi</h2>
					    <form>
					    	<div>
						    	<span><label>Họ Tên</label></span>
						    	<span><input type="text" name="name"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text"  name="email"></span>
						    </div>
						    <div>
						     	<span><label>Điện Thoại</label></span>
						    	<span><input type="text"  name="phone"></span>
						    </div>
						    <div>
						    	<span><label>Message</label></span>
						    	<span><textarea name="content"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="SUBMIT" value="SUBMIT" ></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>
    </div>
 </div>
</div>
@endsection