<?php
// part of orsee. see orsee.org
ob_start();
$menu__area="terms_conditions";
$title="terms_conditions";
include ("header.php");


if ($proceed) {
    // check for rules
    if (!isset($_SESSION['rules'])) {
        if ($settings['registration__require_rules_acceptance']=='y' ||
            $settings['registration__require_privacy_policy_acceptance']=='y') {
            if (isset($_REQUEST['accept_rules']) && $_REQUEST['accept_rules']) {
                $_SESSION['rules']=true;
                redirect ("public/".thisdoc());
            } else {
                echo '<center><BR><BR>
                      <FORM action='.thisdoc().'>
                      <TABLE class="or_panel" style="width: 80%">';
                if ($settings['registration__require_rules_acceptance']=='y') {
                    echo '<TR><TD>
                    <TABLE width="100%" border=0 class="or_panel_title"><TR>
                        <TD style="background: '.$color['panel_title_background'].'; color: '.$color['panel_title_textcolor'].'">
                            '.lang('rules').'
                        </TD>
                    </TR></TABLE>
                    </TD></TR>
                        <TR><TD>'.content__get_content("rules").'</TD></TR>';
                }
                if ($settings['registration__require_privacy_policy_acceptance']=='y') {
                    echo '<TR><TD>
                        <TABLE width="100%" border=0 class="or_panel_title"><TR>
                        <TD style="background: '.$color['panel_title_background'].'; color: '.$color['panel_title_textcolor'].'">
                            '.lang('privacy_policy').'
                        </TD>
                        </TR></TABLE>
                    </TD></TR>
                            <TR><TD>'.content__get_content("privacy_policy").'</TD></TR>';
                }
                // echo '<TR><TD>
                //         <TABLE width="100%" border=0 class="or_panel_title"><TR>
                //         <TD style="background: '.$color['panel_title_background'].'; color: '.$color['panel_title_textcolor'].'">
                //             '.lang('do_you_agree_rules_privacy').'
                //         </TD>
                //         </TR></TABLE>
                //     </TD></TR>
                //         <TR><TD align=center>
                //             <INPUT class="button" type="submit" name="accept_rules" value="'.lang('yes').'">&nbsp;&nbsp;&nbsp;
                //             <INPUT class="button" type="submit" name="notaccept_rules" value="'.lang('no').'">
                //         </TD></TR>
                //     </TABLE>
                //     </FORM>
                //     </center>';
            }
        } else {
            $_SESSION['rules']=true;
            redirect ("public/".thisdoc());
        }
        $proceed=false;
    }
}

include("footer.php");
?>