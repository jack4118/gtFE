<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent loginPagePadding" style="position: relative;">
	<!-- <div class="kt-container"> -->
		<div class="col-12 pageTitle">
			<?php echo $translations['M03326'][$language]; // News and Announcement ?>
		</div>
		<div class="col-12">
			<div class="row" id="newsDiv">
				<!-- <div class="col-md-4 col-12 f-15">
					<div class="mt-4 section1_div p-0">
						<div id="dashboardBanner" class="slideshow-container">
							<div class="newsSlides1 newsSlides fading" style="display: block;">
								<a href="javascript:;">
									<img class="newsImg m-0 p-0" src="/images/project/banner1.jpg" alt="compProfileBanner">
								</a>
							</div>
							<div class="newsSlides1 newsSlides fading">
								<a href="javascript:;">
									<img class="newsImg m-0 p-0" src="/images/project/banner1.jpg" alt="compProfileBanner">
								</a>
							</div>
							<div>
								<div class="p-4 newsContent">
									<div class="pageTitle">
										Lorem Ipsum
									</div>
									<div class="mt-2 content grayFont">
										Lorem ipsum dolor sit amet, consectetur
										adipiscing elit. Nunc neque orci, venenatis
										fringilla orci et, eleifend sempur lacus.
										Curabitur id sem sit amet ipsum tristique
									</div>
								</div>
							</div>
							<div class="px-4 pb-4">
								<div class="row">
									<div class="col-10">
										<span class="newsSlideLines1 newsSlideLines" onclick="showSlides(1, 1)"></span> 
										<span class="newsSlideLines1 newsSlideLines" onclick="showSlides(1, 2)"></span>
									</div>
									<div class="col-12 text-right">
										<span class="newsArrow" id="1" onclick="newsPop(this)"><i class="fas fa-arrow-right"></i></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
		<!-- <div class="col-12">
			<div class="row" id="newsSection">
				<div class="col-12 f-15" id="noNews">
				</div>
			</div>
		</div> -->
	<!-- </div> -->
</section>

<div id="newsDetails">
	<!-- <div class="modal fade" id="newsCard1" role="dialog">
		<div class="modal-dialog modal-lg modalPage1" role="document">
			<div class="modal-content homepage_modal">
				<div class="modal-header pb-0 justify-content-end">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body px-5 pt-0 pb-3">
					<span class="modal-title mb-3 newsTitle">Lorem Ipsum</span>
					<img src="/images/project/banner1.jpg" style="width: 100%;">
					<div class="newsDes mt-3">
						Lorem ipsum dolor sit amet, consectetur
						adipiscing elit. Nunc neque orci, venenatis
						fringilla orci et, eleifend sempur lacus.
						Curabitur id sem sit amet ipsum tristique
					</div>
				</div>
				<div class="modal-footer px-5">
					<button type="button" class="btn btn-primary downloadDiv" id="1" onclick="createDownloadFile(this)"><?php echo $translations['M02972'][$language]; //Download ?></button>
				</div>
			</div>
		</div>
	</div> -->
</div>



<?php include 'footer.php'; ?>
</body>


<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var tempMediaUrl	= "<?php echo $config['tempMediaUrl'] ?>";

$(document).ready(function(){

	var formData  = {
		command: 'newsDisplay'
	};
	var fCallback = loadDefaultNewsListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
});

function loadDefaultNewsListing(data, message, obj)
{

	var newsCard = "";
	var newsDetails = "";

	if (data)
	{
		$("#newNotification").hide();


		$.each(data.details, function(key, value){
			// var dateTime = value["created_at"];
			// var date = dateTime.split(" ", 1);
			newsCard += `
				<div class="col-md-4 col-12 f-15">
					<div class="mt-4 section1_div p-0">
						<div id="dashboardBanner" class="slideshow-container">
							<div class="newsSlides fading" style="display: block;">
								<a href="javascript:;">
			`;

			if(value["base_64"] == null){
				newsCard += `
									<img class="newsImg m-0 p-0" src="/images/project/noProductImg.png">
				`;
			} else {
				newsCard += `
									<img class="newsImg m-0 p-0" src="${tempMediaUrl}${value["base_64"]}">
				`;
			}

			newsCard += `
								</a>
							</div>
							<div>
								<div class="p-4 newsContent">
									<div class="pageTitle">
										${value["subject"]}
									</div>
									<div class="mt-2 content grayFont">
										${value["description"]}
									</div>
								</div>
							</div>
							<div class="px-4 pb-4">
								<div class="row">
									<div class="col-12 text-right">
										<span class="newsArrow" id="${value["id"]}" onclick="newsPop(this)"><i class="fas fa-arrow-right"></i></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			`;
			$('#newsDiv').html(newsCard);

			/*newsCard +=`
				<div class="col-lg-3 col-md-4 col-12">
					<div class="col-12 newBox text-center" style="margin-top: 20px;">
						<div class="row">
							<div class="col-12 newsTitle newsTitleTextLimit">
								${value["subject"]}
							</div>
							<div class="col-12" style="margin-top: 10px;">
			`;

			if(value["base_64"] == null){
			newsCard +=`
								<img src="images/qtn/QTN-newsDefualt.png" class="imgFit">
			`;
			} else {
			newsCard +=`
								<img src="${tempMediaUrl}${value["base_64"]}" class="imgFit">
			`;
			}
			newsCard +=`
							</div>
							<div class="col-6 text-left newsReleaseDate">
								${date}
							</div>
							<div class="col-6 text-right" style="margin-top: 10px;">
								<button type="button" class="btn btn-primary" aria-hidden="true" id="${value["id"]}" onclick="newsPop(this)">View</button>
							</div>
						</div>
					</div>
				</div>	
			`;

			$('#newsSection').html(newsCard);*/

			newsDetails += `
				<div class="modal fade" id="newsCard${value["id"]}" role="dialog">
					<div class="modal-dialog modal-lg modalPage1" role="document">
						<div class="modal-content homepage_modal">
							<div class="modal-header pb-0 justify-content-end">
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body px-5 pt-0 pb-3">
								<span class="modal-title mb-3 newsTitle">${value["subject"]}</span>
			`;
			if(value["base_64"] == null){
				newsDetails += `
								<img src="/images/project/noProductImg.png" style="width: 100%;">
				`;
			} else {
				newsDetails += `
								<img src="${tempMediaUrl}${value["base_64"]}" style="width: 100%;">
				`;
			}
			newsDetails += `
								<div class="newsDes mt-3">
									${value["description"]}
								</div>
							</div>
			`;
			if(value['attachment_name'] != "Empty"){
				newsDetails += `
							<div class="modal-footer px-5">
								<button type="button" class="btn btn-primary downloadDiv" id="${value["id"]}" onclick="createDownloadFile(this)"><?php echo $translations['M02972'][$language]; //Download ?></button>
							</div>
				`;
			}
			newsDetails += `
						</div>
					</div>
				</div>
			`;

			$('#newsDetails').html(newsDetails);

			/*newsDetails +=`
				<div class="modal fade show" id="newsCard${value["id"]}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<span class="modalIcon"></span>
							<div class="modal-header">
								<span class="modal-title newsTitle">${value["subject"]}</span>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#000;"></button>
							</div>
							<div class="modalLine"></div>
							<div class="modal-body modalBodyFont">
			`;
			if(value["base_64"] == null){
			newsDetails +=`
								<img src="images/qtn/QTN-newsDefualt.png" style="width: 100%;">
			`;
			}else{
			newsDetails +=`
								<img src="${value["base_64"]}" style="width: 100%;">
			`;		
			}

			newsDetails +=`
								<div class="newsDes" style="margin-top: 10px;">${htmlDecode(value["description"])}</div>
							</div>
			`;

			if(value['attachment_name'] == "Empty"){
			newsDetails +=`
							<div class="modal-footer" style="display: none;">
								<button type="button" class="btn btn-primary downloadDiv" id="${value["id"]}" onclick="createDownloadFile(this)"><?php echo $translations['M02972'][$language]; //Download ?></button>
							</div>
			`;
			}else{
			newsDetails +=`
							<div class="modal-footer">
								<button type="button" class="btn btn-primary downloadDiv" id="${value["id"]}" onclick="createDownloadFile(this)"><?php echo $translations['M02972'][$language]; //Download ?></button>
							</div>
			`;
			}

			newsDetails +=`
						</div>
					</div>
				</div>
			`;

			$('#newsDetails').append(newsDetails);*/

		});
	}
	else if (data == "")
	{
		$('#newsSection').append(`
			<div class="col-md-12 col-12 d-flex flex-column" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%);">
				<div class="h-100 row justify-content-center mb-3">
					<img src="images/project/no-results.png" width="80px">
				</div>
				<div class="h-100 row justify-content-center">
					<div class="noResultTxt"><?php echo $translations['M02128'][$language]; //No Results Found ?></div>
				</div>
			</div>
		`);
	}
}

function newsPop(element)
{
	$('#newsCard'+element.id).modal('show');
}

function createDownloadFile(element) {
	var formData  = {
		command: 'newsDownload',
		announcementID: element.id
	};

	$.redirect(url, formData);
}

function htmlDecode(input){
	var e = document.createElement('textarea');
	e.innerHTML = input;
	// handle case of empty input
	return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}

/*function showSlides(ind, n) {
	var i;
	var slides = $(".newsSlides"+ind);
	var slideLines = $(".newsSlideLines"+ind);
	if (n > slides.length) {
		n = 1;
		slideIndex = 1;
	}
	if (n < 1) {
		n = slides.length;
		slideIndex = slides.length;
	}
	for (i = 0; i < slides.length; i++) {
	    slides[i].style.display = "none";  
	}
	for (i = 0; i < slideLines.length; i++) {
	    slideLines[i].classList.remove("active");
	}
	slides[n-1].style.display = "block";  
	slideLines[n-1].classList.add("active");
}*/

</script>
