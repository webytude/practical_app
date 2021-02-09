(function(window, document, $, undefined) {
	  "use strict";
	$(function() {
          
          
          
          // select2
//          $(".select2").select2();
//	  $(".onClickCloseFalse .select2").select2({
//                    dropdownParent: $('.onClickCloseFalse')
//          });
          
//          // select2
//          $(".select2").select2();
//	  $(".onClickCloseFalse .select2").select2(function(event){
//                    event.stopPropagation();
//                    dropdownParent: $('.onClickCloseFalse')
//          });
          
          // select2
          
//          $(".select2").select2();
//	  $(".onClickCloseFalse .select2").select2(function(event){
//                    event.stopPropagation();
//                    dropdownParent: $('.onClickCloseFalse')
//          });
          
//          $(".select2").select2();
//	  $(".onClickCloseFalse .select2").select2({
//                    dropdownParent: $('.onClickCloseFalse')
//          });
                
          // multi select
		$('.multiple').select2({
			placeholder: "-- Select --",
                        //selectOnClose: false,
                        closeOnSelect: false
		});

		// basic
		$("#s2_demo1").select2();

		// nested
		$('#s2_demo2').select2({
			placeholder: "Select a state"
		});

		// multi select
		$('#s2_demo3').select2({
			placeholder: "Select a state"
		});

		// placeholder
		$("#s2_demo4").select2({
			placeholder: "Select a State",
			allowClear: true
		});

		// Minimum Input
		$("#s2_demo5").select2({
			minimumInputLength: 2,
			placeholder: "Select a State",
		});


	});

})(window, document, window.jQuery);
