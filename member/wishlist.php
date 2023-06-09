<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Cart Title -->
<section class="section checkoutBg">
    <div class="titleText larger bold text-white text-center text-md-left" data-lang="M04028"><?php echo $translations['M04028'][$language] /* My Wishlist */ ?></div>
</section>

<section class="section whiteBg">
    <div class="row mb-5 mb-md-0">
        <div class="col-12" id="wishlist">
            
        </div>
    </div>
</section>

<div class="modal fade" id="removeConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title showLangCode" data-lang="M03825">
                    <?php echo $translations['M03825'][$language] /* Remove Confirmation */ ?>
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage">
                    <span class="showLangCode" data-lang="M04029">
                        <?php echo $translations['M04029'][$language] /* Doing this action will delete the item from your wishlist, are you sure you want to do this? */ ?>
                    </span>
                </div>
            </div>
            <div class="modal-footer pb-4">
                <button type="button" class="btn btn-primary grey py-2 mr-3" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M00278">
                        <?php echo $translations['M00278'][$language] /* Cancel */ ?>
                    </span>
                </button>
                <button onclick="removeItemFromWishlist()" type="button" class="btn btn-primary py-2" data-dismiss="modal">
                    <span class="showLangCode text-white" data-lang="M02539">
                        <?php echo $translations['M02539'][$language] /* Confirm */ ?>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>


<script>

var url                     = 'scripts/reqDefault.php';
var method                  = 'POST';
var debug                   = 0;
var bypassBlocking          = 0;
var bypassLoading           = 0;

var selectedId;

$(document).ready(function() {
    getWishlist();
});



</script>