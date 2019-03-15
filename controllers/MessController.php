<?php


include_once ROOT . '/models/Message.php';


class MessController
{

    public function actionLoginTest()
    {
        require_once(ROOT . '/views/login/test_reg.php');
        return true;
    }

    public function actionVerSend()
    {
        require_once(ROOT . '/views/room/send_verification.php');
        return true;
    }

    public function actionVerCode($code = null, $user_id = null, $user_email = null)
    {
        if ($code != null and $user_id != null and $user_email != null)
            require_once(ROOT . '/views/room/verification_code.php');
        return true;
    }

    public function actionVk()
    {
        require_once(ROOT . '/views/login/login_vk.php');
        return true;
    }

    public function actionAgreement()
    {
        require_once(ROOT . '/views/other/agreement.php');
        return true;
    }

    public function actionNewPassword()
    {
        require_once(ROOT . '/views/room/new_password.php');
        return true;
    }

    public function actionPlusBonus()
    {
        require_once(ROOT . '/views/room/plus_bonus.php');
        return true;
    }

    public function actionPromo()
    {
        require_once(ROOT . '/views/room/promo.php');
        return true;
    }

    public function actionIndex()
    {
        require_once(ROOT . '/views/message/message.php');
        return true;
    }

    public function action404()
    {
        require_once(ROOT . '/views/message/404.php');
        return true;
    }

    public function actionLogin()
    {
        require_once(ROOT . '/views/login/login.php');
        return true;
    }

    public function actionReg()
    {
        require_once(ROOT . '/views/login/reg.php');
        return true;
    }

    public function actionNewUser()
    {
        require_once ROOT . '/models/SaveUser.php';
        require_once(ROOT . '/views/login/new_user.php');
        return true;
    }

    public function actionAuth_Warning()
    {
        require_once(ROOT . '/views/message/auth.php');
        return true;
    }

    public function actiontimeAdsRefresh()
    {
        require_once(ROOT . '/components/refresh_ads_time.php');
        return true;
    }


    public function actionDeleteAds($type_ads = "none", $ags_id = 0, $agree = 0)
    {

        switch ($type_ads) {
            case "jobs":
                $error = false;
                break;

            case "resume":
                $error = false;
                break;

            case "services":
                $error = false;

                break;

            default:
                ?>
                <script language="JavaScript">
                    window.location.href = "/404"
                </script>
                <?php
                exit;
                $error = true;
                break;
        }

        if ($ags_id > 0 and $error == false)
            require_once(ROOT . '/views/room/delete.php');
        return true;
    }

    public function actionVipTime($type_ads = "none", $ads_id = 0, $agree = 0)
    {

        switch ($type_ads) {
            case "jobs":
                $error = false;
                break;

            case "resume":
                $error = false;
                break;

            case "services":
                $error = false;

                break;

            default:
                ?>
                <script language="JavaScript">
                    window.location.href = "/404"
                </script>
                <?php
                exit;
                $error = true;
                break;
        }

        if ($ads_id > 0 and $error == false)
            require_once(ROOT . '/views/room/vip_time.php');
        return true;
    }

    public function actionHighlightAds($type_ads = "none", $ads_id = 0, $agree = 0)
    {

        switch ($type_ads) {
            case "jobs":
                $error = false;
                break;

            case "resume":
                $error = false;
                break;

            case "services":
                $error = false;

                break;

            default:
                ?>
                <script language="JavaScript">
                    window.location.href = "/404"
                </script>
                <?php
                exit;
                $error = true;
                break;
        }

        if ($ads_id > 0 and $error == false)
            require_once(ROOT . '/views/room/highlight_ads.php');
        return true;
    }

    public function actionNowTime($type_ads = "none", $ads_id = 0)
    {

        switch ($type_ads) {
            case "jobs":
                $error = false;
                break;

            case "resume":
                $error = false;
                break;

            case "services":
                $error = false;

                break;

            default:
                ?>
                <script language="JavaScript">
                    window.location.href = "/404"
                </script>
                <?php
                exit;
                $error = true;
                break;
        }

        if ($ads_id > 0 and $error == false)
            require_once(ROOT . '/views/room/now_time.php');
        return true;
    }

    public function actionEditTest($type_ads = "none", $ads_id = 0)
    {

        switch ($type_ads) {
            case "jobs":
                $error = false;
                break;

            case "resume":
                $error = false;
                break;

            case "services":
                $error = false;

                break;

            default:
                ?>
                <script language="JavaScript">
                    window.location.href = "/404"
                </script>
                <?php
                exit;
                $error = true;
                break;
        }

        if ($ads_id > 0 && $error == false)
            require_once(ROOT . '/views/ads/test_editing_ads.php');
        return true;
    }
}

