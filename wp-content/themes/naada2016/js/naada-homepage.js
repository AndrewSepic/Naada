//
//  Custom JS for Naada
//  by Andrew@thinkup
//
jQuery( document ).ready(function( $ ) {

 fireSlick('div.online-carousel');
 fireSlick('div.clinic-carousel');
 fireSlick('div.nytt-carousel');
 loginForm();
 parallaxInit();

 function BSportWorkshopsReady(callback){
     var BSportLoadingInterval = setInterval(function(){
       var BSportCodeLoading = $('div.naada-carousel #bsport-widget-7776 .bs-workshop-page__workshops__lists');
       // if the healcode .enrollment div is loaded and has content
       if (BSportCodeLoading.length !== 0) {
		console.log("BSport Loaded!");
         callback();
         clearInterval(BSportLoadingInterval);
       }
     },100);
 }

  // Call success functions for Healcode Workshops
     BSportWorkshopsReady(function () {
		console.log("callback fires!")
         applySlickSlider();
         modifyMarkup();
         multiDayMarkup();
         fireModal();
     });


  // LIVEStream Schedule
  function homepageSchedCode(){
    console.log('homepageSchedCode Fires!');
    // Remove Cloned Teacher Profiles from Previous Loops
    var teacherProfileExists = $('.bw-session__info .bw-session__group2 .bw-session__photo');
    if ( teacherProfileExists ) {
      teacherProfileExists.remove();
    }
    // Remove Appended Time Zone
    var timeZoneExists = $('div.live-stream-sched healcode-widget div#129819 span.hc_time span.tmz');
    if ( timeZoneExists ) {
      timeZoneExists.remove();
    }

    // Modify Schedule Markup to hide/show as we want it
    var liveStreamSched = $('div.live-stream-sched healcode-widget div#129819');
    if ($(window).width() > 450) {
      liveStreamSched.removeClass('bw-widget--medium').addClass('bw-widget--large');
      liveStreamSched.find('.bw-fullcal__field').hide();
      liveStreamSched.find('table.bw-calendar').show();
      liveStreamSched.find('div.bw-widget__header .bw-header__filter-link').show();
      liveStreamSched.find('button.bw-fullcal-button').show();
      liveStreamSched.find('span.hc_time').append('<span class="tmz"> EST</span>');
    }
    // Clone Teachers Profil Shot
    var instructor = $('div.live-stream-sched healcode-widget .bw-session__details .bw-session__instructor');
    instructor.each(function(){
      var photo = $(this).find('.bw-session__photo').clone();
      $(this).closest('.bw-session__details').prev().find('.bw-session__group2').prepend(photo);
    });

    // Each time you click the week links, reload this entire function
    liveStreamSched.find('td.bw-calendar__day span').on("click", function(){
      console.log('you clicked a day in the calendar!');
      healcodeHomepageSchedReady();
    });
  }

  function cloneTeachers() {

  }

  function applySlickSlider() {
    // Call Slick Slider on the Workshops widget
	const container = $('div.naada-carousel #bsport-widget-7776 .bs-workshop-page__workshops__lists');
	console.log("container is", container);
    $('div.naada-carousel #bsport-widget-7776 .bs-workshop-page__workshops__lists').slick ({
      dots: true,
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            variableWidth: true
          }
        },
        {
          breakpoint: 680,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: true
          }
        }
      ]
    });
  }

  function modifyMarkup(){

    // Adds read more to Event Meta
        $('div.naada-carousel #bsport-widget-7776 .cleanslate .bs-workshop-card__offer-list__offer__conditions').html("<div class=\"more-info\"><a href=\"/workshops-events/\">More Info</a></div>");

        //Add css classes to columize events
        $('#bsport-widget-7776 .cleanslate .bs-workshop-page__workshops__lists ').css("display", "block");

        // Hides event description area by default
        $("div.naada-carousel .bs-workshop-card__offer-list").hide();

        // Remove 'Date:' in Healcode Output
        var date = $('div.naada-carousel div.healcode span.healcode-date-value');
        date.each(function(){
          var str = $(this).text().replace(/Date:/g, '');
          // if ($(this).text().length > 18){
          // //  console.log(this);
          //   var year = new Date().getFullYear();
          //   //var yearPos = this.str.search(year);
          //   str.replace(/year/g,'');
          // }
          $(this).text(str);
        });
  }

  function multiDayMarkup() {
    var getDate = $('.healcode-date-value');

    // If the date is longer than 12 char send it to multiDay array
    getDate.each(function(){
      if ( $(this).text().length > 12) {
          //console.log(this);
          //create trimmed string
          var trimy = $(this).text().substring(0, 12);
          var multiDayTag = "Multi-day Event";
          $(this).text(multiDayTag);
          $(this).prev().hide();
          $(this).next().text('Starting: '+ trimy);

      }
    })
  }

  function fireModal(){
    // Creates Modal window Markup
    var modal = (function(){
      var
      method = {},
      $overlay,
      $modal,
      $content,
      $close;

      // Center the modal in the viewport
      method.center = function () {
        var top, left;

        top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
        left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;

        $modal.css({
          top:top + $(window).scrollTop(),
          left:left + $(window).scrollLeft()
        });
      };

      // Open the modal
      method.open = function (settings) {
        $content.append(settings.content);

        $modal.css({
          width: settings.width || 'auto',
          //width: settings.width || 'auto',
          height: settings.height || 'auto',
          margin: settings.margin || '2rem'
        });

        method.center();
        $(window).bind('resize.modal', method.center);
        $modal.show();
        $overlay.show();
      };

      // Close the modal
      method.close = function () {
        $modal.hide();
        $overlay.hide();
        $content.empty();
        $(window).unbind('resize.modal');
      };

      // Generate the HTML and add it to the document
      $overlay = $('<div id="overlay" style="z-index: 25;"></div>');
      $modal = $('<div id="modal" style="z-index: 30;"></div>');
      $content = $("<div id='content'></div>");
      $close = $('<a id="close" href="#">X</a>');

      $modal.hide();
      $overlay.hide();
      $modal.append($content, $close);

      $(document).ready(function(){
        $('body').append($overlay, $modal);
      });

      $close.click(function(e){
        e.preventDefault();
        method.close();
      });

      return method;
    }());

    // Call Modal for Single events
    $("div.enrollment .more-info a").click(function(e){
        e.preventDefault();
        // Opens modal with description area as content
        var htmlString =  $(this).parent().prevAll('.healcode-enrollment-name').clone().html() + $(this).parentsUntil(".slick-track").find("div.healcode-description-area").clone().show().html() + $(this).parentsUntil(".slick-track").find("a.signup_now").clone().show().html();
        //console.log(htmlString);

        modal.open({
          content : htmlString
        });

      });

    $("div.enrollment .healcode-enrollment-name > a").click(function(e){
      e.preventDefault();
      // Opens modal with description area as content
      var htmlString = $(this).parent().clone().html() +
        $(this).parent().siblings("div.healcode-description-area").clone().show().html();
      modal.open({ content : htmlString });
    });


    // Call Modal for Multi day Events
    $("div.healcode-course .more-info a").click(function(e){
      e.preventDefault();
      var topParent = $(this).parents(".healcode-course");
      // add attrs and show multi event sub entries
      topParent.find("div.enrollment.child").css({
        'width': '100%',
        'margin': '1rem'
      }).children("div.healcode-description-area").show();

      var multiEventString = topParent.children("h2.healcode-course-name").clone().append("<br>").html() + topParent.children("div.healcode-description-area").first().clone().show().html() + topParent.find("div.enrollment.child").parent().clone().show().html();

      modal.open({
        content : multiEventString
      });

    });

  }

  // Function to Call Slick slider on Online Courses
  function fireSlick(selector) {
    $(selector).slick ({
      dots: true,
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            variableWidth: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            variableWidth: true
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: true
          }
        }
      ]
    });
  }

  function loginForm() {
    // Move 'Remember Me' on Loginform
    $('div.form-group:nth-of-type(3)').appendTo('form#login');
    // Adds My Courses link to footer sign in
    $("<a class='course' href='/online-school/my-courses/'>Go to your Courses </a>").insertBefore('div.signin ul li a').after("| ");
  }

  function parallaxInit(){
    var ismobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
    if (ismobile === false){
      // Parallax background
      $('section.parallax-1').parallax("50%", 0.2, true);
      $('section.parallax-2').parallax("50%", 0.2, false);
    }
  }

});
