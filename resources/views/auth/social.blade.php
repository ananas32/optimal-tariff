{{-- Social buttons--}}

<div class="text-center margin-bottom-20" id="uLogin"
     data-ulogin="display=panel;theme=flat;fields=first_name,last_name,email,nickname,photo,country;
                             providers=vkontakte,gmail;hidden=other;
                             redirect_uri={{ urlencode('http://' . $_SERVER['HTTP_HOST']) }}/ulogin;mobilebuttons=0;">
</div>

