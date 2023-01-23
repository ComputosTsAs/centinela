
document.addEventListener('DOMContentLoaded', e => {
console.log('hola mundo');

    let input = document.querySelector("#status_id");
    let row2 = document.querySelector("#who_takes_row");

    // document.getElementById("status_id").addEventListener("change", e => {
        // e.preventDefault
        console.log(input.value);
        if(input.value != 2){
            console.log('hola mundo2');
            row2.classList.add("hidden");
        
            //  row.innerHTML = '<div class="col-md-6"><div class="form-group">  {!! Form::label("who_takes", "Retiró") !!} {!! Form::textarea("who_takes", $solicitud->who_takes, ["class" => "form-control"]) !!}</div></div>'; 
        }
    // })



})