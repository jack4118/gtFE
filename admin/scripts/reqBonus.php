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

            case "deletePromoCode":

                $params = array("pageNumber"    => $_POST['pageNumber'],
                                "promoCodeID"      => $_POST['promoCodeID'],
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "addPromoCode":

                $params = array("code"    => $_POST['code'],
                                "type"      => $_POST['type'],
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "updatePromoCodeStatus":

                $params = array("promoCodeID"    => $_POST['codeID'],
                                "status"      => $_POST['status'],
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
        }
    }
?>
