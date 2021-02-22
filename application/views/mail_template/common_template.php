<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Welcome to <?php echo $site_name; ?>, <?=isset($user_name) ? $user_name : '';?></title>
  </head>
  <body style="-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787e; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;" bgcolor="#b56357">
    <style type="text/css">
      body {
        width: 100% !important;
        height: 100%;
        margin: 0;
        line-height: 1.4;
        background-color: #ffffff;
        color: #74787e;
        -webkit-text-size-adjust: none;
      }
      @media only screen and (max-width: 600px) {
        .email-body_inner {
          width: 100% !important;
        }
        .email-footer {
          width: 100% !important;
        }
      }
      @media only screen and (max-width: 500px) {
        .button {
          width: 100% !important;
        }
      }
    </style>
    <span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;"></span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#b56357">
      <tr>
        <td align="center" style="box-sizing: border-box; font-family: Arial, sans-serif; word-break: break-word;">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, sans-serif; margin: 0; padding: 0; width: 100%;">
            <tr>
              <td class="email-masthead" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 25px 0; word-break: break-word;" align="center">
                <a href="<?php echo base_url(); ?>" class="email-masthead_name" style="box-sizing: border-box; color: #eae3ea; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none;">
                    <?php //echo $site_name; ?>                        
                    <img editable="true" mc:edit="bm9-01" src="<?= base_url('public/front/images/logo/'.$site_logo.'');?>" alt="<?php echo $site_name; ?>" title="<?php echo $site_name; ?>" style="display:block" height="40"/>
                    </a>
              </td>
            </tr>
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;" bgcolor="#ffffff">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#ffffff">
                  <tr>
                    <td class="content-cell" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 35px; word-break: break-word;">
                      <h1 style="box-sizing: border-box; color: #2f3133; font-family: Arial, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Hi, <?=isset($user_name) ? $user_name : '';?></h1>
                      <p style="box-sizing: border-box; color: #74787e; font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left"></p>
                      <?= $inner_html; ?>
                      <p style="box-sizing: border-box; font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks and Regards,
                        <br /><?php echo $site_name; ?> Team</p>
                      <p style="box-sizing: border-box; font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left"></p>
                      
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="box-sizing: border-box; font-family: Arial, sans-serif; word-break: break-word;">
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                  <tr>
                    <td class="content-cell" align="center" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 35px; word-break: break-word;">
                      <p class="sub align-center" style="box-sizing: border-box; color: #eae3ea; font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">&copy; <?php echo date('Y') ?> <?php echo $site_name; ?>. All rights reserved.</p>
                      <p class="sub align-center" style="box-sizing: border-box; color: #eae3ea; font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">
                        <?= $site_name ?>
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>