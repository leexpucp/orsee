<?php
// part of orsee. see orsee.org
ob_start();
$menu__area="terms_conditions";
$title="terms_conditions";
include ("header.php");
if ($proceed) {
    echo '<center>
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
    echo '<TR><TD>

        </TD></TR>

        </TABLE>
        </center>';
}

include("footer.php");
?>