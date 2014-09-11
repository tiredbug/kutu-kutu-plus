<?php
/*
Template Name: Frontpage Template
*/
?>

<?php get_template_part('templates/header'); ?>
    
<div class="jumbotron masthead">
  <div class="container">
    <h1>Kutu Kutu</h1>			
    <p>Simple <a href="http://getbootstrap.com">Bootstrap 3</a> Starter Theme For <a href="http://wordpress.org">WordPress</a>. </p>
    <p class="light-text">This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    <p><a href="https://github.com/tiredbug/kutu-kutu/archive/master.zip" class="btn btn-danger btn-lg" role="button"><i class="fa fa-download"></i>&nbsp;&nbsp; Download</a></p>
  </div>
</div>

    <div class="container">
        <div class="row text-center">
              <div class="col-sm-12"><h1><small>{It's made for folks of all skill levels}</small> For everyone</h1></div>
   </div>
</div>

<div class="marketing">
    <div class="container">
        <div class="row text-center">
              <div class="col-md-4">
                  <img src="http://oi60.tinypic.com/w8lycl.jpg" class="img-circle" alt="the-brains">
                  <br>
                  <h4 class="light-text"">Newbie Programmer</h4>
                  <p class="light-text">You can thank all the crazy programming to this guy.<br>
              </div>
              <div class="col-md-4">
                  <img src="http://oi60.tinypic.com/2z7enpc.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="light-text">Web Developer</h4>
                  <p class="light-text">All the images here are hand drawn by this man.<br>
              </div>
              <div class="col-md-4">
                  <img src="http://oi61.tinypic.com/307n6ux.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="light-text">WordPress Lover</h4>
                  <p class="light-text">This pretty site it holds are all thanks to this guy.<br>
              </div>
            </div>
    </div>
</div>


<section id="contact">
<div class="jumbotron jumbotron-sm contact-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>{Feel free to contact us}</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="email" class="form-control" id="name" placeholder="Enter name" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Kutucape, Inc.</strong><br>
                Jl. Jamil 15, Pantai Hambawang, Barabai<br>
                Hulu Sungai Tengah, Kalsel 68133<br>
                <abbr title="Phone">
                    P:</abbr>
                (0811) 351-856
            </address>
            <address>
                <strong>Tiredbug</strong><br>
                <a href="mailto:#">poke@tiredbug.com</a>
            </address>
	    <br/>
                    <a href=""><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
	            <a href=""><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
	            <a href=""><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
                    <a href=""><i id="social" class="fa fa-youtube-square fa-3x social-gp"></i></a>
	            <a href=""><i id="social" class="fa fa-envelope-square fa-3x social-em"></i></a>

            </form>
        </div>
    </div>
</div>
</section>
   
<?php get_template_part('templates/footer'); ?> 
