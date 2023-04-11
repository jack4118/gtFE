<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row tableDiv text-center">
                    <div class="col-lg-12">
                        <div class="col-lg-12 row dashboardSection px-0">
                           <div class="col-lg-4 col-md-12 row mx-0 m-t-rem3 m-b-rem3">
                               <div class="col-lg-4 col-md-12">
                                   <img src="images/2.png" class="dashboardIcon">
                               </div>
                               <div class="col-lg-8 col-md-12 px-0">
                                   <h1><b id="totalOutOfStock" class="text-danger font-weight-bold"></b></h1>
                                   <p style="color:black;">Out of Stocks Product</p>
                                   <a href="outOfStockListing.php" class="detailBtn">More Details ></a>
                               </div>
                           </div>
                           <div class="col-lg-8 col-md-12 px-0">
                               <table id="outOfStockTable" class="dashboardTable table-responsive">
                               </table>
                           </div>
                        </div>
                    </div>
                </div>

                <div class="row m-t-rem1 tableDiv text-center">
                    <div class="col-lg-12">
                        <div class="col-lg-12 row dashboardSection px-0">
                           <div class="col-lg-4 col-md-12 row mx-0 m-t-rem3 m-b-rem3">
                               <div class="col-lg-4 col-md-12">
                                   <img src="images/1.png" class="dashboardIcon">
                               </div>
                               <div class="col-lg-8 col-md-12 px-0">
                                   <h1><b id="totalLowStock" class="text-danger font-weight-bold"></b></h1>
                                   <p style="color:black;">Low Stocks Product</p>
                                   <a href="lowStockListing.php" class="detailBtn">More Details ></a>
                               </div>
                           </div>
                           <div class="col-lg-8 col-md-12 px-0">
                               <table id="lowStockTable" class="dashboardTable table-responsive">
                               </table>
                           </div>
                        </div>
                    </div>
                </div>

                <div class="row m-t-rem1 tableDiv text-center">
                    <div class="col-lg-12">
                        <div class="col-lg-12 row dashboardSection px-0">
                           <div class="col-lg-4 col-md-12 row mx-0 m-t-rem3 m-b-rem3">
                               <div class="col-lg-4 col-md-12">
                                   <img src="images/3.png" class="dashboardIcon">
                               </div>
                               <div class="col-lg-8 col-md-12 px-0">
                                   <h1><b id="totalProductSelling" style="color: #1b87b5;"></b></h1>
                                   <p style="color:black;">Count of All Products</p>
                                   <a href="getProductInventory.php" class="detailBtn">More Details ></a>
                               </div>
                           </div>
                           <div class="col-lg-8 col-md-12 px-0">
                               <table id="allStockTable" class="dashboardTable table-responsive">
                               </table>
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
    var resizefunc = [];
</script>

<?php include("shareJs.php"); ?>

<script>
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array (
        "<?php echo $translations['A00102'][$language]; /* username */ ?>",
        "<?php echo $translations['A00117'][$language]; /*Fullname */ ?>",
        "<?php echo $translations['A01033'][$language]; /* Login On */ ?>"
    );

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 1;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        var formData  = {
            command: 'getProductStockDetail'
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    function loadDefaultListing(data, message) {
        // OUT OF STOCK TABLE

        var outOfStockTableHTML =   `<tr class="text-left">
                                        <td>
                                            <b>Date</b>
                                        </td>
                                        <td>
                                            <b>Product Code</b>
                                        </td>
                                        <td>
                                            <b>Product Name</b>
                                        </td>
                                        <td>
                                           
                                        </td>
                                    </tr>`;
        if(data.outOfStock && data.outOfStock != "-"){
            $.each(data.outOfStock, function(k, v) {
                outOfStockTableHTML +=  `

                                    <tr class="text-left">
                                        <td>
                                            ${v['outOfStockDate']}
                                        </td>
                                        <td>
                                            ${v['productCode']}
                                        </td>
                                        <td>
                                            ${v['productName']}
                                        </td>
                                        <td>
                                            <a onclick="addStock(${v['productID']})" href="javascript:;" class="addStockBtn">Add Stock</a>
                                        </td>
                                    </tr>
                                        `;
            })
            $("#outOfStockTable").html(outOfStockTableHTML);
        }
        else{
            outOfStockTableHTML +=  `
                                    <tr style="height:150px;">
                                        <td colspan="4" class="text-center">
                                            No Results Found
                                        </td>
                                    </tr>
                                        `;
                                        
            $("#outOfStockTable").html(outOfStockTableHTML);
        }

        // LOW STOCK TABLE

        var lowStockTableHTML =   `<tr class="text-left">
                                        <td>
                                            <b>Date</b>
                                        </td>
                                        <td>
                                            <b>Product Code</b>
                                        </td>
                                        <td>
                                            <b>Product Name</b>
                                        </td>
                                        <td class="text-right">
                                            <b>Quantity</b>
                                        </td>
                                        <td>
                                           
                                        </td>
                                    </tr>`;
        if(data.lowInStock && data.lowInStock != "-"){
            $.each(data.lowInStock, function(k, v) {
                lowStockTableHTML +=  `

                                    <tr class="text-left">
                                        <td>
                                            ${v['lowInStockDate']}
                                        </td>
                                        <td>
                                            ${v['productCode']}
                                        </td>
                                        <td>
                                            ${v['productName']}
                                        </td>
                                        <td class="text-right">
                                            ${numberThousand(v['productQuantity'],0)}
                                        </td>
                                        <td>
                                            <a onclick="addStock(${v['productID']})" href="javascript:;" class="addStockBtn">Add Stock</a>
                                        </td>
                                    </tr>
                                        `;
            })
            $("#lowStockTable").html(lowStockTableHTML);
        }
        else{
            lowStockTableHTML +=  `
                                    <tr style="height:150px;">
                                        <td colspan="5" class="text-center">
                                            No Results Found
                                        </td>
                                    </tr>
                                        `;
            $("#lowStockTable").html(lowStockTableHTML);
        }

        // ALL PRODUCT TABLE

        var allStockTableHTML =     `<tr class="text-left">
                                        <td>
                                            <b>Product Code</b>
                                        </td>
                                        <td>
                                            <b>Product Name</b>
                                        </td>
                                        <td class="text-right">
                                            <b>Quantity Sold</b>
                                        </td>
                                    </tr>`;
        if(data.allProduct && data.allProduct != "-"){
            $.each(data.allProduct, function(k, v) {
                if(k != "totalProductSelling"){
                    allStockTableHTML +=  `
                                    <tr class="text-left">
                                        <td>
                                            ${v['productCode']}
                                        </td>
                                        <td>
                                            ${v['productName']}
                                        </td>
                                        <td class="text-right">
                                            ${numberThousand(v['quantitySold'],0)}
                                        </td>
                                    </tr>
                                        `;
                }
                
            })
            
            $("#allStockTable").html(allStockTableHTML);
        }
        else{
            allStockTableHTML +=  `
                                    <tr style="height:150px;">
                                        <td colspan="3" class="text-center">
                                            No Results Found
                                        </td>
                                    </tr>
                                        `;
            $("#allStockTable").html(allStockTableHTML);
        }
        $("#totalOutOfStock").html(data.totalOutOfStock?data.totalOutOfStock:0);
        $("#totalLowStock").html(data.totalLowInStock?data.totalLowInStock:0);
        $("#totalProductSelling").html(data.totalProductSelling?data.totalProductSelling:0);

    }

function addStock(id){
    $.redirect("invProductAdjustment.php",{
        invProductID : id
    });
}
</script>
</body>
</html>
