//
//  Custom JS for Naada's Clini pages
//  by Andrew@thinkupdesign.ca
//

jQuery( document ).ready(function( $ ) {

  openCloak();
  healcodeWidgetReady();

  // Test to see when Healcode Widget is loaded
  function healcodeWidgetReady(){
      var healCodeLoadingInterval2 = setInterval(function(){
        var healCodeLoading2 = $('div.healcode form');
        // if the healcode .enrollment div is loaded and has content
        if (healCodeLoading2.length !== 0) {
         //  callback();
          swapTitle();
          clearInterval(healCodeLoadingInterval2);
        }
      },100);
  }

  function swapTitle() {
    //$('')
    console.log('Its loaded!');
    var title = $('div.pre-filters div span');
    title.each(function(){
      var str = $(this).text().replace(/Instructor:/g, 'Therapist:');
      // if ($(this).text().length > 18){
      // //  console.log(this);
      //   var year = new Date().getFullYear();
      //   //var yearPos = this.str.search(year);
      //   str.replace(/year/g,'');
      // }
      $(this).text(str);
    })
  }

  function openCloak() {
    $('a.openAppoint').on("click", function(e){
      e.preventDefault();
      $('div.bookingCloak').slideDown('slow');
    })
  }

});
