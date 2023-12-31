@extends('main.index.layouts.master')


@section('main_content')

<div class="container">

    <header class="" style="margin-top:10%">
        <div class="row d-flex justify-content-between ar"> 
            <div class="col-lg-6 mb-3">
                <h2 class="my-text">{{__("Get Your Own Digital Menu")}}</h2>
                <h5 class="pt-3 my-text text-capitalize">
                    {{__('get a digital menu for your restaurant in a very special price, customize the ui very easly,and satisfy your customers')}}
                </h5>

                <p class="my-text">
                    <a href="/register" class="btn btn-danger my-3 p-2">{{__("Book Your Menu Now")}}</a>
                </p>

            </div>
            <div class="col-lg-6 text-right">
                <img class="h-img" src="/assets/main/img/main/cardi.png" alt="Mine-Menu" title="Mine-Menu">
            </div>
        </div>
    </header>

    <div class="marg"></div>

    <section>
        <div class="row d-flex justify-content-center tm-col-md-reverse ar"> 
            <div class="col-lg-6 mb-4">
                <img src="/assets/main/img/main/myfood.png" alt="">
            </div>
            <div class="col-lg-6 mb-5">
                <h3 class="my-text">{{__("Suitable UI For Your Restaurant")}}</h3>
                <p class="my-text">
                  {{__("We offer you the best user interface designs in terms of consistent colors and renewable shapes that are compatible with different screen sizesAttention is paid to UI and user experience design at the platform level, based on the latest industry standards. The created user interface is always more practical and easy to use, as well as the user experience of the menu. We also offer you to customize your menu by yourself by changing the colors, images and design according to what suits your restaurant.")}}
                </p>
            </div>
    
        </div>
    </section>

    <div class="marg"></div>
  
    <section>
        <div class="row d-flex justify-content-between ar"> 
            <div class="col-lg-6">
                <h3 class="my-text">{{__("Qr Code Connected To Your Menu")}}</h3>
                <p class=" my-text">
                  {{__("Get different QR Codes design, Print QR Codes & Place them on your Tables or even share QR Code or Menu link on your Social Media Platforms.")}}
                </p>

            </div>
            <div class="col-lg-6 text-center pt-5">
                <img src="/assets/main/img/main/fimg.jpg"  alt="" style="width: 100%;border-radius:20px"> 
            </div>
        </div>
    </section> 

    <div class="marg"></div>

    <section>
        <div class="row d-flex justify-content-center tm-col-md-reverse ar"> 
            <div class="col-lg-6">
                <img src="/assets/main/img/main/lapi.png" alt="">
            </div>
            <div class="col-lg-6 mb-5">
                <h3 class="my-text">{{__("Full Management Of Your Menu")}}</h3>
                <p class="my-text">
                    {{__("Update Menu Instantly, have full control over your Online Menu. Add, Activate, Deactivate Menu items & Update Prices fast, Check Analytics & scan reports on any device & much more !")}}

                </p>
            </div>
    
        </div>
    </section>

    <div class="marg"></div>

    <section class="features text-center">
        <h2 style="margin-bottom:100px;font-weight:600">{{__('What We Offer')}}</h2>

        <div class="row features-cards">
           <div class="col-lg-4">
                <div class="feature-icon"><img src="/assets/main/img/icons/sup2.png" height="100%" width="100%" alt="Mine-menu"></div>
                <h5 class="mt-2">{{__("24 Hours Support")}}</h5>
                <p>{{__("We Provide you a 24/7 online support with a professional team.")}}</p>
           </div>
           <div class="col-lg-4">
                <div class="feature-icon"><img src="/assets/main/img/icons/up4.png" height="100%" width="100%" alt="Mine-menu"></div>
                <h5 class="mt-2">{{__("Periodic Updates")}}</h5>
                <p>{{__("There will Always be updates and new features added to your menu and system.")}}</p>
           </div>
           <div class="col-lg-4">
            <div class="feature-icon"><img src="/assets/main/img/icons/lang.png" height="100%" width="100%" alt="Mine-menu"></div>
            <h5 class="mt-2">{{__("Multi Languages")}}</h5>
            <p>{{__("Your menu will be written in multi languages very easly.")}}</p>
            </div>
        </div>

        <div class="row features-cards">
            <div class="col-lg-4">
                 <div class="feature-icon"><img src="/assets/main/img/icons/tut.png" height="100%" width="100%" alt="Mine-menu"></div>
                 <h5 class="">{{__("User Trainning")}}</h5>
                 <p>{{__("You will be provided with a full tutorial about how to manage your menu.")}}</p>
            </div>
            <div class="col-lg-4">
                 <div class="feature-icon"><img src="/assets/main/img/icons/qr.png" height="100%" width="100%" alt="Mine-menu"></div>
                 <h5 class="mt-2">{{__("Multi Qr Designs")}}</h5>
                 <p>{{__("There will be a lot of different designes to choose for your menu Qr code.")}}</p>
            </div>
            <div class="col-lg-4">
                <div class="feature-icon"><img src="/assets/main/img/icons/ui.png" height="100%" width="100%" alt="Mine-menu"></div>
                <h5 class="mt-2">{{__("UI Customization")}}</h5>
                <p>{{__("With our system you can customize your UI and create different views according to you preference.")}}</p>
           </div>
   
         </div>

    </section>

    


    <section class="testimonial text-center">
        <h2 style="margin-bottom:100px;margin-top:100px;font-weight:600">{{__('What Our Clients Say')}}</h2>
        <div class="row">
           <div class="col-lg-4 testimonial-cards">
             <div>
                <p>{{__("Mine Menu has given us the freedom to change our menu easily and without the need for additional costs")}}</p>
                <h5 class="mt-2">Ring King</h5>
                <span>Erbil,Iraq</span>
             </div>
           </div>
           <div class="col-lg-4 testimonial-cards">
                <div>
                    <p>{{__("The interactive menu that you provided has contributed to increasing the satisfaction of our customers")}}</p>
                    <h5 class="mt-2">Zalata</h5>
                    <span>Baghdad,Iraq</span>
                </div>
           </div>
           <div class="col-lg-4 testimonial-cards">
                <div>
                    <p>{{__("Through the use of your menu, we are able to provide customers with real and updated pictures of what we offer")}}</p>
                    <h5 class="mt-2">Perius Chicken</h5>
                    <span>Basra,Iraq</span>
                </div>
           </div>
        </div>
    </section>


</div>


<section class="book-section text-center">
   
        <h2>{{__("You Still Confused?")}}</h2>
        <h4>{{__("Start Your 14 Days Free Trail Now")}}</h4>
        <p class="">
            <a href="/register" class="btn btn-danger my-3 p-2">{{__("Book Your Menu Now")}}</a>
        </p>

</section>


@endsection