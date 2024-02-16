<!-- Modal -->
<div class="modal fade"  id="rincianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content" style="background-color:#1a2035;">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="confirmPesan" method="post">
            <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" id="idMenu" name="id_menu" class="form-control" value="">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" id="hargaMenu" name="harga" class="form-control" value="">
                        </div>
                      </div>
                  </div>
                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" name="jumlahPesan" id="jumlahPesan" class="form-control" value="" >
                        </div>
                      </div>
                  </div>
        

  <div class="keypad dark"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

<script>
  (function($){
  $.fn.keypad = function(confirmPin, options){
    var globalSettings = $.extend({}, $.fn.keypad.defaults, options);
		var keypads = $();
		this.each(function()
		{
			let $element = $(this),
          $backspace,
          $enteredNumbers,
          $numbers,
          $confirm,
          STATE = {mouseDownTime: 0, enteredPin: '' },
          backSpaceInterval = null,
          addToEnteredNumbers,
          backspaceOnPin,
          clearPin,
          settings = $.extend({}, globalSettings, $element.data('keypad-options'));
      
      addToEnteredNumbers = function(e){
        var num = $('<div class="num">'),
            numVal = isNaN(e) ? $(this).data("num") : e;
        num.text(numVal);
        $enteredNumbers.append(num);
        STATE.enteredPin += numVal;
        //setTimeout(() => num.addClass('hidden'), 500);
      }
      
      backspaceOnPin = function(e){
        const $toBeRemoved = $enteredNumbers.children().last();
        $toBeRemoved.addClass('erased');
        setTimeout(() => {
          $toBeRemoved.remove();
          if (STATE.enteredPin.length >= 1) STATE.enteredPin = STATE.enteredPin.slice(0, -1);
        }, 100);
      }
      
      clearPin = function(e){
        $enteredNumbers.empty();
        STATE.enteredPin = '';
      }
      
      $element.addClass("keypad").attr("tabindex", 0);
      $element.append(`<div class="keypad-input-field">
    <div class="entered-numbers-wrapper">
      <div class="entered-numbers"></div>
    </div>
    <div class="backspace">
      <div class="hover-dot backspace-icon"><i class="fa fa-times"></i></div>
    </div>
  </div>
  <div class="keypad-numbers"></div>
      `);
      
      $element.on('focus', function(){
        $element.addClass("focus");
      });
      $element.on('blur', function(){
        $element.removeClass("focus");
      });
      
      $backspace = $element.find(".backspace")
        .on("mousedown", function() {
        STATE.mouseDownTime = moment().valueOf();
        backSpaceInterval = setInterval(() => {
          const timeDiff = moment().valueOf() - STATE.mouseDownTime;
          if (timeDiff >= 1000) clearPin();
        }, 100);
      })
        .on("mouseup", function() {
        const timeDiff = moment().valueOf() - STATE.mouseDownTime;
        clearInterval(backSpaceInterval);
        if (timeDiff < 1000) {
          backspaceOnPin();
        }
      })
        .on("mouseleave", function() {
        clearInterval(backSpaceInterval);
      });
      
      $enteredNumbers = $element.find(".entered-numbers");
      $numbers = $element.find(".keypad-numbers");
      
      $.each(settings.keys, function(index, item){
        var $key = $(`<div class="item-wrapper hover-dot">
      <div class="item">
        <h1>${item.num}</h1>
        <h2>${item.alpha}</h2>
      </div>
    </div>`)
        if(item.num == 0){
          $key.addClass("zero")
        }
        $key.data("num", item.num)
        $key.on('click', addToEnteredNumbers);
        $numbers.append($key);
      })
      
      $confirm = $(`<div class="item-wrapper hover-dot" class="confirm">
      <div class="item"><i class="fa fa-check"></i></div>
    </div>`);
      $confirm.on('click', function(){
        confirmPin(STATE.enteredPin);
        key.clear();
      });
      $numbers.append($confirm);
      
      // Interface
			$element.data('keypad', {
				addToEnteredNumbers:	addToEnteredNumbers,
        backspaceOnPin: backspaceOnPin,
				clearPin:	clearPin
			});
      $(window).on('keydown', function(e){
        if ($element.hasClass('focus'))
        {
          if (e.keyCode >= 48 && e.keyCode <= 57) {
            let num = (e.keyCode - 48).toString();
            addToEnteredNumbers(num);
          } else
          {
            switch (e.keyCode) {
              case 8:
                backspaceOnPin();
                break;
              case 13:
                confirmPin(STATE.enteredPin);
                break;
              default:
                break;
            }
          }
        }
      });
     
			keypads = keypads.add($element); 
		});
		return keypads;
	};
  
  $.fn.getKeypad = function(){
		return this.closest('.modal-body .keypad');
	};
  
  $.fn.clear = function(){
		this.each(function()
		{
			var keypad = $(this).getKeypad(),
				data = (keypad.length > 0) ? keypad.data('keypad') : false;
			// If valid
			if (data)
			{
				data.clearPin();
			}
		});
		return this;
	};
  
  $.fn.addNumber = function(value){
		this.each(function()
		{
			var keypad = $(this).getKeypad(),
				data = (keypad.length > 0) ? keypad.data('keypad') : false;
			// If valid
			if (data)
			{
				data.addToEnteredNumbers(value);
			}
		});
		return this;
	};
  
  $.fn.keypad.defaults = {
    keys: [
      {num: 1, alpha: ""},
      {num: 2, alpha: "ABC"},
      {num: 3, alpha: "DEF"},
      {num: 4, alpha: "GHI"},
      {num: 5, alpha: "JKL"},
      {num: 6, alpha: "MNO"},
      {num: 7, alpha: "PQRS"},
      {num: 8, alpha: "TUV"},
      {num: 9, alpha: "WXYZ"},
      {num: 0, alpha: "+"},
    ]
  };
  
})(jQuery);


/* DEMO */
 var key = $(".modal-body .keypad").keypad(function(pin){
  alert(pin);
  $(".modal-body #jumlahPesan").val(pin);
});

setTimeout(function(){
  key.addNumber(1);
}, 500)

setTimeout(function(){
  key.addNumber(2);
}, 1000)

setTimeout(function(){
  key.addNumber(3);
}, 1500)

setTimeout(function(){
  key.addNumber(4);
}, 2000)

setTimeout(function(){
  key.clear();
}, 5000)

$(document).on('submit','#confirmPesan',function(e){
    e.preventDefault();
    $('#rincianModal').modal('hide');
    $.ajax({
    method:"POST",
    url: "api_simpan_rincian.php",
    data:$(this).serialize(),
    success: function(data){
      tampil_rincian();
    /*if(data === 'success') {
        window.location.href="dashboard.php";
    } else {
      md.showLoginNotification('top','left');
    }*/
     
}});
});
</script>