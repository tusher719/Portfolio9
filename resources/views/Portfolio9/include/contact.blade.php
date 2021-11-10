<section class="wedo" id="contact">
    <div class="container">
        <h3 class="heading text-capitalize text-white text-center"> Contact </h3>
        <p class="subs mt-4 text-center">Proin ac fermentum est. Cras mi ipsum, consectetur.</p>
        <div class="contact_grid_right mt-5 mx-auto text-center">
            <form action="{{ route('contact.send') }}" method="post">
                @csrf
                <div class="row contact_top">
                    <div class="col-sm-4">
                        <input type="text" name="name" placeholder="Name" required="">
                    </div>
                    <div class="col-sm-4">
                        <input type="email" name="email" placeholder="Email" required="">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="phone" placeholder="Phone" required="">
                    </div>
                </div>
                <textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                <input type="submit" value="Send Message">
                <input type="reset" value="Clear Form">
                <div class="clearfix"> </div>
            </form>
        </div>
        <div class="cpy-right text-center">
            <div class="follow">
                <ul class="social_section_1info">
                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-google"></span></a></li>
                    <li><a href="#"><span class="fa fa-dribbble"></span></a></li>

                    <li><a href="#"><span class="fa fa-vimeo"></span></a></li>
                    <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                </ul>
            </div>
            <p>© 2018 Exclusive. All rights reserved | Design by
                <a href="{{route('/')}}"> Portfolio9.</a>
            </p>
        </div>
    </div>
</section>
