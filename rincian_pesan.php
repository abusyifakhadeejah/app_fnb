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
        <form>
            <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Menu</label>
                          <input type="text" id="idMenu" name="id_menu" class="form-control" value="">
                        </div>
                      </div>
                  </div>
                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jumlah Pesam</label>
                          <input type="text" name="jumlahPesan" id="jumlahPesan" class="form-control" >
                        </div>
                      </div>
                  </div>
        </form>
        <div class="calc-screen">
        <textarea type="text" id = "inputtext" placeholder="0"></textarea>
    </div>
        <div class="calc-button-row">
            <button class="ac">AC</button>
            <button class="opt">&#43;&#47;&#8722;</button>
            <button class="opt">&#37;</button>
            <button class="opt">&#247;</button>
            <button>7</button>
            <button>8</button>
            <button onclick="dis('9')" onkeydown="myFunction(event)">9</button>
            <button class="opt">&#215;</button>
            <button>4</button>
            <button>5</button>
            <button>6</button>
            <button class="opt">&#8722;</button>
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button class="opt">&#43;</button>
            <button>0</button>
            <button>.</button>
            <button>&#9003;</button>
            <button class="opt">&#61;</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
        const input = document.getElementById('inputtext');
        const buttons = document.querySelectorAll('button');

        function calculate(expression) {
            console.log(expression);
            console.log(typeof(expression));
            try {
                return new Function('return ' + expression)();
            } catch (error) {
                return 'Malformed Operation';
            }
        }


        function operation(buttonValue) {
            if (buttonValue === 'C') {
                input.value = '';
            } else if (buttonValue === 'DEL') {
                input.value = input.value.slice(0, -1);
            } else if (buttonValue === '=') {
                input.value = calculate(input.value);
            } else {
                input.value += buttonValue;
            }
        }

        buttons.forEach(button => {
            let buttonValue = button.innerText;
            button.addEventListener('click', function () {
                operation(buttonValue);
            });
        });
</script>