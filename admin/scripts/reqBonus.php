<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  21/07/2017.
    **/
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            
            case "getAdminList":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getSponsorBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getLaningBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPairingBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getMatchingBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRebateBonusReport":
            case "getGoldmineBonusReport":
            case "getAwardBonusReport":
            case "getLeadershipBonusReport":
            case "getReleaseBonusReport":
            case "getWaterBucketBonusReport":
            case "getWaterBucketPercentage":
            case "getBonusPayoutListing":
            // case "getBonusPayoutDetailListing":
            case "updatePayoutStatus":
            case "getTeamBonusReport":
            case "getBonusPayoutSummary": 
            case "getEnrollmentBonusReport":
            case "getCoupleBonusReport":
            case "getUnilevelBonusReport":
            case "getLeadershipCashRewardReport":
                
                $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAssetSummaryReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

               case "getSponsorGoldmineBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                                "fromUsernameSearchType" => $_POST["fromUsernameSearchType"]
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "getLeadershipBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
            
             case "getBonusListing":

                $params = array("pageNumber"    => $_POST['pageNumber'],
                                "onloaded"      => $_POST['onloaded'],
                                "searchData"     => $_POST['searchData'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "getPromoCodeListing":

                $params = array("pageNumber"    => $_POST['pageNumber'],
                                "onloaded"      => $_POST['onloaded'],
                                "searchData"     => $_POST['searchData'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "getPromoCodeUserListing":

                $params = array("pageNumber"    => $_POST['pageNumber'],
                                "promo_code_id"    => $_POST['promo_code_id'],
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "deletePromoCode":

                $params = array("pageNumber"    => $_POST['pageNumber'],
                                "promoCodeID"      => $_POST['promoCodeID'],
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "getPromoCodeDetail":

                $params = array("promo_code_id"    => $_POST['promo_code_id'],
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "addPromoCode":

                $params = array("name"              => $_POST['name'],
                                "code"              => $_POST['code'],
                                "discount"          => $_POST['discount'],
                                "max_quantity"      => $_POST['max_quantity'],
                                "type"              => $_POST['type'],
                                "apply_type"        => $_POST['apply_type'],
                                "discount_type"     => $_POST['discount_type'],
                                "discount_apply_on" => $_POST['discount_apply_on'],
                                "max_discount_amount"=> $_POST['max_discount'],
                                "product_list"      => $_POST['product_list'],
                                "promo_product"     => $_POST['promo_product'],
                                "ftpStatus"         => $_POST['ftpStatus'],
                                "start_date"        => $_POST['start_date'],
                                "end_date"          => $_POST['end_date'],
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "updatePromoCodeStatus":

                $params = array("name"          => $_POST['name'],
                                "promoCodeID"    => $_POST['promoCodeID'],
                                "status"      => $_POST['status'],
                                "code"      => $_POST['code'],
                                "ftpStatus"     => $_POST['ftpStatus'],
                                "apply_type"    => $_POST['apply_type'],
                                "discount"      => $_POST['discount'],
                                "max_quantity"  => $_POST['max_quantity'],
                                "max_discount_amount"  => $_POST['max_discount'],
                                "type"      => $_POST['type'],
                                "discount_type"      => $_POST['discount_type'],
                                "discount_apply_on"      => $_POST['discount_apply_on'],
                                "product_list"      => $_POST['product_list'],
                                "promo_product"      => $_POST['promo_product'],
                                "start_date"      => $_POST['start_date'],
                                "end_date"      => $_POST['end_date'],
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "getCommunityBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                                "fromUsernameSearchType" => $_POST["fromUsernameSearchType"]
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getGlobalPoolShareReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminGetRecruitPromoReport":
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRecruitPromoDetails":
                $params = array("id" => $_POST['id']);
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getNewRecuitAndActiveProgram":
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getEnrollmentBonusReport":
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getCoupleBonusReport":
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
            
            case "getUnilevelBonusReport":
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getLeadershipCashRewardReport":
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll'],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getProduct":
                $params = array(

                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
        }
    }
?>
