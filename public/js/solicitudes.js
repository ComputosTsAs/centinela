
// document.addEventListener('DOMContentLoaded', e => {
// console.log('hola mundo');

//     let input = document.querySelector("#status_id").addEventListener('click', cambiar());
//     let row2 = document.querySelector("#who_takes_row");

//     // document.getElementById("status_id").addEventListener("change", e => {
//         // e.preventDefault
//     function cambiar(){
//         let input = document.querySelector("#status_id");
//         console.log(input.value);
//         if(input.value != 2){
//             console.log('hola mundo2');
//             //row2.classList.add("hidden");
//             // row2.style.visibility = "hidden";
//             row2.style.display='block';
        
//             //  row.innerHTML = '<div class="col-md-6"><div class="form-group">  {!! Form::label("who_takes", "Retiró") !!} {!! Form::textarea("who_takes", $solicitud->who_takes, ["class" => "form-control"]) !!}</div></div>'; 
//         }else{
//             row2.style.display='none';
//         }
//     }
       
//     // })



// })



// $(document).ready(function(){
//     $("#hide").on('click', function() {
//         $("#who_takes_row").hide();
//         return false;
//     });
 
//     $("#show").on('click', function() {
//         $("#who_takes_row").show();
//         return false;
//     });
// });

jQuery(document).ready(function(){


    var valueStatus = ($("#status_id option:selected").val());

    console.log(valueStatus);

        if(valueStatus == 2){

            console.log('heello worldd');

            $('#who_takes_row').show(); //muestro mediante id 
        } else{
            console.log('noo');
            $('#who_takes_row').hide(); //oculto mediante id
        }




    // $("#status_id").on( "click", function() {
    //     $('#who_takes').show(); //muestro mediante id
    //     // $('.target').show(); //muestro mediante clase
    //  });
    $("#status_id").on( "change", function() {
        var valueStatus = ($("#status_id option:selected").val());;
       
        if(valueStatus == 2){
           
            $('#who_takes_row').show(); //muestro mediante id 
            $('#who_takes').prop('required', true);
          
        } else{
           
            $('#who_takes_row').hide(); //oculto mediante id
            $('#who_takes').prop('required', false);
           
        }
       
        // $('.target').hide(); //muestro mediante clase
    });
});
