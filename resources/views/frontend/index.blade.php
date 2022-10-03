<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tokyo Halal Restaurant</title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/prettyPhoto.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />
<style>
    /* phone  */
    @media screen and (max-width: 600px) {
            .phone{
                width: 100%;
                display: block;
            }
            .desktop{
                        width: 100%;
                        display: none;
            }
            #slide-head h1{
                font-size: 40px !important;
            }

         .logo2{
            height: 80px !important;
        }

}

/*tab */
	@media screen and (min-width: 601px) {
    .phone{
            width: 100%;
            display: none;
}
        .desktop{
            width: 100%;
            display: block;
}
#slide-head h1{
    font-size: 50px !important;
}
}
/*	desktop*/
 @media screen and (min-width: 801px) {
    .phone{
            width: 100%;
            display: none;
        }
        .desktop{
            width: 100%;
            display: block;
        }
        .logo2{
        display: none;
        }
}
	.fqr{
		height: 100px;
		width: 100px;
	}	
</style>
</head>

<body>
    <header id="header-nav" role="banner">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header">
                <a href="{{ route('homepage')}}" class="temp-logo">
                    <img src="{{ asset('assets/img/portfolio/logo2.jpg')}}" alt="logo" class="img-fluid">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav flot-nav">
                    <li><a href="#slide-head"> Home</a></li>
                    <li><a href="#about-section"> About Us</a></li>
                    <li><a href="#portfolio-section"> Menu</a></li>
                    <li><a href="#contact-section"> Contact</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!--END NAV SECTION -->
    <!--SLIDE CAROUSEL SECTION -->
    <section id="slide-head" class="carousel">
        <div class="carousel-inner">
            
            <!--1st slide -->
            <div class="item active">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Welcome to Tokyo’s newest Dedicated Halal restaurant!</h1>
                        <p class="lead">
                            Halal Ramen, Hamburg and Tehari.<br>
                            <!--<a href="#" class="btn btn-success btn-lg margin-top-20">Get This Awesome</a>-->
                            <!--<img src="assets/banner/b1.png" alt="logo" class="img-fluid"> -->
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- 2nd slide -->
            <div class="item">
                    <div class="carousel-content">
                        <img src="{{ asset('assets/img/portfolio/slide.jpg')}}" width="100%" alt="Image" class="desktop">
                        <img src="{{ asset('assets/img/portfolio/mslide.jpg')}}" width="100%" alt="Image" class="phone">
                    </div>
            </div>
            
            
            <!-- 3rd slide -->
            <div class="item">
                    <div class="carousel-content">
                        <img src="{{ asset('assets/img/portfolio/slide2.jpg')}}" width="100%" alt="Image" class="desktop">
                        <img src="{{ asset('assets/img/portfolio/mslide2.jpg')}}" width="100%" alt="Image" class="phone">
                    </div>
            </div>
            
            
            <!-- 4rd slide -->
            <div class="item">
                    <div class="carousel-content">
                        <img src="{{ asset('assets/img/portfolio/slide3.jpg')}}" width="100%" alt="Image" class="desktop">
                        <img src="{{ asset('assets/img/portfolio/mslide3.jpg')}}" width="100%" alt="Image" class="phone">
                    </div>
            </div>


        </div>
        <a class="prev" href="#slide-head" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="next" href="#slide-head" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </section>
    <!--END SLIDE CAROUSEL SECTION -->
    
    
    
     <!--ABOUT SECTION -->
    <section id="about-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 ">
                    <div class="text-center">
                        <h1><i class=""></i>About Us</h1>
                        <p class="lead">
                            Welcome to Tokyo’s newest dedicated Halal Restaurant. Our vision is simple, we want to bring
                            honest and tasty Halal cooking to the Tokyo community. We specialize in creating delicious
                            Ramen and Hamburg. We also introduce some other Asian dishes including Beef Tehari and Bhuna
                            Khichuri. All prepared and cooked to exact Halal guidelines. Whether you’re a Muslim diner
                            looking for Halal options in Tokyo, or completely new to Halal cooking in general, at Tokyo
                            Halal Restaurant you’ll find great food that’s freshly made with the finest ingredients and
                            packed full of flavor. We’re also fully committed to providing the highest levels of service
                            to our customers. We can’t wait to welcome you to our restaurant to experience our fantastic
                            Halal cooking for yourself.

                        </p>
                    </div>

                </div>
                <!-- ./ Heading div-->
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 margin-top-100">

                    <div class="col-md-4 col-sm-6">

                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="text-center">
                            <p>
                                <img class="img-responsive img-thumbnail img-circle" src="{{ asset('assets/img/team/cheif.jpg')}}" alt="">
                            </p>
                            <h3>Mujahed Jahangir</h3>
                            <p>
                                Meet our captain who is one of the pioneer in Japan to spread the
                                Halal taste to Tokyo Muslim community almost two decade. Visit us to experience his
                                award winning recipe and explore the new Tokyo for Muslim community.
                            </p>
                        </div>
                    </div>

                    
                    
                    
                </div>
                <!-- ./ Content div-->
            </div>
        </div>
    </section>
    <!--END ABOUT SECTION -->
    
    

    <!-- Gallery Section -->
    <section id="portfolio-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1" >
                    <div class="text-center">
                        
                        <h1><i></i>Highlights </h1>
                        <hr>
                        
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <ul class="portfolio-items col-3">

                        <!--1st row 1st image -->
                        <li class="portfolio-item ">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/E.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="スパイシー唐揚げラーメン"
                                            href="{{ asset('assets/img/portfolio/big/E.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>スパイシー唐揚げラーメン</h5>-->
                            </div>
                        </li>
                <!--1st row 2nd image -->
                        <li class="portfolio-item  ">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/D1.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="特製鶏出しポタージュラーメン"
                                            href="{{ asset('assets/img/portfolio/big/D1.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>特製鶏出しポタージュラーメン</h5>-->
                            </div>
                        </li>
                        <!--1st row 3rd image -->
                        <li class="portfolio-item   ">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/C1.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="ビフテハリ"
                                            href="{{ asset('assets/img/portfolio/big/C1.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>ビフテハリ</h5>-->
                            </div>
                        </li>
                        

                        <!--2nd row 1st image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/B1.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="金賞受賞江古田ハンバーグ"
                                            href="{{ asset('assets/img/portfolio/big/B1.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>金賞受賞江古田ハンバーグ</h5>-->
                            </div>
                        </li>

                    <!--2nd row 2nd image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/A2.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="イタリアンチーズハンバーグ"
                                            href="{{ asset('assets/img/portfolio/big/A2.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>イタリアンチーズハンバーグ</h5>-->
                            </div>
                        </li>

                        <!--2nd row 3rd image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/K1.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="チケンカレー"
                                            href="{{ asset('assets/img/portfolio/big/K1.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>チケンカレー</h5>-->
                            </div>
                        </li>
                        
                        <!--3rd row 1st image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/IMG_6418.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="餃子"
                                            href="{{ asset('assets/img/portfolio/big/IMG_6418.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>餃子</h5>-->
                            </div>
                        </li>
                        
                        <!--3rd row 2nd image     -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/G.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="チケンカツ"
                                            href="{{ asset('assets/img/portfolio/big/G.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>チケンカツ</h5>-->
                            </div>
                        </li>
                        
                        <!--3rd row 3rd image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('aassets/img/portfolio/thumb/H1.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="チョコレートレアチーズケーキ"
                                            href="{{ asset('assets/img/portfolio/big/H1.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>チョコレートレアチーズケーキ</h5>-->
                            </div>
                        </li>

                        <!--4th row 1st image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('aassets/img/portfolio/thumb/L1.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title=""
                                            href="{{ asset('assets/img/portfolio/big/L1.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5></h5>-->
                            </div>
                        </li>

                        <!--4th row 2nd image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/L2.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title=""
                                            href="{{ asset('assets/img/portfolio/big/L2.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5></h5>-->
                            </div>
                        </li>
                        
                        <!--4th row 3rd image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/L4.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title=""
                                            href="{{ asset('aassets/img/portfolio/big/L4.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5></h5>-->
                            </div>
                        </li>

                        <!--5th row 1st image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/S1.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="Lager Malt Halal ( Made in Japan )"
                                            href="{{ asset('assets/img/portfolio/big/S1.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>Lager Malt Halal ( Made in Japan )</h5>-->
                            </div>
                        </li>
                        
                        <!--5th row 2nd image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/M.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title=""
                                            href="{{ asset('assets/img/portfolio/big/M.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5></h5>-->
                            </div>
                        </li>
                        
                        <!--5th row 3rd image -->
                        <li class="portfolio-item">
                            <div class="item-main">
                                <div class="portfolio-image">
                                    <img src="{{ asset('assets/img/portfolio/thumb/Q.jpg')}}" alt="">
                                    <div class="overlay">
                                        <a class="preview btn btn-primary" title="Prayer room"
                                            href="{{ asset('assets/img/portfolio/big/Q.jpg')}}"><i class=" fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!--<h5>Prayer room</h5>-->
                            </div>
                        </li>

  
                    </ul>
                </div>

            </div>
        </div>

    </section>










    <!--CONTACT SECTION -->
    <section id="contact-section">
        <div class="wrap-pad">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 "
                    data-scrollreveal="enter top and move 100px, wait 0.5s">
                    <div class="text-center">
                        <!--<h1><i class="fa fa-tint small-icons bk-color-black"></i>Contact us</h1>-->
                        <h1><i class=""></i>Contact us</h1>
                        <!--<p class="lead">-->
                        <!--    "some word can go here".-->
                        <!--</p>-->
                    </div>
                </div>
                <!-- ./ Heading div-->
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1  margin-top-20">
                    <div class="col-md-6  col-sm-12">
                        <!--<h3><i class=""></i>Send Us Your Query</h3>-->
                        <hr />
                        <div class="pmessage"></div>
                        <form id="query-form">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" id="email"  placeholder="Email address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" required="required" class="form-control"
                                            rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-lg submit-query">Submit Query</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-md-offset-1  col-sm-12">
                        <h3><i class="fa fa-comments small-icons bk-color-red"></i>Reach Us Here</h3>
                        <hr />
                        東京都北区上十条 1-11-9 ASKビル2F<br />
                        Call: 03-5948-8351<br />
                        Email: tokyohalalrestaurant@gmail.com<br />
                        <h3> <a href="https://www.facebook.com/TokyoHalalRestaurant2020/"><i class="fa fa-facebook fa-2x color-facebook">&nbsp;</i>Social Presence</a></h3>
						
						<img src="{{ asset('assets/img/portfolio/qr.jpg')}}" alt="" class="fqr">
						

                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="row">
            <div class="col-md-12  col-sm-12">
                &copy; 2020 created by <a href="http://aponlab.com/" style="color: #000000;">APON LAB</a>

            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.js')}}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('assets/js/jquery.prettyPhoto.js')}}"></script>

    <script src="{{ asset('assets/js/scrollReveal.js')}}"></script>

    <script src="{{ asset('assets/scripts/custom.js')}}"></script>
    
    <script>
     $(document).ready(function(){
	// query submit
	$(".submit-query").on("click", function(){
		// alert("work");
		var name = $("#name").val();
		var email = $("#email").val();
		var message = $("#message").val();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {query:1,name:name,email:email,message:message},
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
				$(".pmessage").html(resp.message);
				$("#query-form").trigger("reset");
				}else if(resp.status == 303){
				 $(".pmessage").html(resp.message);
				}
			}
		});

	});




	
});   
        
    </script>
    
    
</body>

</html>