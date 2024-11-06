<?php
 
 use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

$writer = new PngWriter();

// Create QR code
$qrCode = QrCode::create($url)
    ->setEncoding(new Encoding('UTF-8'))
    ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
    ->setSize(250)
    ->setMargin(10)
    ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
    ->setForegroundColor(new Color(0, 0, 0))
    ->setBackgroundColor(new Color(255, 255, 255)); 
$result = $writer->write($qrCode );

// Validate the result 
//echo $result->getString();
?> 

<script>
    function show_QR_code ()  {
  console.log('show_modal') 
  var myModal = new bootstrap.Modal(document.getElementById('myModal_qrcode'), {
      keyboard: false
  }); 
  myModal.show()
}
</script>

<div class="modal fade" id="myModal_qrcode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header text-white"  style=" background-color: var(--bs-primary);">
                    <h5 class="modal-title" id="myModal_title">คิวอาร์โค้ดของฉัน</h5>
                    <button type="button" class="btn text-white  " data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body bg-light">
                    <div class=" row justify-content-center"> 
                        <img class="img-fluid rounded"
                            src="data:image/png;base64, {!! base64_encode( $result->getString()) !!} ">
                        
                    </div> 
                </div>

            </div>
        </div>
    </div>