<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Supplier Name/Company Name</label>
                                            <input id="name" type="text" class="form-control" disabled>
                                            <span id="nameError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Supplier Code</label>
                                            <input id="code" type="text" class="form-control" disabled>
                                            <span id="codeError" class="errorSpan text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <label>Supplier Address</label>
                                            <input id="address" type="text" class="form-control">
                                            <span id="addressError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;">
                                            <label>Supplier Contact No</label>
                                            <div id="phone" class="row justify-content-between form-control" style="display: flex; height: auto; line-height: normal; padding: 0; margin: 0;">
                                                <div class="col-xs-3 px-0">
                                                    <select id="dialCode" class="form-control" style="border: none;">
                                                    </select>
                                                </div>
                                                <input id="contact" type="text" class="form-control col-xs-8" style="border: none;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');  this.value = this.value.match(/^[0-9]{0,30}/);">
                                            </div>
                                            <span id="phoneError" class="customError text-danger"></span>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;">
                                            <label>Status</label>
                                            <div id="status" class="m-b-20">
                                                <!-- <div class="radio radio-info radio-inline"> -->
                                                <div class="radio radio-inline">
                                                    <input id="active" type="radio" value="Active" name="statusRadio" class="statusRadio" />
                                                    <label for="active">
                                                        <?php echo $translations['A00372'][$language]; /* Active */?>
                                                    </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input id="inActive" type="radio" value="Inactive" name="statusRadio" class="statusRadio" />
                                                    <label for="inActive">
                                                        <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                            <button type="button" id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00323'][$language]; /* Submit */?>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>

<script>
var resizefunc = [];</script>
<?php include("shareJs.php"); ?>

<script>

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var supplierID = "<?php echo $_POST['supplierID']; ?>";
    var editFlag = '<?php echo $_SESSION['invEditable']; ?>';

    $(document).ready(function() {
        if(editFlag == 0){
            $('#address').prop('disabled',true);
            $('#dialCode').prop('disabled',true);
            $('#contact').prop('disabled',true);
            $('.statusRadio').prop('disabled',true);
        }else{
            $('#address').prop('disabled',false);
            $('#dialCode').prop('disabled',false);
            $('#contact').prop('disabled',false);
            $('.statusRadio').prop('disabled',false);
        }

        var formData  = {
            command: 'getSupplierDetail',
            supplierID: supplierID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            $('.customError').text('');

            var name = $('#name').val();
            var code = $('#code').val();
            var address = $('#address').val();
            var dialCode = $('#dialCode option:selected').val();
            var contact = $('#contact').val();
            var status = $("input[name=statusRadio]:checked").val();

            var formData  = {
                command     : 'editSupplier',
                supplierID  : supplierID,
                name        : name,
                code        : code,
                address     : address,
                dialCode    : dialCode,
                contact     : contact,
                status      : status
            };

            fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#backBtn').click(function() {
            $.redirect('supplier.php');
        });
    });

    function SortByName(a, b){
        var aName = a.name.toLowerCase();
        var bName = b.name.toLowerCase(); 
        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
    }

    function loadDefaultListing(data, message) {
        if(data.validCountry) {
            var dialCode = data.validCountry;
            dialCode.sort(SortByName);
            $.each(dialCode, function(k, v) {
                $('#dialCode').append(`<option value="${v['country_code']}" display="${v['name']}">+${v['country_code']}</option>`);
            });
        }
        $('#name').val(data.name);
        $('#code').val(data.code);
        $('#address').val(data.address);
        $('#dialCode option[value="'+data.dialCode+'"]').prop('selected', true);
        $('#contact').val(data.phone);
        $('input[name=statusRadio]').filter('[value='+data.status+']').prop('checked', true);
    }

    function focus() {
      [].forEach.call(this.options, function(o) {
        o.textContent = o.getAttribute('display') + ' (+' + o.getAttribute('value') + ')';
      });
    }
    function blur() {
      [].forEach.call(this.options, function(o) {
        // console.log(o);
        o.textContent = '+'+o.getAttribute('value');
      });
    }

    [].forEach.call(document.querySelectorAll('#dialCode'), function(s) {
        s.addEventListener('focus', focus);
        s.addEventListener('blur', blur);
        blur.call(s);
    });

    $('#dialCode').change(function() {
        $('#dialCode').blur();
    });

    function submitCallback(data, message) {
        showMessage(message, 'success', 'Add Supplier', 'edit', 'supplier.php');
    }

</script>
</body>
</html>

