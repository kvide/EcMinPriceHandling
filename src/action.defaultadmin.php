<?php
# BEGIN_LICENSE
# -------------------------------------------------------------------------
# Module: EcMinPriceHandling (c) 2024 by CMS Made Simple Foundation
#
# A handling module for the EcommerceExt extension that allows
# charging a handling fee for orders that do not meet a minimum total.
#
# -------------------------------------------------------------------------
# A fork of:
#
# Module: MinPriceHandling (c) 2014-2017 by Robert Campbell
# (calguy1000@cmsmadesimple.org)
#
# -------------------------------------------------------------------------
#
# CMSMS - CMS Made Simple is (c) 2006 - 2024 by CMS Made Simple Foundation
# CMSMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# Visit the CMSMS Homepage at: http://www.cmsmadesimple.org
#
# -------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple. You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
# -------------------------------------------------------------------------
# END_LICENSE

if (! isset($gCms))
{
    exit();
}
if (! $this->VisibleToAdminUser())
{
    return;
}

if (isset($params['setashandling']))
{
    try
    {
        \EcommerceExt\setup_manager::set_handling_calculator($this->GetName());
        echo $this->ShowMessage($this->Lang('msg_setashandling'));
    }
    catch (\Exception $e)
    {
        $this->SetError($e->GetMessage());
    }
}
if (isset($params['submit']))
{
    $this->SetPreference('lineitemdesc', trim(get_parameter_value($params, 'lineitemdesc')));
    $this->SetPreference('handlingamt', floatval(get_parameter_value($params, 'handlingamt')));
    $this->SetPreference('maxorderamt', floatval(get_parameter_value($params, 'maxorderamt')));
    echo $this->ShowMessage($this->Lang('msg_prefssaved'));
}

$smarty->assign('lineitemdesc', $this->GetPreference('lineitemdesc'));
$smarty->assign('handlingamt', $this->GetPreference('handlingamt'));
$smarty->assign('maxorderamt', $this->GetPreference('maxorderamt'));

$smarty->assign('formstart', $this->CreateFormStart($id, 'defaultadmin', $returnid));
$smarty->assign('formend', $this->CreateFormEnd());

echo $this->ProcessTemplate('defaultadmin.tpl');

#
# EOF
#
?>
