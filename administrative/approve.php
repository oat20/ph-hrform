<?php 
require_once '../admin/compcode/include/config.php';
require_once '../inc/mysqli-inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark">
    <title>APPROVE TRANSACTION</title>
    <?php require_once '../lib/css-inc.php';?>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top navbar-embossed navbar-lg">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    APPROVE TRANSACTION
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <form style="margin-bottom: 10px;" method="POST" action="#">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                <label>หมวดหมู่</label>
                <p class="form-control-static">แบบบันทึกขออนุมัติปฏิบัติงานพัฒนาบุคลากร / บริการวิชาการ</p>
                </div>
                <!--col-->
                <div class="col-xs-12 col-sm-12 col-md-6">
                <label>ส่วนงาน</label>
                <p class="form-control-static">AAA</p>
                </div>
                <!--col-->
                </div>
                <!--row-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>ผู้ขออนุมัติ</label>
                    <p class="form-control-static">AAA</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>ตำแหน่ง</label>
                    <p class="form-control-static">AAA</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>โครงการ</label>
                    <p class="form-control-static">AAA</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>สถานที่จัดโครงการ</label>
                    <p class="form-control-static">AAA</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>เริ่ม</label>
                    <p class="form-control-static">xx/xx/xxxx xx:xx</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>สิ้นสุด</label>
                    <p class="form-control-static">xx/xx/xxxx xx:xx</p>
                </div>
            </div>
            <label><i class="fa fa-paperclip fa-fw"></i> เอกสารเกี่ยวกับโครงการ</label>
            <p class="form-control-static"><a href="<?php echo $livesite;?>phpm/attachment/" target="_blank"><?php echo $livesite;?>phpm/attachment/</a></p>
            <div class="form-group">
                <label>บันทึกข้อความถึงผู้ขออนุมัติ <small class="text-muted">(Optional)</small></label>
                <textarea name="dev_approve_note" class="form-control" rows="4"></textarea>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <label>MU Email</label>
                        <p class="form-control-static" id="form-control-static-muemail">name.sur@mahidol.ac.th</p>
                    </div>
                </div>
                <!--col-->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                <label><strong>Your OTP</strong></label>
                <div class="input-group">
                    <span class="input-group-addon" id="input-group-addon-refid">Ref. ID xxx</span>
                <input type="text" class="form-control input-lg text-uppercase" placeholder="กรอกรหัส OTP" name="dev_otp" required>
                </div>
            </div>
                </div>
                <!--col-->
            </div>
            <!--row-->
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <button type="button" class="btn btn-primary btn-block" id="btn-approved" data-approve="approve" data-toggle="modal" data-target="#modal-dialog"
                    data-title="อนุมัติรายการ"><i class="fa fa-check fa-fw"></i>
                        อนุมัติ</button>
                    <hr class="visible-xs visible-sm">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <button type="button" class="btn btn-default btn-block" id="btn-disapproved" data-approve="not" data-toggle="modal" data-target="#modal-dialog"
                    data-title="ไม่อนุมัติรายการ"><i class="fa fa-exclamation fa-fw"></i>
                        ไม่อนุมัติ</button>
                </div>
            </div>
        </form>
    </div>

    <!--modal dialog confirm-->
    <div class="modal fade" id="modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./approve-action.php">
                        <div class="form-group">
                            <label class="text-muted"><strong>MU Email</strong></label>
                            <p class="form-control-static" id="dev-approve-name"></p>
                            <input type="hidden" name="dev_approve_name">
                        </div>
                        <div class="form-group">
                            <label class="text-muted"><strong>บันทึกข้อความถึงผู้ขออนุมัติ</strong></label>
                            <p class="form-control-static" id="dev-approve-note"></p>
                            <input type="hidden" name="dev_approve_note">
                        </div>
                        <div class="form-group">
                            <label class="text-muted"><strong>Your OTP</strong></label>
                            <p class="form-control-static" id="dev-otp"></p>
                            <input type="hidden" name="dev_otp">
                        </div>
                        <input type="hidden" name="dev_id">
                        <input type="hidden" name="dev_approve">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary">ยืนยันข้อมูล</button>
                </div>
            </div>
        </div>
    </div>

    <?php require_once '../lib/js-inc.php';?>
    <script>
        $(function () {
                //approve
            /*document.getElementById('btn-approved').addEventListener('click', function (event) {
                Swal.fire({
                    icon: 'success',
                    title: 'ยืนยันอนุมัติรายการ',
                    showCancelButton: true
                }).then(function (result) {
                    console.log(result);
                    if (result.isConfirmed) {
                        $.post('',
                            {
                                approve: '',
                                note: '',
                                otp: '',
                                dev_id: ''
                            },
                            function (data, status) {

                            });
                    }
                });
            });*/
            $('#modal-dialog').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var title = button.data('title') // Extract info from data-* attributes
                var approve=button.data('approve');
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text(title);

                var dev_id = $('#input-group-addon-refid').text().split(" ");
                var dev_approve_note = $('textarea[name="dev_approve_note"]').val();
                var dev_otp = $('input[name="dev_otp"]').val().toUpperCase();
                var dev_approve_name = $('#form-control-static-muemail').text();

                modal.find('#dev-approve-note').html(dev_approve_note);
                modal.find('input[name="dev_approve_note"]').val(dev_approve_note);

                modal.find('#dev-otp').html(dev_otp);
                modal.find('input[name="dev_otp"]').val(dev_otp);

                modal.find('#dev-approve-name').html(dev_approve_name);
                modal.find('input[name="dev_approve_name"]').val(dev_approve_name);

                modal.find('input[name="dev_id"]').val(dev_id[2]);
                modal.find('input[name="dev_approve"]').val(approve);
            });

            //disapprove
            /*$('#btn-disapproved').click(function (event) {
                Swal.fire({
                    title: 'ยืนยันไม่อนุมัติรายการ',
                    icon: 'warning',
                    showCancelButton: true
                }).then(function (result) {
                    console.log(result);
                    if (result.isConfirmed) {
                        $.post('',
                            {
                                approve: '',
                                note: '',
                                otp: '',
                                dev_id: ''
                            },
                            function (data, status) {

                            });
                    }
                });
            });*/
            });
    </script>
</body>
</html>