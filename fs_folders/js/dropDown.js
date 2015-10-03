$(document).ready(function () {
/**
 * Start after the page is being loaded.
 */ 
  run();  
  var counter = 0;
 
  /**
   *
   */
  function run() {

    console.log('dropdown js running....');
    //Home feed look dropdown
    // hideWhenMouseIsOver(
    //   '#body_container, #htd1, #new-header-signout-search, #profile_t, #new-bottom-header-signin, #main_container, .details-page-header-table-1', 
    //   '#header-dropdown-look', 
    //   'nothing'
    //   );  

    hideWhenMouseIsOver(
      '#body_container, #htd1, #new-header-signout-search, #profile_t , #new-bottom-header-signin ', 
      '#header-dropdown-look', 
      'nothing'
    );  
  }

  /**
  * 
  *
  */
  // function showWhenMouseOver(mOver, show) {
  //   $(mOver).mouseover(function(){   
  //     console.log('counter = '+ counter + ' | mouse is over the id =  ' + mOver+ ' | hide this div = ' + hide + ' | show = ' + show);     
  //     $(hide).css('display', 'none');
  //   })
  // } 
 

  /**
   *
   * @param clicked
   * @param message
   */
  function clickedDialog(clicked, message) {
      $(clicked).click(function(){
        alert(message);
      })
  }

  /**
   *
   * @param mOver
   * @param hide
   * @param show
   */
  function hideWhenMouseIsOver(mOver, hide, show) {
    counter++;  
    $(mOver).mouseover(function(){   
      console.log('counter = '+ counter + ' | mouse is over the id =  ' + mOver+ ' | hide this div = ' + hide + ' | show = ' + show);     
      $(hide).css('display', 'none');
    })
  }
});