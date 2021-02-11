
function change_kiosk_state(side,kioskName) {

  // var class_left = document.getElementById("kiosk_terminal_left").getAttribute("class");
  // var class_right = document.getElementById("kiosk_terminal_right").getAttribute("class");

  // var state_left = 0;
  // var state_right = 0;

  // if (side == 0){
  //   if (class_left == 'btn btn-danger pull-right'){
  //     state_left = 1;
  //   }
  //   if (class_right == 'btn btn-success pull-right'){
  //     state_right = 1;
  //   }
  // }

  // if (side == 1){
  //   if (class_right == 'btn btn-danger pull-right'){
  //     state_right = 1;
  //   }
  //   if (class_left == 'btn btn-success pull-right'){
  //     state_left = 1;
  //   }
  // }

  //   var kiosk_id = "<?php echo $kiosk_id ?>";
  //   var send_data = {'kiosk_id': kiosk_id, 'state_left': state_left, 'state_right': state_right}
  //   $.ajax({
  //       type: 'POST',
  //       data: send_data,
  //       // contentType: 'application/jsonp',
  //       url: 'followersdata_state.php',
  //       success: function(response) {
  //           console.log(response);
  //           //var data = JSON.parse(response);
  //           alert("Operation is done!!!");
  //     kiosk_info ();

  //     },
  //       error: function( jqXhr, textStatus, errorThrown ){
  //           console.log( errorThrown );
  //           // document.location.reload(true);
  //     alert("Something wrong!!! Try again.");
  //       }
  //   });

  alert("Kiosk "+ kioskName + "Value:" + side );

  }

