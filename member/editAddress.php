<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<div class="pageContent loginPagePadding">
	<div class="pageTitle" data-lang="">
		<?php echo $translations['M02857'][$language]; //Edit Address ?>
	</div>
	<div class="mt-3 whiteBg">
		<div class="row">
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03194"><?php echo $translations['M00177'][$language]; //Full Name ?></label>
				<input id="fullnameInp" type="text" class="form-control">
				<span id="fullname"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M02298"><?php echo $translations['M02298'][$language]; //Phone Number ?></label>
				<div class="row">
					<div class="col-md-4 col-5">
						<select id="dialingArea" class="form-control"></select>
					</div>
					<div class="col-md-8 col-7 pl-0">
						<input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control" id="phoneInp">
					</div>
				</div>
				<span id="phone"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M00187"><?php echo $translations['M00187'][$language]; //Email Address ?></label>
				<input id="emailInp" type="text" class="form-control">
				<span id="email"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M02466"><?php echo $translations['M02466'][$language]; //Address ?></label>
				<input id="addressInp" type="text" class="form-control">
				<span id="address"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M00178"><?php echo $translations['M00178'][$language]; //Country ?></label>
				<select id="countryInp" class="form-control">
					<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
				</select>
				<span id="countryID"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M00181"><?php echo $translations['M00181'][$language]; //Province ?></label>
				<select id="provinceSelect" class="form-control">
                    <!-- <option><?php echo $translations['M03502'][$language]; //Select Province ?></option> -->
                </select>
				<span id="state"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M00676"><?php echo $translations['M00676'][$language]; //City ?></label>
				<select id="citySelect" class="form-control">
                    <!-- <option><?php echo $translations['M03501'][$language]; //Select City ?></option> -->
                </select>
				<span id="city"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03497"><?php echo $translations['M03497'][$language]; //District ?></label>
				<select id="districtSelect" class="form-control">
                    <!-- <option><?php echo $translations['M03498'][$language]; //Select District ?></option> -->
                </select>
				<span id="subDistrict"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03155"><?php echo $translations['M03155'][$language]; //Sub-District ?></label>
				<select id="subDistrictSelect" class="form-control">
                    <!-- <option><?php echo $translations['M03499'][$language]; //Select Sub-District ?></option> -->
                </select>
				<span id="subDistrict"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03158"><?php echo $translations['M03158'][$language]; //Zip code ?></label>
				<select id="postalSelect" class="form-control">
                    <!-- <option><?php echo $translations['M03500'][$language]; //Select Zip Code ?></option> -->
                </select>
				<span id="postalCode"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<input id="addressType" type="hidden">
			</div>
			<div class="col-12">
	            <input type="checkbox" id="setDefault" name="setDefault" class="mr-1" style="cursor: pointer">
	            <label for="setDefault" class="checkboxTxt">
	                <?php echo $translations['M03290'][$language]; /* Make this default address */ ?></label>
	        </div>
			<div class="mt-3 col-12">
				<button type="button" id="editAddressBtn" class="btn-primary btn"><?php echo $translations['M02756'][$language]; //Save ?></button>
			</div>
		</div>
	</div>
</div>
<!-- end:: Content -->
<?php include 'footer.php'; ?>
</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php include 'backToTop.php' ?>
<!-- end::Scrolltop -->

<?php include 'sharejs.php'; ?>



<!-- end::Body -->
</html>

<script>
	var url             = 'scripts/reqDefault.php';
	var jsonUrl         = 'json/addressList.json';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var fCallback = "";
	var id = '<?php echo $_POST['id']; ?>';
	var countriesList;
    var districtList;
    var subDistrictList;
    var postalCodeList;
    var cityList;
    var stateList;
    var saveJsonData;

	$(document).ready(function(){
        var formData  = {
            command   : "getAddress",
            id 		  : id
        };
        var fCallback = getAddressDetail;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        /*$('#countryInp').change(function(){
            var dialingArea = $('#countryInp option:selected').attr('data-code');
            $('#dialingArea').val(dialingArea);
        });*/

        /*$('#dialingArea').change(function() {
            var country = $('#dialingArea option:selected').attr('name');
            $(`#countryInp option[name="${country}"]`).prop('selected', true);
        })*/

		$("#editAddressBtn").click(function(){
			$("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });
            var fullname = $('#fullnameInp').val();
            var dialingArea = $('#dialingArea').find('option:selected').val();
            var phone = $('#phoneInp').val();
            var email = $('#emailInp').val();
            var address = $('#addressInp').val();
            var districtID = $('#districtSelect').find('option:selected').val();
            var subDistrictID = $('#subDistrictSelect').find('option:selected').val();
            var cityID = $('#citySelect').find('option:selected').val();
            var postalCodeID = $('#postalSelect').find('option:selected').val();
            var stateID = $('#provinceSelect').find('option:selected').val();
            var countryID = $('#countryInp').find('option:selected').val();
            var isDefault;
            var addressType = $('#addressType').val();
            if ($("#setDefault").is(":checked")) {
                isDefault = 1;
            } else {
                isDefault = 0;
            }

            formData  = {
	            command 		: "editAddress",
	            id 				: id,
	            addressType 	: addressType,
				fullname		: fullname,
				dialingArea 	: dialingArea,
				phone 			: phone,
				email 			: email,
				address 		: address,
				districtID 		: districtID,
				subDistrictID 	: subDistrictID,
				cityID 			: cityID,
				stateID 		: stateID,
				countryID 		: countryID,
				disabled 		: 0,
				postalCodeID	: postalCodeID,
				isDefault 		: isDefault
	        };

	        fCallback = editAddressSucc;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
	});

	function getAddressDetail(data,message){
		// var countryList = data.countryList;
		// stateList = data.stateList;
		var addressDetails = data.addressDetails;
		// var firstCountry = countryList[0]['id'];

		// $('#firstNameInp').val(addressDetails.first_name || '-');
		// $('#lastNameInp').val(addressDetails.last_name || '-');
		$('#fullnameInp').val(addressDetails.name || '-');
		$('#phoneInp').val(addressDetails.phone);
		$('#emailInp').val(addressDetails.email|| '-');
		$('#addressInp').val(addressDetails.address);
		// $('#streetInp').val(addressDetails.streetName);
		// $('#subDistrictInp').val(addressDetails.subDistrict);
		// $('#cityInp').val(addressDetails.city);
		// $('#postalInp').val(addressDetails.postCode);

		$('#addressType').val(addressDetails.addressType);
		if(addressDetails.type == 1){
			$('#setDefault').prop('checked',true);
		}else{
			$('#setDefault').prop('checked',false);
		}

		$.getJSON(jsonUrl, function( jsonData ) {
	        saveJsonData = jsonData;
	        var firstCountry = saveJsonData['countriesList'][0]['id'];

	        if(saveJsonData['countriesList']) {
            	$.each(saveJsonData['countriesList'], function(k,v) {
	                var selected = '';

	                var countryDisplay = '';
	                countryDisplay = v['display'];

	                $('#countryInp').append('<option value="'+v['id']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" '+selected+'>'+countryDisplay+'</option>');
	                $('#dialingArea').append('<option value="'+v['countryCode']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" display="'+countryDisplay+'" '+selected+'>+'+v['countryCode']+'</option>');
	            });
	            $('#countryInp').val(addressDetails.countryID);
            }

            // filter state based on country selected then build option
	        var countryInp = $("#countryInp").val();
	        filterData("provinceSelect", countryInp, "country_id", "stateList", "id", "stateDisplay");
	        $('#provinceSelect').val(addressDetails.stateID);


	        // filter city based on state selected then build option
	        var stateID = $("#provinceSelect").val();
	        filterData("citySelect", stateID, "state_id", "cityList", "id", "cityDisplay");
	        $('#citySelect').val(addressDetails.cityID);

	        // filter district based on state selected then build option
	        var cityID = $("#citySelect").val();
	        filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");
			$('#districtSelect').val(addressDetails.districtID);
	        // filter sub district based on state selected then build option
	        var countyID = $("#districtSelect").val();
	        filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");
	        $('#subDistrictSelect').val(addressDetails.subDistrictID);

	        // filter zipcode based on state selected then build option
	        var subCountyID = $("#subDistrictSelect").val();
	        filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");
	        $('#postalSelect').val(addressDetails.postCodeID);
	        
	        $("#countryInp").change(function(){
	        	var countryInp = $('#countryInp').val();
	        	filterData("provinceSelect", countryInp, "country_id", "stateList", "id", "stateDisplay");

	        	var stateID = $("#provinceSelect").val();
	        	filterData("citySelect", stateID, "state_id", "cityList", "id", "cityDisplay");

	        	var cityID = $("#citySelect").val();
	        	filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");

	        	var countyID = $("#districtSelect").val();
	        	filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	        	var subCountyID = $("#subDistrictSelect").val();
	        	filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#provinceSelect').prop("disabled",true);
	            $('#citySelect').prop("disabled",true);
	            $('#districtSelect').prop("disabled",true);
	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var countryDDL = $('#countryInp option:selected').val();
	            countryDDL != "-"? ($('#provinceSelect').prop("disabled",false)) : ($('#provinceSelect').prop("disabled",true));
	            var stateDDL = $('#provinceSelect option:selected').val();
	            stateDDL != "-"? ($('#citySelect').prop("disabled",false)) : ($('#citySelect').prop("disabled",true));
	            var cityDDL = $('#citySelect option:selected').val();
	            cityDDL != "-"? ($('#districtSelect').prop("disabled",false)) : ($('#districtSelect').prop("disabled",true));
	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#provinceSelect").change(function(){
	            var stateID = $(this).val();
	            filterData("citySelect", stateID, "state_id", "cityList", "id", "cityDisplay");

	            var cityID = $("#citySelect").val();
	            filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");

	            var countyID = $("#districtSelect").val();
	            filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	            var subCountyID = $("#subDistrictSelect").val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#citySelect').prop("disabled",true);
	            $('#districtSelect').prop("disabled",true);
	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var stateDDL = $('#provinceSelect option:selected').val();
	            stateDDL != "-"? ($('#citySelect').prop("disabled",false)) : ($('#citySelect').prop("disabled",true));
	            var cityDDL = $('#citySelect option:selected').val();
	            cityDDL != "-"? ($('#districtSelect').prop("disabled",false)) : ($('#districtSelect').prop("disabled",true));
	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#citySelect").change(function(){
	            var cityID = $(this).val();
	            filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");

	            var countyID = $("#districtSelect").val();
	            filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	            var subCountyID = $("#subDistrictSelect").val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#districtSelect').prop("disabled",true);
	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var cityDDL = $('#citySelect option:selected').val();
	            cityDDL != "-"? ($('#districtSelect').prop("disabled",false)) : ($('#districtSelect').prop("disabled",true));
	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#districtSelect").change(function(){
	            var countyID = $(this).val();
	            filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	            var subCountyID = $("#subDistrictSelect").val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#subDistrictSelect").change(function(){
	            var subCountyID = $(this).val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#postalCodeSelect').prop("disabled",true);

	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });
	    });
	}

	function filterData(nextSelectID, id, idVariable, nextAdd, value, display) {
	    var filteredArr = (saveJsonData[nextAdd]).filter((item) => item[idVariable] == id );
	    buildOption(nextSelectID, filteredArr, value, display);
	}

	function buildOption(id, data, value, display) {
	    var option = `<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>`;
	    data = data.sort(function(a, b) {
	        var aName = a[display].toLowerCase();
	        var bName = b[display].toLowerCase(); 
	        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
	    });
	    $.each(data, function(k,v){
	        option+=`<option value="${v[value]}">${v[display]}</option>`;
	    });
	    $("#"+id).html(option);

	    // new TomSelect("#"+id,{
	    //     sortField: {
	    //         field: "text",
	    //         direction: "asc"
	    //     }
	    // });
	}

	/*function SortByName(a, b){
	    var aName = a.name.toLowerCase();
	    var bName = b.name.toLowerCase(); 
	    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
	}*/

	function editAddressSucc(data,message){
		showMessage(message, 'success', '<?php echo $translations['M03294'][$language]; /* Updated Successful */ ?>', 'edit', 'addressListing');
	}
</script>
