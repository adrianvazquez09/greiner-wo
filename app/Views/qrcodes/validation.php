<form method="POST" action="<?php echo base_url();?>/QRCodes/checkData">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Validar si existe un codigo QR
                    </h2>
                </div>
                <div id="alert" >
                
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h2 class="card-inside-title">Codigo QR</h2>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Introducir QR" name="qr_code" id="qr_code" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="enviar" class="btn bg-blue btn-block btn-lg waves-effect">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    console.log("Starting application");

    window.onload = function() {
        document.getElementById('qr_code').value='';
        document.getElementById("qr_code").focus();
    }
</script>