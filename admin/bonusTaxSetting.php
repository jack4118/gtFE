<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row"> 

                        <div class="col-lg-12 col-md-12">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="" class="text-center alert" style="display: none;"></div>
                                                <div class="col-sm-12">
                                                  <table id="taxTable" class="table table-striped table-bordered no-footer m-0">
                                                      <thead>
                                                          <tr>
                                                              <th>No.</th>
                                                              <th>Min Bonus Amount</th>
                                                              <th>NPWP Tax</th>
                                                              <th>Non NPWP Tax</th>
                                                              <th></th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="taxListing">
                                                          
                                                      </tbody>
                                                  </table>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                    <a id ="addBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3 m-r-10" onclick="">Add</a>
                                                    <a id ="submitBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3" onclick=""><?php echo $translations['A00323'][$language]; /* Submit */?></a>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                        
                  
                    <!-- End row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";
    
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var tier = 0;

    $(document).ready(function() {

        var formData = {
            command  : "getTaxPercentage",
        };
        var fCallback = loadLeaderListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
       
  });

     $('#submitBtn').click(function() {
        $('.errorSpan').empty();

        var passData = [];
        $.each($(".taxListing"), function(k, v){
            var buildObj = {
                tier : $(v).find(".tier").text(),
                minBonusAmt : $(v).find(".minBonusAmt").val(),
                npwpTax : $(v).find(".npwpTax").val(),
                nonNpwpTax : $(v).find(".nonNpwpTax").val(),
            };

            passData.push(buildObj);
            
        }) 

        var formData = {
            command  : "addTaxPercentage",
            bonusSetting : passData,
        };
        var fCallback = successUpdate;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

     });



   function loadLeaderListing(data, message) {
        var bonusTaxStgArr = data.bonusTaxStgArr;
        var taxListing = "";
        var errorDisplay = "";

        $.each(bonusTaxStgArr, function (k, v) {
                tier++;
                taxListing += `
                            <tr class="taxListing">
                                <td class="tier">${v['tier']}</td>
                                <td>
                                    <input class="minBonusAmt" value="${v['minBonusAmt']}">
                                    <div id="minBonusAmt${tier}Error" class="errorSpan text-danger"></div>
                                    <div id="nonNpwpminBonusAmtTax${tier}Error" class="errorSpan text-danger"></div>
                                </td>
                                <td>
                                    <input class="npwpTax" value="${v['npwpTax']}">
                                    <div id="npwpTax${tier}Error" class="errorSpan text-danger"></div>
                                </td>
                                <td>
                                    <input class="nonNpwpTax" value="${v['nonNpwpTax']}">
                                    <div id="nonNpwpTax${tier}Error" class="errorSpan text-danger"></div>
                                </td>
                                <td>
                                    <a href="#" type="button" class="btn btn-primary deleteBtn" onclick="SomeDeleteRowFunction(this)" style="display: none; width: 40px;"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                `

                
                $('#taxListing').html(taxListing);
            });

        $('#addBtn').click(function() {
            $('.deleteBtn').hide();
            tier++;
            taxListing = `
                            <tr class="taxListing">
                                <td class="tier">${tier}</td>
                                <td>
                                    <input class="minBonusAmt" value="">
                                    <div id="minBonusAmt${tier}Error" class="errorSpan text-danger"></div>
                                    <div id="nonNpwpminBonusAmtTax${tier}Error" class="errorSpan text-danger"></div>
                                </td>
                                <td>
                                    <input class="npwpTax" value="">
                                    <div id="npwpTax${tier}Error" class="errorSpan text-danger"></div>
                                </td>
                                <td>
                                    <input class="nonNpwpTax" value="">
                                    <div id="nonNpwpTax${tier}Error" class="errorSpan text-danger"></div>
                                </td>
                                <td>
                                    <a href="#" type="button" class="btn btn-primary deleteBtn" onclick="SomeDeleteRowFunction(this)" style="width: 40px;"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                `
            $('#taxListing').append(taxListing);
        });

        
        $("table tr:last-child").find('.deleteBtn').css('display', "block");

        }

        
    
    function successUpdate (data, message) {
        showMessage(message, 'success', 'Bonus Tax Setting', 'edit', 'bonusTaxSetting.php');
    } 

    function SomeDeleteRowFunction(n) {

        tier--;

        var p=n.parentNode.parentNode;
             p.parentNode.removeChild(p);

        $("table tr:last-child").find('.deleteBtn').css('display', "block");
    }

</script>
</body>
</html>
